#!ipxe
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo
echo <?php echo date("d-m-Y H:i:s"); ?> 
echo
echo This system is registered in NetBootAssist and available for tasks in the 
echo webinterface. Please use the webinterface to assign a task for this machine.
echo
echo MAC Address: <?php echo $mac_address; ?> | System ID: <?php echo $system_id; ?> 
echo
prompt --timeout 30000  Hit enter to assign tasks to this machine. && goto book || reboot

:book
reboot