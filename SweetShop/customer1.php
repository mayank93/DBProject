<?php include 'connection.php';
include('header.php');
if(isset($_SESSION['username']))
{ 
if(isset($_REQUEST['submit']))
{
$insert="insert into CUSTOMER values (   
    '',
    '".$_REQUEST["fname"]."',
    '".$_REQUEST["lname"]."',
    '".$_REQUEST["dop"]."'
)";
mysql_query($insert,$connect);                          //Values Inserted into CUSTOMER table
$query="select MAX(C_ID) as C_ID from CUSTOMER";    // Searching for C_ID corresponding to Current customer
$result=mysql_query($query,$connect);                                         
$req=mysql_fetch_assoc($result);
echo mysql_error();
echo "<form action='customer_trans.php' method='GET'>";                       //Generating form to get details of all sweetrs purchased.
$_SESSION['C_ID']= $req['C_ID'];                                               // to be used in customer_trans.php
$_SESSION['nos']=$_REQUEST['nos']; // same as above
?>
<table border="0" align="center" cellspacing="1">
<?php
for($i=0;$i<$_REQUEST['nos'];$i++)
{
  $query="select * from SELLING;" ;
  $result=mysql_query($query);
  echo "<tr><td>Name:</td><td><select name='name[]'>";
  while(($row=mysql_fetch_array($result))!=null)
  {   
    echo "<option value='".$row[0]."'>".$row[0]."</option>";
  }  
    echo "</select>";
//  echo "<tr><td>Name: </td><td><input type='text' name='name[]'></td></tr>";
//  echo "<tr><td>Amount:</td><td> <input type='number' name='amt[]'></td></tr>";
  echo "<tr><td>Quantity:</td><td><input type='number' name='qty[]'></td></tr>";
//  echo "<tr><td>Type:</td><td><input type='text' name='type[]'></td></tr>";
  echo "<tr><td></br></td><td></br> </td></tr>";
} ?>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td> </tr>
</table>
<?php
  echo mysql_error();
}
}
else
  header('location:index.php');

?>
