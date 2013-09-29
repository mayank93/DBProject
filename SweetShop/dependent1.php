<?php include 'connection.php';
//session_start();
include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<form action="dependent1.php" method="post" >
<table border="0" cellspacing="10" align="center"> 
<tr><td> E-ID: <input type="text" name="eid"></td><td align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php 
if(isset($_REQUEST["submit"]))
{
  $eid=$_REQUEST["eid"];
  $query1="select * from  DEPENDENT where E_ID='".$eid."';" ;   
  $result1=mysql_query($query1);
  $query="select * from EMPLOYEE  where E_ID='".$eid."';" ;   
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0)
  {   
    $row1=mysql_fetch_array($result);
    echo "<table border='0' cellspacing='10' align='center'> ";
        echo "<tr><td>E_ID:</td><td>".$row1[0]."</td></tr>";
        echo " <tr><td>Employee Name:</td><td>".$row1[1]." ".$row1[2]."</td></tr>";
        echo "</table>";
        echo "</br>";
        echo "<form action='delDependent.php'>";
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
        echo "  <td><a href='delDependent.php?delete=delete&eid=".$row1[0]."&name=".$row[0]."'> Delete</a></td>";
        echo "  </tr>";
      }
      echo "</table>";
      echo "</form>";
  }
  else{
    echo "<script type='text/javascript'>window.alert('No such Employee Exists');window.location.replace('dependent1.php')</script>";
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

