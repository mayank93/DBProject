<?php include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{  
  if(isset($_REQUEST['submit']))
  {
  $fname=$_REQUEST['fname'];
  $dno=$_REQUEST['dno'];
  $insert = "insert into EMPLOYEE values (
    '',
    '".$fname."',
    '".$_REQUEST['lname']."',
    '".$_REQUEST['dop']."',
    '".$_REQUEST['age']."',
    '".$_REQUEST['sex']."',
    '".$_REQUEST['fno']."',
    '".$_REQUEST['street']."',
    '".$_REQUEST['sector']."',
    '".$_REQUEST['city']."',
    '".$dno."'
  );";
  mysql_query($insert);
  echo mysql_error();
  #############################################################################################
  $q="update DEPARTMENT set No_of_emoloyee=No_of_emoloyee+1 where DEPT_NO=".$dno.";";
  mysql_query($q);
  #############################################################################################
  $i="select max(E_ID) as E_ID from EMPLOYEE;";
  $r=mysql_query($i,$connect);
  $a=mysql_fetch_assoc($r);
  $query="insert into authentication values('".$a['E_ID']."',md5('".$_REQUEST['fname']."'),".$_REQUEST['dno'].");";
  echo $query;
  mysql_query($query,$connect);
  $t=$a['E_ID'];
  $_SESSION['type']=$_REQUEST['type'];
  $_SESSION['E_ID']=$t;
if($_SESSION['type']=='hourly')
  header("location:hourly_emp.php");
else if($_SESSION['type']=='salaried')
  {
    header("location:salaried_emp.php");
  }
  }
}else
    header("location:index.php");
?>
