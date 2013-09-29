<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
<div>
<table align='center' cellspacing='1' border='1'>
 <tr>
    <td>C_ID</td><td>Name</td><td>Date Of Purchase</td><td>Amount Paid</td>
</tr>
    <?php
  $q="select * from CUSTOMER";
  $a=mysql_query($q,$connect);
  while($t=mysql_fetch_assoc($a))
  {
  $query="select SUM(Amount * Quantity) as Amount from SWEETS_PURCHASED where C_ID=".$t['C_ID'].";";
  $result=mysql_query($query,$connect);
  if ($result)
  {
  $result=mysql_fetch_assoc($result);
    echo "<tr>";
    echo "<td>".$t['C_ID']."</td>";
    echo "<td>".$t['FirstName'].' '.$t['LastName']."</td>";
    echo "<td>".$t['Date_of_purchase']."</td>";
    echo "<td>".$result['Amount']."</td>";
    echo "</tr>";
  }
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
