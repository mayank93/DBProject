<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
<?php
  $query="select * from PRODUCTION where supplied=0" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

    <div>
<form action="production2.php" method="post" >
<table border="0" cellspacing="10" align="center"> 
        <tr>
        <th>Select</th>
          <th>P_ID</th>
          <th>Name</th>
          <th>Production_Cost</th>
          <th>Quantity</th>
       </tr>    
<?php          
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<tr>";
        echo "<td><input type='checkbox' name='req[]' value=".$row[0]."></td>";
        echo "<td>",$row[0],"</td>";
        echo "<td>",$row[1],"</td>";
        echo "<td>",$row[2],"</td>";
        echo "<td>",$row[3],"</td>";
        echo "</tr>" ;
    }

?>
<tr> <td colspan="5" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
</div>
<?php 
  }
  include('footer.php');
}
else 
  header("location:index.php");
?>

