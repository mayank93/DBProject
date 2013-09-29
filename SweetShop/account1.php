<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
    <div>
<?php
  $query="select * from PECUNIARY;" ;
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0){      ?>

<table border="1" cellspacing="1" align="center"> 
        <tr>
        <th>PECUNIARY ID</th>
        <th>TRANS ID</th>
        <th>TYPE</th>
        <th>Expenses</th>
        <th>Income</th>
       </tr>    
<?php
    $Expenses=0;    
    $Income=0;  
    while(($row=mysql_fetch_array($result))!=null)
    {
        echo "<tr>";
        echo "<td align='center'>",$row[0],"</td>";
        echo "<td align='center'>",$row[1],"</td>";
        echo "<td align='center'>",$row[2],"</td>";
        echo "<td align='center'>",$row[3],"</td>";
        echo "<td align='center'>",$row[4],"</td>";
        echo "</tr>" ;
        $Expenses+=$row[3];
        $Income+=$row[4];
    }
        echo "<tr><td align='center' colspan='3'><b>Total</b></td><td align='center'>",$Expenses,"</td><td align='center'>",$Income,"</td></tr>";
        echo "<tr><td align='center' colspan='3'><b>Profit</b></td><td align='center' colspan='2'>",$Income-$Expenses,"</td></tr>";

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

