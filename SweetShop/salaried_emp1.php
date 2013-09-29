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
    <td> Salary </td>
    <td> DOB </td> 
    <td> Sex </td>
    <td> Address </td>
    <td> Department </td>
    
</tr>
    <?php
  $q="select * from SALARIED_EMP ";
  $a=mysql_query($q,$connect);
  while($t=mysql_fetch_array($a))
  {
  $q1="select * from EMPLOYEE where E_ID=".$t['E_ID'].";";
  $a1=mysql_query($q1,$connect);
 $t1=mysql_fetch_assoc($a1);
    echo "<tr>";
    echo "<td>".$t['E_ID']."</td>";
    echo "<td>".$t1['FirstName'].' '.$t1['LastName']."</td>";
    echo "<td>".$t['Salary']."</td>";
    echo "<td>".$t1['DOB']."</td><td>".$t1['Sex']."</td>";
    echo "<td>".$t1['FlatNo'].','.$t1['Street'].','.$t1['sector'].','.$t1['city']."</td>";
    echo "<td>".$t1['D_NO']."</td>";
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
