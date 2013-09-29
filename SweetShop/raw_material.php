<?php include 'connection.php';
//session_start();
  include('header.php');
if(isset($_SESSION['username']))
{
?>
	<div>
<form action="raw_material.php" method="post" >
<table border="0" cellspacing="1" align="center"> 
<tr><td>Name:</td><td><input type="text" name="name"></td></tr>
<tr><td>Qty:</td><td><input type="text" name="qty"></td></tr>
<tr><td>Cost:</td><td><input type="text" name="cost"></td></tr>
<tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
  
</div>
<?php
  include('footer.php');
  if(isset($_REQUEST["submit"]))
  {
    $name=$_REQUEST["name"];
    $qty=$_REQUEST["qty"];
    $cost=$_REQUEST["cost"];
    $insert="insert into RAW_MATERIAL(Name,Quantity,Cost) values('".$name."',".$qty.",".$cost.");";
    mysql_query($insert);
    $rid="select R_ID from RAW_MATERIAL where Name='".$name."';";
    $rid=mysql_query($rid);
    if(mysql_num_rows($rid)>0){                
    while(($row=mysql_fetch_array($rid))!=null)
    {
        $Rid=$row[0];                
    }
    }
    include 'payRawMaterial.php';                    
   $insert="insert into FILLS(Name,R_ID) values('".$name."',".$Rid.");";
    mysql_query($insert);
    echo mysql_error();
    $sname="select * from STOCK where Name='".$name."';";
    $sname=mysql_query($sname);
    if(mysql_num_rows($sname)>0){                      
   $update="update STOCK set Quantity=Quantity+".$qty." where Name='".$name."';";
    mysql_query($update);
    }
    else
    {
        $insert="insert into STOCK(Name,Quantity) values('".$name."',".$qty.");";
        mysql_query($insert);
    }
//    header("location:raw_material.php");
  }
}
else 

      header("location:index.php");

?>

