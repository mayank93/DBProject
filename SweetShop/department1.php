<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php
  $query="select * from DEPARTMENT;" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

<table border="1" cellspacing="1" align="center"> 
        <tr>
        <th>Department  No.</th>
        <th>Department Name</th>
        <th>Manager Name</th>
        <th>No. of Employee</yh>
       </tr>    
<?php          
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<tr>";
        echo "<td align='center'>",$row[0],"</td>";
        echo "<td align='center'>",$row[1],"</td>";
        echo "<td align='center'>",$row[3]," ".$row[4]."</td>";
        echo "<td align='center'>",$row[2],"</td>";
        echo "</tr>" ;
    }

?>
</table>
<?php }
?>

</div>
<?php 
  include('footer.php');
}
else 
  header("location:index.php");
?>

