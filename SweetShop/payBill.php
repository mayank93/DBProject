<?php
include 'connection.php';
$q="select max(C_ID) as C_ID from CUSTOMER;";
$a=mysql_query($q,$connect);
$r=mysql_fetch_assoc($a);
$query="select SUM(Amount * Quantity) as Amount from SWEETS_PURCHASED where C_ID=".$r['C_ID'].";";
$result=mysql_query($query,$connect);
$result=mysql_fetch_assoc($result);
$q1="insert into PECUNIARY values('','".$r['C_ID']."','bill',0,'".$result['Amount']."');";
mysql_query($q1,$connect);
echo mysql_error();
?>  
