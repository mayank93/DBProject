<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php 
  $query1="select * from  DEPENDENT where E_ID=".(int)$_SESSION['username'].";" ;   
  $result1=mysql_query($query1);
  $query="select * from EMPLOYEE  where E_ID='".(int)$_SESSION['username']."';" ;   
  $result=mysql_query($query);
  $query2="select * from HOURLY_EMP  where E_ID='".(int)$_SESSION['username']."';" ;   
  $result2=mysql_query($query2);
  $query3="select * from SALARIED_EMP  where E_ID='".(int)$_SESSION['username']."';" ;   
  $result3=mysql_query($query3);
  if(mysql_num_rows($result)>0)
  {   
    $row1=mysql_fetch_array($result);
    echo "<table border='0' cellspacing='10' align='center'> ";
        echo "<tr><td>E_ID:</td><td>".$row1[0]."</td></tr>";
    echo " <tr><td>Employee Name:</td><td>".$row1[1]." ".$row1[2]."</td></tr>";
        
    if(mysql_num_rows($result2)>0)
    {
    $row2=mysql_fetch_array($result2);
        echo " <tr><td>Salary per Hour:</td><td>".$row2[1]."</td></tr>";
        echo " <tr><td>Working Hours:</td><td>".$row2[2]."</td></tr>";
        echo " <tr><td>Type:</td><td>Hourly Employee</td></tr>";
    }
    else if(mysql_num_rows($result3)>0) 
    {
    $row3=mysql_fetch_array($result3);
    echo " <tr><td>Salary:</td><td>".$row3[0]."</td></tr>";
        echo " <tr><td>Type:</td><td>Regular Employee</td></tr>";
    }
        echo "</table>";
        echo "</br>";
    echo "<table border='1' cellspacing='1' align='center'> ";
      echo "<tr>";
      echo "<th>Dependent Name</th>";
      echo "<th>Age</th>";
      echo "<th>Releation</th>";
      echo " </tr>";
      while(($row=mysql_fetch_array($result1))!=null)
      {
        echo "   <tr>";
        echo "  <td align='center'>".$row[0]." ".$row[1]."</td>";
        echo "  <td align='center'>".$row[2]."</td>";
        echo "  <td align='center'>".$row[3]."</td>";
        echo "  </tr>";
      }
    echo "</table>";
  }
?>

</div>
<?php
include('footer.php');
}
else 
  header("location:index.php");
?>

