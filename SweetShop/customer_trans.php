<?php include'connection.php';
session_start();
if(isset($_SESSION['username']))
{  
if(isset($_REQUEST['submit']))
{
  for($i=0;$i<$_SESSION['nos'];$i++)
  { 
  $name=$_REQUEST['name'][$i];
    $query2="select * from SWEETS where Name='".$name."';" ;
          $result2=mysql_query($query2);
          if(mysql_num_rows($result2)>0)
                    $row2=mysql_fetch_array($result2);

      echo $_REQUEST['name'][$i];
    $insert="insert into SWEETS_PURCHASED values(
      '".$_SESSION['C_ID']."',
      '".$_REQUEST['name'][$i]."',
      '".$row2['sellingCost']."',
      '".$_REQUEST['qty'][$i]."',
      '".$row2['Type']."'
    );";
    mysql_query($insert,$connect);
    echo mysql_error();
    $qq[$i]="update SELLING set Available_Qty = Available_Qty - ".$_REQUEST['qty'][$i].", Amount_Sold = Amount_sold + ".$_REQUEST['qty'][$i]." where name='".$_REQUEST['name'][$i]."';";
    mysql_query($qq[$i],$connect);
    echo mysql_error();
  }
include 'payBill.php';

$q="select * from SELLING";
  $a=mysql_query($q,$connect);
  while($t=mysql_fetch_assoc($a))
  {
    if($t['Available_Qty']<5)
    {
      $q1="select Type from SWEETS where Name='".$t['Name']."';";
      $r1=mysql_query($q1,$connect);
      $f1=mysql_fetch_assoc($r1);
      $a1=$f1['Type'];
      $q3="select * from REQUIREMENTS where Name ='".$t['Name']."';";
      $r3=mysql_query($q3,$connect); 
      $f3=mysql_fetch_assoc($r3);
      if($f3['Name']==NULL)
      {
      echo "hello";
      $q2="insert into REQUIREMENTS values('".$t['Name']."',20,'".$a1."');";
      $r2=mysql_query($q2,$connect);
      }
      else
      {
        $q2="update REQUIREMENTS set Quantity=Quantity+20 where Name='".$t['Name']."';";
        mysql_query($q2,$connect);
      }
    }
  }
  header('location:customer.php');
}
}
else
{
  header('location:index.php');
}
?>
