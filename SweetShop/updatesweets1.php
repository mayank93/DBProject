<?php include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{
    $name=$_REQUEST["name"];
    $period=$_REQUEST["period"];
    $type=$_REQUEST["type"];
    $pcost=$_REQUEST["pcost"];
    $scost=$_REQUEST["scost"];
    $query="select * from  SWEETS where Name='".$name."';" ;
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0 and $_SESSION['sname']!=$name)
    {
echo"  <script type='text/javascript'>window.alert('Name already exists'); window.location.replace('updatesweets.php') ;</script> ";
    }
    else
    {
      $update="update SWEETS set Name='".$name."',Type='".$type."',Expiry_period=".$period.",productionCost=".$pcost.",sellingCost=".$scost." where Name='".$_SESSION['sname']."';";
      mysql_query($update);
      echo mysql_error();
     header("location:updatesweets.php");
    }
}
else 
  header("location:index.php");
?>
