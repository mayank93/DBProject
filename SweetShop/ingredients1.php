<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php
  $query="select Name from SWEETS_INGREDIENTS group by Name;" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

<form action="ingredients1.php"  >
<table border="0" cellspacing="10" align="center"> 
<tr><td>Select Sweet Name: <select name="ing">
<?php          
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<option value='".$row[0]."'>".$row[0]."</option>";
    }

?>
</select>
</td>
<td align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php }
if(isset($_REQUEST["submit"]))
{
  $req=$_REQUEST["ing"];
  $query="select * from SWEETS_INGREDIENTS where Name='".$req."';" ;   
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0)
  {   
    echo " <p align='center'><b> Ingredients Details For ".$req."</b></p>";
    echo "<table border='0' cellspacing='10' align='center'> ";

      echo "<tr>";
      echo "<th>Ingredient</th>";
      echo "<th>Quantity</th>";
      echo "<th></th>";
      echo "<th></th>";
     echo " </tr>";
      while(($row=mysql_fetch_array($result))!=null)
      {

        echo "   <tr>";
        echo "<form  action='updateingredient.php' >";
        echo "  <td>".$row[1]."</td>";
        echo "  <td>".$row[2]."</td>";
        echo "  <td><a href='updateingredient?submit=update&name=".$row[0]."&ing=".$row[1]."&qty=".$row[2]."'>update</a></td>";
        echo "  <td><a href='deleteingredient?submit=delete&name=".$row[0]."&ing=".$row[1]."&qty=".$row[2]."'>delete</a></td>";
        echo "  </from>";
        echo "  </tr>";
      }
    echo "</table>";
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

