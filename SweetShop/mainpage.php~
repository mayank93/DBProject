<?php include 'connection.php';
session_start();
   $login = "select *
   from authentication 
   where username = '".$_REQUEST["username"]."';";
   $result = mysql_query($login,$connect);
   print_r($result);
   $req = mysql_fetch_assoc($result);
   if($req['password']==MD5($_REQUEST['password'])){
     $_SESSION['username']=$_REQUEST['username'];
     $_SESSION['dtype']=$req['type'];
     header('Location:loginPage.php');
   }
   else{
     echo "Invalid user name or password";
   }
?>
