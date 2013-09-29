<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
   $query="select * from SWEETS;" ;
     $result=mysql_query($query);
   if(mysql_num_rows($result)>0){  
?> 
<form action="ingredients.php"  >
<table border="0" cellspacing="1" align="center"> 
<tr><td>Name:</td><td><select name="name">
<?php
     while(($row=mysql_fetch_array($result))!=null)
     {   
       echo "<option value='".$row[0]."'>".$row[0]."</option>";
     }   

?>
</select></td></tr>
<tr><td>Ingredients:Quantity</td><td><input type="text" name="ingredient"></td></tr>
<tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?
   }
  include('footer.php');
  if(isset($_REQUEST["submit"]))
  {
    $name=$_REQUEST["name"];
    $ing=$_REQUEST["ingredient"];
    $ingredient=explode(",",$ing);
    $len=sizeof($ingredient);
    for ($i=0; $i<$len ;$i++)
    {
      
      $row=explode(":",$ingredient[$i]);
      $insert="insert into SWEETS_INGREDIENTS values('".$name."','".$row[0]."',".$row[1].");";
     mysql_query($insert);
    }
     header("location:ingredients.php");
  }
}
else 

      header("location:index.php");

?>

