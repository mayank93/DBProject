<?php include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{
if(isset($_REQUEST["submit"]))
{
  $req=$_REQUEST["req"];
  for ($i=0;$i<sizeof($req);$i++)
  {
    $query="select CURDATE() as date ;";   
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
      $date=mysql_fetch_array($result);
    $query1="select * from PRODUCTION where P_ID='".$req[$i]."';" ;   
    $result1=mysql_query($query1);
    if(mysql_num_rows($result1)>0)
      $row1=mysql_fetch_array($result1);
    $query2="select * from SWEETS where Name='".$row1['Name']."';" ;
    $result2=mysql_query($query2);
    if(mysql_num_rows($result2)>0)
      $row2=mysql_fetch_array($result2);
    $query3="select * from SELLING where Name='".$row1['Name']."';" ;
    $result3=mysql_query($query3);
    $expiry=date('Y-m-d', strtotime($date['date']." + ".$row2['Expiry_period']." day"));
    if(mysql_num_rows($result3)>0){
      $row3=mysql_fetch_array($result3);
      $query="update  SELLING set Available_Qty=Available_Qty+".$row1['Quantity'].", Date_of_arrival='".$date['date']."',Expiry='".$expiry."' where Name='".$row3['Name']."';";
      mysql_query($query);
    }
    else{
     $query="insert into  SELLING(Name,Amount_Sold,Date_of_arrival,Expiry,Available_Qty,Cost) values('".$row1['Name']."',0,'".$date['date']."','".$expiry."',".$row1['Quantity'].",".$row2['sellingCost'].");";
      mysql_query($query);
    }
    $query="insert into  SUPPLY values('".$req[$i]."','".$row1['Name']."','".$date['date']."');";
    mysql_query($query);
    $query="update  PRODUCTION set supplied=1 where P_ID='".$req[$i]."';" ;
    mysql_query($query);
  }
  header("location:production.php");
}
}
else 
  header("location:index.php");
?>

