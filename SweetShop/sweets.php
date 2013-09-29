<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
	<div>
<form action="sweets.php" method="post" >
<table border="0" cellspacing="1" align="center"> 
<tr><td>Name:</td><td><input type="text" name="name"></td></tr>
<tr><td>Expiry_Period</td><td><input type="text" name="period"></td></tr>
<tr><td>Production_Cost</td><td><input type="text" name="pcost"></td></tr>
<tr><td>Selling_Cost</td><td><input type="text" name="scost"></td></tr>
<tr><td>Type</td><td><select name="type">
                    <option value="Bengali">Bengali</option>
                    <option value="Gujrati">Gujrati</option>
                    </select></td></tr>
<tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
  
</div>
<?php
  include('footer.php');
  if(isset($_REQUEST["name"]) and isset($_REQUEST["period"]) and isset($_REQUEST["type"]))
  {
    $name=$_REQUEST["name"];
    $period=$_REQUEST["period"];
    $type=$_REQUEST["type"];
    $pcost=$_REQUEST["pcost"];
    $scost=$_REQUEST["scost"];
    $insert="insert into SWEETS values('$name','$type',$period,$pcost,$scost)";
    mysql_query($insert);
    echo mysql_error();
    header("location:sweets.php");
  }
}
else 

     header("location:index.php");

?>

