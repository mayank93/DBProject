<?php
include 'connection.php';
$i="select max(R_ID) as R_ID from RAW_MATERIAL;";
$r=mysql_query($i,$connect);
$a=mysql_fetch_assoc($r);
print_r($a);
$i1="select Quantity*Cost as Total from RAW_MATERIAL where R_ID = ".$a['R_ID'].";";
$r1=mysql_query($i1,$connect);
$a1=mysql_fetch_assoc($r1);
print_r($a1);
$i2="insert into PECUNIARY values('','".$a['R_ID']."','rawMaterial','".$a1['Total']."',0);";
mysql_query($i2,$connect);
echo mysql_error();
?>
