<?php
include 'connection.php';
if(isset($_REQUEST['delete']))
{
  $q="delete from DEPENDENT where E_ID=".$_REQUEST['eid']." and firstName='".$_REQUEST['name']."';";
  echo $q;
  mysql_query($q);
  echo mysql_error();
  header('location:dependent1.php');
}
