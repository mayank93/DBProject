<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php
  $query="select * from WASTE;" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

<table border="0" cellspacing="10" align="center"> 
        <tr>
        <th>Name</th>
          <th>Quantity</th>
          <th>Cost</th>
       </tr>    
<?php          
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<tr>";
        echo "<td align='center'>",$row[0],"</td>";
        echo "<td align='center'>",$row[1],"</td>";
        echo "<td align='center'>",$row[2],"</td>";
        echo "</tr>" ;
    }

?>
</table>
<?php }
?>

</div>
<?php 
  include('footer.php');
}
else 
  header("location:index.php");
?>

