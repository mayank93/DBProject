<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php
  $query="select * from SWEETS;" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

<table border="1" cellspacing="1" align="center"> 
        <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Expiry Period(days)</th>
        <th>Production Cost per Kg(Rs.)</th>
        <th>Selling Cost per Kg(Rs.)</th>
       </tr>    
<?php          
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<tr>";
        echo "<td align='center'>",$row[0],"</td>";
        echo "<td align='center'>",$row[1],"</td>";
        echo "<td align='center'>",$row[2],"</td>";
        echo "<td align='center'>",$row[3],"</td>";
        echo "<td align='center'>",$row[4],"</td>";
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

