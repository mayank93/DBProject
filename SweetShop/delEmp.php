<?php
include 'connection.php';
include 'header.php';
?>
<h4 align='center'> Enter The Employee Id of the Employee to be deleted</h4>
<form action='delEmp.php'>
<table align='center' cellspacing='1'>
<tr><td>Employee Id:</td><td><input type='number' name='id'></td>
<tr><td><input type='submit' value='Delete' name='submit'></td></tr>
</table>
</form>
<?php
if(isset($_REQUEST['submit']))
{
  $q="select E_ID from EMPLOYEE where E_ID=".$_REQUEST['id'].";";
  $r=mysql_query($q,$connect);
  $a=mysql_fetch_assoc($r);
  if($a['E_ID']==NULL)
  {
    echo "<script type='text/javascript'>window.alert('No such Employee Exists')</script>";
  }
  else
  {
    $q2="select D_NO from EMPLOYEE where E_ID=".$_REQUEST['id'].";";
    $r=mysql_query($q2,$connect);
    $a=mysql_fetch_assoc($r);
    $q3="update DEPARTMENT set No_of_emoloyee=No_of_emoloyee-1 where DEPT_NO=".$a['D_NO'].";";
    mysql_query($q3);
    echo mysql_error();
    $q1="delete from EMPLOYEE where E_ID=".$_REQUEST['id'].";";
    mysql_query($q1,$connect);
    $q2="delete from authentication where username='".$_REQUEST['E_ID']."'";
    mysql_query($q2,$connect);
    echo "<script type='text/javascript'>window.alert('Employee Deleted')</script>";
    echo mysql_error();
  }
}
  include 'footer.php';
