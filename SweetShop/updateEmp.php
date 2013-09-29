<?php
include 'connection.php';
include 'header.php';
?>
<?php
if(isset($_REQUEST['submit']))
{
  $q="select * from EMPLOYEE where E_ID=".$_REQUEST['id'].";";
  $r=mysql_query($q,$connect);
  $a=mysql_fetch_assoc($r);
  if($a['E_ID']==NULL)
  {
    echo "<script type='text/javascript'>window.alert('No such Employee Exists');window.location.replace('updateEmp.php')</script>";
  }
  else
  {
    $_SESSION['ID']=$a['E_ID'];
    $_SESSION['dnum']=$a['D_NO'];
    echo "<form action='updateEmp_trans.php'>";
    echo "<table align='center'>";
    echo "<tr><td>FirstName</td><td><input type='text' name='fname' value=".$a['FirstName']."></td></tr>";
    echo "<tr><td>LastName</td><td><input type='text' name='lname' value=".$a['LastName']."></td></tr>";
    echo "<tr><td>DOB</td><td><input type='date' name='dop' id='dop' value=".$a['DOB']."></td></tr>";
    echo "<tr><td>Age</td><td><input type='number' name='age' value=".$a['Age']."></td></tr>";
    echo "<tr><td>Sex: </td><td><input type = 'text' name = 'sex' value=".$a['Sex']."></td> </tr>"; 
    echo "<tr><td>Flat NO: </td><td><input type ='number' name='fno' value=".$a['FlatNo']."></td> </tr>"; 
    echo " <tr><td>Street: </td><td><input type ='text' name ='street' value=".$a['Street']."></td> </tr>"; 
    echo "<tr><td>Sector:</td><td><input type ='text' name ='sector' value=".$a['sector']."></td> </tr>"; 
    echo " <tr><td>City:</td><td><input type='text' name='city' value=".$a['city']."></td> </tr>"; 
    echo "<tr><td>Department:</td><td><select name='dno' >";
    if ($a['D_NO']==0)
      echo " <option value='0' selected=selected>Admin</option>";
    else
      echo " <option value='0' >Admin</option>";
    if ($a['D_NO']==1)
    echo " <option value='1' selected=selected>Selling</option>";
    else
    echo " <option value='1'>Selling</option>";
    if ($a['D_NO']==2)
    echo "<option value='2' selected=selected>Production</option>";
    else
    echo "<option value='2'>Production</option>";
    if ($a['D_NO']==3)
    echo "<option value='3' selected=selected>Raw Material</option></td>";
    else
    echo "<option value='3'>Raw Material</option></td>";
    echo "</tr>";
    echo "<tr><td colspan='2' align='center'><input type='submit' name='submit' value='submit'></tr></td>";
    echo "</table></form>"; 
include 'footer.php';
  }
}
else
{
?>
<h4 align='center'> Enter The Employee Id of the Employee to be updated</h4>
<form action='updateEmp.php'>
<table align='center' cellspacing='1'>
<tr><td>Employee Id:</td><td><input type='number' name='id'></td>
<tr><td><input type='submit' value='Search' name='submit'></td></tr>
</table>
</form>
<?php
  include 'footer.php';
}
?>

