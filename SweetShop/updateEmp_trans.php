<?php
include 'connection.php';
session_start();
//echo $_SESSION['ID'];
//if($_SESSION['dnum']==1)
$q="update DEPARTMENT set No_of_emoloyee=No_of_emoloyee-1 where DEPT_NO=".$_SESSION['dnum'].";";
mysql_query($q);
$i="update EMPLOYEE set FirstName='".$_REQUEST['fname']."',
LastName='".$_REQUEST['lname']."',
DOB='".$_REQUEST['dop']."',
Age=".$_REQUEST['age'].",
Sex='".$_REQUEST['sex']."',
FlatNo='".$_REQUEST['fno']."',
Street='".$_REQUEST['street']."',
sector='".$_REQUEST['sector']."',
city='".$_REQUEST['city']."',
D_NO=".$_REQUEST['dno']."
where E_ID=".$_SESSION['ID'].";";
mysql_query($i,$connect);
if($_REQUEST['dno']!=0)
{
  $q1="update DEPARTMENT set No_of_emoloyee=No_of_emoloyee+1 where DEPT_NO=".$_REQUEST['dno'].";";
  mysql_query($q1);
}
$update="update authentication set type='".$_REQUEST['dno']."' where username='".$_SESSION['ID']."';";
mysql_query($update,$connect);
echo mysql_error();
echo "<script type='text/javascript'>window.alert('Employee Updated');window.location.replace('updateEmp.php')</script>";
//header("location:updateEmp.php");
?>
