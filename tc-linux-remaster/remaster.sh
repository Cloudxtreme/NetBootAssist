#!/bin/sh

#Fetch new tinycore files
wget http://tinycorelinux.net/5.x/x86/release/TinyCore-current.iso -O /tmp/TinyCore-current.iso
mkdir tc-files

#Mount the iso, unpack contents
sudo mkdir /mnt/tmp
sudo mount /tmp/TinyCore-current.iso /mnt/tmp -o loop,ro
cp /mnt/tmp/boot/vmlinuz /mnt/tmp/boot/core.gz ./tc-files/
sudo umount /mnt/tmp
cd ./tc-files/
mkdir core-unpack
cd core-unpack

#Unpack the initrd archive
zcat ../core.gz | sudo cpio -i -H newc -d

# do dem edits here
cd ../../../webapp/
APPURL=`php artisan geturl`
cd ../tc-linux-remaster/tc-files/core-unpack/
sed "s/||URL||/$APPURL/g" ../../bootlocal.txt > opt/bootlocal.sh
chmod +x opt/bootlocal.sh

#Repack the initrd
rm ../newcore.gz
sudo find | sudo cpio -o -H newc | gzip -2 > ../newcore.gz
cd ..
advdef -z4 newcore.gz
rm -r core-unpack

#Deploy
mkdir ../../webapp/public/bootfiles
mkdir ../../webapp/public/bootfiles/tinycore
cp newcore.gz ../../webapp/public/bootfiles/tinycore/core.gz
cp vmlinuz ../../webapp/public/bootfiles/tinycore/vmlinuz