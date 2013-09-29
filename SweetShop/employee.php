<?php include 'connection.php'; 
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
<div>
  <h3 align="center">Fill in the Employee Details</center></h3>
<form action = "emp.php" >
  <table border="0" align="center" cellspacing="1">
    <tr><td>First Name: </td><td><input type = "text" name = "fname"></td></tr>
    <tr><td>Last Name: </td><td><input type = "text" name = "lname"></td></tr>
    <tr><td> DOB:</td><td><input type="date" name = "dop" id="dop"></td> </tr> 
    <tr><td>Age: </td><td><input type = "number" name = "age"></td> </tr> 
    <tr><td>Sex: </td><td><input type = "text" name = "sex"></td> </tr> 
    <tr><td>Flat NO: </td><td><input type ="number" name="fno"></td> </tr> 
    <tr><td>Street: </td><td><input type ="text" name ="street"></td> </tr> 
    <tr><td>Sector:</td><td><input type ="text" name ="sector"></td> </tr> 
    <tr><td>City:</td><td><input type="text" name="city"></td> </tr> 
    <tr><td>Department:</td><td><select name="dno">
                         <option value="1">Selling</option>
                        <option value="2">Production</option>
                        <option value="3">Raw Material</option></td>
 </tr> 
    <tr><td>Type:</td><td><select name="type">
                      <option value="hourly">Hourly</option>
                      <option value="salaried">Salaried</option></select></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td> </tr> 
  </table>
</form>

</div>
<?php
include('footer.php');
}
else 
header("location:index.php");

?>  




 
