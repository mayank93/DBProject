<?php include'connection.php';
$q1="select * from SELLING;";
$r1=mysql_query($q1,$connect);
$now=strtotime("now");
while($t=mysql_fetch_assoc($r1))
{
  $expiry=strtotime($t['Expiry']);
  if($expiry<=$now)
  {
    $q2="update SELLING set Available_Qty=0 , Date_of_arrival=NULL , Expiry=NULL where Name='".$t['Name']."';";
    mysql_query($q2,$connect);
  }
}
?>

