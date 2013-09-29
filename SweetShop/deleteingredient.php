<?php include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{
  $name=$_REQUEST["name"];
  $ing=$_REQUEST["ing"];
  $qty=$_REQUEST["qty"];
    $delete="delete from SWEETS_INGREDIENTS where Name='".$name."' and Ingredient='".$ing."';";
    mysql_query($delete);
    header("location:ingredients1.php");
}
else 

      header("location:index.php");

?>

