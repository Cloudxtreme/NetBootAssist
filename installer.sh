# Install script for Debian. Tested on debian 7.5. Only intended for fresh systems.

echo "NetBootAssist installation script"
echo ""
echo "Please fill in the following questionaire:"
echo "Hostname (accessible for the boot clients eg. boot.mycompany.com or 192.168.1.10): "
read Hostname
echo ""
read -s -p "MySQL Root Password(Please use a secure password): " SQLPassword
echo ""

echo "Thank you! Resuming installation..." 
sleep 3

#Install packages

#echo 'mysql-server mysql-server/root_password password $SQLPassword' | debconf-set-selections
#echo 'mysql-server mysql-server/root_password_again password $SQLPassword' | debconf-set-selections
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password $SQLPassword'
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password $SQLPassword'
sudo apt-get install apache2 php5 mysql-server php5-mysql php5-mcrypt curl unzip openssl git locate libcap2-bin advancecomp sudo genisoimage

#Disable default apache config
sudo service apache2 stop
rm /etc/apache2/sites-enabled/000-default

#Enable mod_rewrite
sudo a2enmod rewritenano

# Install composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

#Allow PHP to open ports below 1024 as normal user (TFTP server)
setcap 'cap_net_bind_service=+ep' /usr/bin/php5

# Create MySQL stuff
MYSQLClient=`which mysql`
SQLUserPassword=`openssl rand -base64 32`
SQLUserPassword=${SQLUserPassword:1:29}
#Bugfix for debian installer not picking up root password correctly
/etc/init.d/mysql stop
sleep 5
sudo mysqld_safe --skip-grant-tables &
sleep 5
mysql -u root -e "UPDATE mysql.user SET Password=PASSWORD('$SQLPassword') WHERE User='root'; FLUSH PRIVILEGES;"
/etc/init.d/mysql stop
sleep 5
/etc/init.d/mysql start
sleep 5

SQL="CREATE DATABASE IF NOT EXISTS NetBootAssist; GRANT ALL PRIVILEGES ON NetBootAssist.* TO NetBootAssist@localhost IDENTIFIED BY '$SQLUserPassword'; FLUSH PRIVILEGES;"
$MYSQLClient -uroot -p"$SQLPassword" -e "$SQL"

# Create user
adduser netbootassist --disabled-login --disabled-password --gecos ""

#Fetch needed files
rm -rf /home/netbootassist
git clone https://github.com/PatrickRombouts/NetBootAssist /home/netbootassist

# Create settings file
echo "[NetBootAssist]" > /home/netbootassist/settings.ini
echo "Hostname=$Hostname" >> /home/netbootassist/settings.ini
echo "SQLUsername=NetBootAssist" >> /home/netbootassist/settings.ini
echo "SQLPassword=$SQLUserPassword"  >> /home/netbootassist/settings.ini
chmod 700 /home/netbootassist/settings.ini

#Enable our config
cd /home/netbootassist
sudo cp install/apache_vhost.txt /etc/apache2/sites-enabled/101-netbootassist

#Restart apache
a2enmod rewrite
sudo service apache2 restart

#Setup web service. Prepare database, config files and stuff.
cd /home/netbootassist/webapp
composer install
######change laravel db settings "'password'  => ''," @ /home/netbootassist/webapp/app/config/database.php
php artisan migrate

###### run migrate
cd /home/netbootassist
sudo cp install/php-tftp /etc/init.d/php-tftp
sudo chmod +x /etc/init.d/php-tftp

# Fetch TFTP server
cd /home/netbootassist/tftp-server
mkdir files
git clone https://github.com/wader/php-tftpserver.git lib

#Remaster tinycore
cd /home/netbootassist/tc-linux-remaster
chmod +x remaster.sh
./remaster.sh

#Compile iPXE
cd /home/netbootassist/ipxe-build
chmod +x fetch.sh
chmod +x build.sh
./fetch.sh
./build.sh

#Clean our root mess!
chown netbootassist:netbootassist -R /home/netbootassist
chown root:root /home/netbootassist/settings.ini
chmod -R 777 /home/netbootassist/webapp/app/storage/

#Start some magic
service php-tftp start

echo "Aand its done."