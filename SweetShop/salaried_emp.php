<?php 
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
include 'connection.php';
?>
<form action="salaried_emp2.php">
<table cellspacing="1" align="center">
<tr><td>Salary:</td><td><input type="number" name="sal"></td><td><h6></h6></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit">
</table>
</form>
<?php
include('footer.php');
}
else
{
    header("Location:index.php");
}
?>

