<?php include 'connection.php';
include'waste.php';
//session_start();
include('header.php');  
if(isset($_SESSION['username']))
{
  $query="select COUNT(Name) as count from SELLING";
  $var=mysql_query($query,$connect);
  $res=mysql_fetch_assoc($var);
  $count=$res['count'];
//  echo "$count";
?>
<div>
<table align='center' cellspacing='2' border='1'>
 <tr>
    <td>Name</td><td>Amount Sold</td> <td>Date Of Arrival</td><td>Expiry</td><td>Quantity Available</td><td>Cost</td>
</tr>
    <?php
  $q="select * from SELLING";
  $a=mysql_query($q,$connect);
  while($t=mysql_fetch_assoc($a))
  {
    echo "<tr>";
    echo "<td>".$t['Name']."</td><td>".$t['Amount_Sold']."</td><td>".$t['Date_of_arrival']."</td><td>".$t['Expiry']."</td>";
    echo "<td>".$t['Available_Qty']."</td><td>".$t['Cost']."</td>";
    echo "</tr>";
  }
    ?>
 </tr>
</table>
</div>
<?php
include('footer.php');
}
else 

   header("location:index.php");

?>
