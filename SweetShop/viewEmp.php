<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
<div>
<table align='center' cellspacing='1' border='1'>
 <tr>
    <td> E_ID </td>
    <td> Name </td>
    <td> DOB </td> 
    <td> Sex </td>
    <td> Address </td>
    <td> Department </td>
    
</tr>
    <?php
  $q="select * from EMPLOYEE";
  $a=mysql_query($q,$connect);
  while($t=mysql_fetch_assoc($a))
  {
    echo "<tr>";
    echo "<td>".$t['E_ID']."</td>";
    echo "<td>".$t['FirstName'].' '.$t['LastName']."</td><td>".$t['DOB']."</td><td>".$t['Sex']."</td>";
    echo "<td>".$t['FlatNo'].','.$t['Street'].','.$t['sector'].','.$t['city']."</td>";
    echo "<td>".$t['D_NO']."</td>";
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
