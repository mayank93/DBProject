<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<form action="raw_materialbyID.php" method="post" >
<table border="0" cellspacing="10" align="center"> 
<tr><td> R-ID: <input type="text" name="rid"></td><td align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php 
if(isset($_REQUEST["submit"]))
{
  $rid=$_REQUEST["rid"];
  $query="select * from  RAW_MATERIAL where R_ID='".$rid."';" ;   
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0)
  {   
    $row=mysql_fetch_array($result);
    echo "<table border='0' cellspacing='10' align='center'> ";
        echo "<tr><td> R_ID :</td><td>".$row[0]."</td></tr>";
        echo " <tr><td> Name :</td><td>".$row[1]."</td></tr>";
        echo " <tr><td> Quantity :</td><td>".$row[2]." Kg.</td></tr>";
        echo " <tr><td> Cost :</td><td>Rs. ".$row[3]."</td></tr>";
        echo "</table>";
  }
  else{
     echo "<script type='text/javascript'>window.alert('No such RID');window.location.replace('raw_materialbyID.php')</script>";

  }
}
?>

</div>
<?php
include('footer.php');
}
else 
  header("location:index.php");
?>

