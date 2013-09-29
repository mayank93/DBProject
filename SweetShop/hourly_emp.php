<?php 
//session_start();
include 'header.php';
if(isset($_SESSION['username']))
{
include 'connection.php';
?>
<form action="hourly_emp2.php">
<table cellspacing="1" align="center">
<tr><td>Salary:</td><td><input type="number" name="sal"></td><td><h6>(per hour)</h6></td></tr>
<tr><td>Working Hours:</td><td><input type="number" name="hrs"></td><td><h6>(per day)</h6><td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit">
</table>
</form>
<?php
include('footer.php');
}
else
{
    header("location:index.php");
}
?>

