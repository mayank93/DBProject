<?php 
session_start();
if(isset($_SESSION['username']))
{
include 'connection.php';
if(isset($_REQUEST['submit']))
{
  $i="insert into SALARIED_EMP values('".$_REQUEST['sal']."','".$_SESSION['E_ID']."');";
  mysql_query($i);
  echo mysql_error();  
  header("Location:employee.php");
}
}
else
{
    header("Location:index.php");
}
?>

