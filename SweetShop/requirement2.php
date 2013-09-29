<?php include 'connection.php';
session_start();
if(isset($_SESSION['username'])){
  if(isset($_REQUEST["submit"])){
    $req=$_REQUEST["req"];
    for ($i=0;$i<sizeof($req);$i++){
      $query1="select * from REQUIREMENTS where Name='".$req[$i]."';" ;   
      $result1=mysql_query($query1);
      if(mysql_num_rows($result1)>0)
        $row1=mysql_fetch_array($result1);
      $query2="select * from SWEETS where Name='".$req[$i]."';" ;
      $result2=mysql_query($query2);
      if(mysql_num_rows($result2)>0)
        $row2=mysql_fetch_array($result2);
      $query="insert into  PRODUCTION(Name,Production_cost,Quantity,supplied) values('".$req[$i]."',".$row2['productionCost'].",".$row1['Quantity'].",0);";
      mysql_query($query);
      $query="select MAX(P_ID) as P_ID from PRODUCTION where name='".$req[$i]."'";    // Searching for P_ID corresponding to Current production
      $result=mysql_query($query,$connect);    
      if(mysql_num_rows($result)>0)
        $row3=mysql_fetch_array($result);
      $query="insert into  LEADS_TO values(".$row3['P_ID'].",'".$req[$i]."',".$row1['Quantity'].");";
      mysql_query($query);
      $query="delete from REQUIREMENTS where Name='".$req[$i]."' and Type='".$row1['Type']."';" ;
      mysql_query($query);
      $query="select * from  SWEETS_INGREDIENTS where Name='".$req[$i]."';";
      $result=mysql_query($query);
      while(($row=mysql_fetch_array($result))!=null){   
        $qty=$row['Quantity'] * $row1['Quantity'];
        $query="update STOCK set Quantity=Quantity-".$qty." where Name='".$row['Ingredient']."';";
        echo $query;
        mysql_query($query); 
      }}
      #####################################################################################################################
      $q="select max(P_ID) as P_ID from PRODUCTION;";
      $r=mysql_query($q,$connect); 
      $a=mysql_fetch_assoc($r);
      for($i=0;$i<sizeof($req);$i++)
      {
       // echo "Hello";
        $q1="select P_ID,Production_Cost * Quantity as Total from PRODUCTION where P_ID =".$a['P_ID']."-".$i.";";
        $r1=mysql_query($q1);
        $a1=mysql_fetch_assoc($r1);
        print_r($a1);
        echo mysql_error();
        $q2="insert into PECUNIARY values('',".$a['P_ID']."-".$i.",'production',".$a1['Total'].",0);";
        $r=mysql_query($q2,$connect);

      }
      
      ############################################################
      header("location:requirement.php");
  }}
else 
      header("location:index.php");
?>
