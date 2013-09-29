<?php
include 'connection.php';
include 'header.php';
if(isset($_SESSION['username']))
  {
if(isset($_REQUEST['submit']))
{
  $arr=$_REQUEST['arr'];
  for($i=0;$i<sizeof($arr);$i++)
  {
    $q="select Salary_per_hour*Working_hours as total from HOURLY_EMP where E_ID=".$arr[$i].";";  
    $a=mysql_query($q,$connect);
    $t=mysql_fetch_assoc($a);
    $i1="insert into PECUNIARY values('','".$arr[$i]."','salary',".$t['total'].",0);";
    mysql_query($i1,$connect);
    echo mysql_error();
  }
//  header("location:paySalary.php");
}
$i="select FirstName,LastName,EMPLOYEE.E_ID from EMPLOYEE,HOURLY_EMP where EMPLOYEE.E_ID=HOURLY_EMP.E_ID;";
$r=mysql_query($i,$connect);
//$t=mysql_fetch_assoc($r);
echo "<form action='#'>";
echo "<table align='center' cellspacing='2'>";
echo "<tr><td align='center'>Select</td><td align='center'>Employee Id</td><td align='center'>Name</td></tr>";
while($t=mysql_fetch_array($r))
{
  echo "<tr>";
  echo "<td align='center'><input type='checkbox' name='arr[]' value=".$t['E_ID']."></td>";
  echo "<td align='center'>".$t['E_ID']."</td>";
  echo "<td align='center'>".$t['FirstName'].' '.$t['LastName']."</td>";
  echo "</tr>";
}
echo "<tr>";
echo "<td colspan='3' align='center'>";
echo "<input type='submit' value='submit' name='submit'>";
echo "</td></tr>";
echo "</table>";
echo "</form>";
  }
else
  header('location:index.php');

?>
