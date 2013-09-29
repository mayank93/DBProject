<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<form action="viewCustbyID.php" method="post" >
<table border="0" cellspacing="10" align="center"> 
<tr><td> C_ID: <input type="text" name="cid"></td><td align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php 
if(isset($_REQUEST["submit"]))
{
  $cid=$_REQUEST["cid"];
  $query="select * from CUSTOMER where C_ID='".$cid."';" ;   
  $result=mysql_query($query);
  $query1="select * from SWEETS_PURCHASED where C_ID='".$cid."';" ;   
  $result1=mysql_query($query1);
  $query2="select SUM(Amount) as Amount, SUM(Quantity) as Qty from SWEETS_PURCHASED where C_ID='".$cid."';" ;   
  $result2=mysql_query($query2);
  if(mysql_num_rows($result)>0)
  {   
    $row1=mysql_fetch_array($result);
    $row2=mysql_fetch_array($result2);
    echo " <p align='center'><b> Bill </b></p>";
    echo "<table border='0' cellspacing='10' align='center'> ";
        echo "<tr><td>C_ID:</td><td>".$row1[0]."</td></tr>";
        echo " <tr><td>Name:</td><td>".$row1[1]." ".$row1[2]."</td></tr>";
        echo " <tr> <td>Date_of_Purchase:</td><td>".$row1[3]."</td></tr>";
        echo "</table>";
        echo "</br>";
    echo "<table border='1' cellspacing='1' align='center'> ";
      echo "<tr>";
      echo "<th>Sweet Name</th>";
      echo "<th>Type</th>";
      echo "<th>Quantity(Kg.)</th>";
      echo "<th>Amount(Rs.)</th>";
      echo " </tr>";
      $amount=0;
      while(($row=mysql_fetch_array($result1))!=null)
      {
        echo "   <tr>";
        echo "  <td align='center'>".$row[1]."</td>";
        echo "  <td align='center'>".$row[4]."</td>";
        echo "  <td align='center'>".$row[3]."Kg</td>";
        echo "  <td align='center'> Rs: ".$row[2]*$row[3]."</td>";
        echo "  </tr>";
        $amount+=$row[2]*$row[3];
      }
      echo " <tr><td colspan='2' align='center'><b>TOTAL</b></td><td align='center'>".$row2['Qty']." Kg</td><td align='center'>Rs: ".$amount."</td></tr>";
    echo "</table>";
  }
  else{
     echo "<script type='text/javascript'>window.alert('No such Customer ID');window.location.replace('viewCustbyID.php')</script>";

  }
}
?>

</div>
<?php
include('footer.php');
}
else 
  header("location:index.php");
?>

