<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
  $name=$_REQUEST["name"];
  $ing=$_REQUEST["ing"];
  $qty=$_REQUEST["qty"];
  $_SESSION["swname"]=$name;
  $_SESSION["swing"]=$ing;
  $_SESSION["swqty"]=$qty;
?>
<div>

<form action="updateingredient1.php" >
<table border="0" cellspacing="1" align="center"> 
<?php
echo "<input type='hidden' name='name' value='".$name."'>";
echo "<tr><td>Ingredient</td><td><input type='text' name='ing' value='".$ing."'></td></tr>";
echo "<tr><td>Quantity</td><td><input type='text' name='qty' value='".$qty."'></td></tr>";
?>
<tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
  
</div>

<?
  include('footer.php');
}
else 

      header("location:index.php");

?>

