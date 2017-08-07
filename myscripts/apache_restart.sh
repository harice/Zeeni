#!/bin/bash

#Make sure you make these paths correct
result=`/usr/bin/php /var/www/html/myscripts/servercheck.php`
echo $result
if [ $result != 1 ]
then
/etc/init.d/httpd restart
sleep 10
restartcheck=`/usr/bin/php /var/www/html/myscripts/servercheck.php`
if [ $restartcheck == 1 ]
then
echo "Apache server have been successfully restarted!" | mail -s "Zeeni EI AWS Server Alert: Apache restarted" angelo.roman@elementzinteractive.com
exit
else
echo "Apache server is still in error state!" | mail -s "Zeeni EI AWS Server Alert: Apache in error state" angelo.roman@elementzinteractive.com
exit
fi
exit
fi
