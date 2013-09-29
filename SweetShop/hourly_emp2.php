<?php 
session_start();
if(isset($_SESSION['username']))
{
include 'connection.php';
echo $_SESSION['E_ID'];
if(isset($_REQUEST['submit']))
{
  $i="insert into HOURLY_EMP values('".$_SESSION['E_ID']."','".$_REQUEST['sal']."','".$_REQUEST['hrs']."');";
  mysql_query($i,$connect);
  echo mysql_error();  
  header("location:employee.php");
}
}
else
{
    header("location:index.php");
}
?>

