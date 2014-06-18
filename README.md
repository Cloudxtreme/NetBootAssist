This is unfinished code.

What works:
- Installer. It installs the needed packages on a (fresh) debian 7.5 system and configures the system except for /home/netbootassist/webapp/app/config/database.php. MySQL database settings need to be configured, they can be found in /home/netbootassist/settings.ini after the installation script has been ran
- Basic webinterface. There is no option to change passwords yet and the default account is being seeded after install: superadmin / password. You cannot configure anything yet.
- Basic booting. Having the DHCP server point to the VM/server makes it actually boot from iPXE which will load the webpage.

This project has been developed as (working) proof of concept. Feel free to use code from it, extend it or just mess around in it.

Before installing:
WARNING: The installation script tosses old configurations away and just puts it own. I recommend using this on fresh installations only.

Packages used:
TinyCoreLinux ( http://distro.ibiblio.org/tinycorelinux/ )
iPXE ( http://ipxe.org/ )
Laravel ( http://laravel.com/ )
php-tftpserver ( https://github.com/wader/php-tftpserver )