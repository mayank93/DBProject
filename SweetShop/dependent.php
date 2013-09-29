
<?php include 'connection.php';
  include('header.php');
if(isset($_SESSION['username']))
{
?>
	<div>
      <form action="dependent.php" method="get">
          <table border='0' cellspacing='1' align="center">
              <tr>  <td>E_ID:</td><td> <input type="text" name="E_ID"></td></tr>
              <tr><td>FirstName:</td><td> <input type="text" name="fname"></td</tr>
              <tr><td>LastName:</td><td> <input type="text" name="lname"><br/></td></tr>
              <tr><td>Age:</td><td><select name="age">
                      <?php 
          for ($i=1; $i<=80; $i++)
                    {   
                              echo " <option value=".$i.">".$i."</option></br>";
                    }   
?>  
        </select></td></tr>

<tr><td>Releation: </td><td><input type="text" name="rel"><br/></td></tr>
    <tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
</table>   
 </form>

</div>

<?php
          include('footer.php');
          if(isset($_REQUEST["submit"]))
          {
            $E_ID=$_REQUEST["E_ID"];
            $fname=$_REQUEST["fname"];
            $lname=$_REQUEST["lname"];
            $age=$_REQUEST["age"];
            $rel=$_REQUEST["rel"];
            $q="select * from EMPLOYEE where E_ID=".$E_ID.";";
            $r=mysql_query($q);
            $a=mysql_fetch_assoc($r);
            if($a['E_ID']==NULL)
            {
              echo "<script type='text/javascript'>window.alert('No such Employee Exists');window.location.replace('dependent.php')</script>";
            }

            else
            {
              $insert ="insert into DEPENDENT values('$fname','$lname',$age,'$rel',$E_ID)";
              echo"$insert";
              mysql_query($insert);
              header("location:dependent.php");
            }
          }
}
else 

  header("location:index.php");

?>
