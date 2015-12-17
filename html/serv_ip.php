<?php


$command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$localIP = exec ($command);

if ($localIP == "") {
  $command="/sbin/ifconfig wlan0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
  $localIP = exec ($command);

}

echo $localIP;
?>
