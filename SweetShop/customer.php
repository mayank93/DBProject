<?php include 'connection.php';
include('header.php');

if(isset($_SESSION['username']))
{
?>
<div>
    <form action = "customer1.php" name="public" method="GET" >
  <table border='0' cellspacing='1' align='center'>
      <tr> <td>First Name:</td><td><input type = "text" name = "fname"></td></tr>
      <tr><td>Last Name:</td><td><input type = "text" name = "lname"></td></tr>
      <!--Sweets Purchased: <input type="text" name = "sweetPurchased"><br/>
      Amount:     <input type = "number" name = "amount"><br/>
      Quantity:   <input type = "number" name = "quantity"><br/>-->
      <tr><td>No Of sweets:</td><td><input type="number" name="nos"></td></tr>
      <tr><td>Date Of Purchase:</td><td> <input type ="date" name="dop" id="dop"></td></tr>
      <!--    Type: <input type="text" name="text"><br/>-->
      <tr><td colspan='2'align='center'><input type="submit" name="submit" value="submit"></td>
      </table>   
    </form>
 </div>

<?php
  include('footer.php');
  }
 else 
 header("location:index.php");

  ?>
