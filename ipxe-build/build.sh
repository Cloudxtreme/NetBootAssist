cd ipxe-git/src/
mkdir embed
cd ../../../webapp/
APPURL=`php artisan geturl`
cd ../ipxe-build/ipxe-git/src/
sed -e "s/||URL||/$APPURL/g" ../../netbootassist.embed > embed/netbootassist.embed

#Compile
make bin/undionly.kpxe EMBED=embed/netbootassist.embed
make bin/ipxe.usb EMBED=embed/netbootassist.embed
make bin/ipxe.iso EMBED=embed/netbootassist.embed

#Secure the goodz
mkdir ../../../tftp-server/files/
cp bin/undionly.kpxe ../../../tftp-server/files/undionly.kpxe
cp bin/ipxe.usb ../../../tftp-server/files/ipxe.usb
cp bin/ipxe.iso ../../../tftp-server/files/ipxe.iso