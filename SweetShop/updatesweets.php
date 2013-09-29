<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
if(isset($_REQUEST["submit"]))
{
    $name=$_REQUEST["name"];
    $_SESSION['sname']=$name;
$query="select * from  SWEETS where Name='".$name."';" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0)
  {   
    $row=mysql_fetch_array($result);

    echo "<form action='updatesweets1.php' method='post' >";
      echo "<table border='0' cellspacing='1' align='center'> ";
      echo "<tr><td>Name:</td><td><input type='text' name='name' value='".$row[0]."'></td></tr>";
      echo "<tr><td>Expiry_Period</td><td><input type='text' name='period' value=".$row[2]."></td></tr>";
      echo "<tr><td>Production_Cost</td><td><input type='text' name='pcost' value=".$row[3]."></td></tr>";
      echo "<tr><td>Selling_Cost</td><td><input type='text' name='scost' value=".$row[4]."></td></tr>";
      echo "<tr><td>Type</td><td><select name='type'>";
      if($row[1]=='Bengali')
      {
        echo "<option value='Bengali' selected='selected'>Bengali</option>";
        echo "<option value='Gujrati'>Gujrati</option>";
      }
      else if($row[1]=='Gujrati')
      {
        echo "<option value='Gujrati' selected='selected'>Gujrati</option>";
        echo "<option value='Bengali'>Bengali</option>";
      }
      echo "</select></td></tr>";
      echo"<tr> <td colspan='2' align='center'> <input type='submit' name='submit' value='update'></td></tr>";
      echo "</table>";
    echo "</form> ";
  }
}
else
{
    $query="select Name from SWEETS ;" ;
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){      ?>  
<form action="updatesweets.php"  >
<table border="0" cellspacing="10" align="center"> 
<tr><td>Select Sweet Name: <select name="name">
<?php    
  while(($row=mysql_fetch_array($result))!=null)
  {   
    echo "<option value='".$row[0]."'>".$row[0]."</option>";
  }   
?>
</td></select>
<td align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php
      } 
}
include('footer.php');
}
else 
  header("location:index.php");
?>
