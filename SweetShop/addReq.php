<?php
include 'connection.php';
include 'header.php';
?>
<form action='addReq.php'>
<table align='center' cellspacing='1'>
<tr><td>Name Of Sweet:</td><td><select name='name'>
<?php
$q="select Name from SWEETS"; 
$r=mysql_query($q,$connect);
while($a=mysql_fetch_assoc($r))
{
  echo "<option value='".$a['Name']."'>".$a['Name']."</option>";
}
?>
</td></tr>
<tr><td>Quantity:</td><td><input type='number' name='qty'></td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='submit' value='submit'></td></tr>
</table>
</form>
<?php
if(isset($_REQUEST['submit']))
{
  $q2="select Name from REQUIREMENTS where Name='".$_REQUEST['name']."';";
  $r2=mysql_query($q2);
  $a2=mysql_fetch_assoc($r2);
  if($a2['Name']==NULL)
  {
  $q1="select Type from SWEETS where Name='".$_REQUEST['name']."';";
  $r1=mysql_query($q1,$connect);
  $a1=mysql_fetch_assoc($r1);
  $q1="insert into REQUIREMENTS values('".$_REQUEST['name']."',".$_REQUEST['qty'].",'".$a1['Type']."');";
  mysql_query($q1);
  echo mysql_error();
  }
  else
  {
    $q3="update REQUIREMENTS set Quantity=Quantity+".$_REQUEST['qty']." where Name='".$_REQUEST['name']."';";
    mysql_query($q3,$connect);
    echo mysql_error();
  }
echo "<script type='text/javascript'>window.alert('Requirement Added')</script>";
}
include 'footer.php';
?>
