<?php include 'connection.php';
session_start();
//  include('header.php');
if(isset($_SESSION['username']))
{
  $name=$_REQUEST["name"];
  $qty=$_REQUEST["qty"];
  $ing=$_REQUEST["ing"];
  $query="select * from SWEETS_INGREDIENTS where Name='".$name."' and Ingredient='".$ing."';";
  //   echo $query;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0 and $_SESSION['swing']!=$ing)
  {  
    //    echo $query;
    echo"  <script type='text/javascript'>window.alert('Name already exists'); window.location.replace('updateingredient.php?submit=update&name=".$_SESSION['swname']."&ing=".$_SESSION['swing']."&qty=".$_SESSION['swqty']."');</script> ";

  }
  else
  { 
    $update="update SWEETS_INGREDIENTS set Name='".$name."',Ingredient='".$ing."',Quantity=".$qty." where Name='".$_SESSION['swname']."' and Ingredient='".$_SESSION['swing']."';";
    mysql_query($update);
    header("location:ingredients1.php");
  }
}
else 

  header("location:index.php");

?>

