<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Nandi Sweets</title>
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.gallerax-0.2.js"></script>
    <style type="text/css">
      @import "gallery.css";
    </style>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
  window.onload = function(){
    new JsDatePick({useMode:2,target:"dob",dateFormat:"%Y-%m-%d"});
  };
</script>
<script type="text/javascript">
  window.onload = function(){
    new JsDatePick({useMode:2,target:"dop",dateFormat:"%Y-%m-%d"});
  };
</script>
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <div id="logo">
          <h1><a href='loginpage.php'>Nandi Sweets</a></h1>
        </div>
      </div>
      <!-- end #header -->
<?php 
session_start();
if($_SESSION['dtype']=='0')
{
?>
      <div id='cssmenu'>
        <ul>
          <li ><a href='loginPage.php'><span>Home</span></a></li>
          <li class='has-sub '><a href='#'><span>Sweets</span></a>
          <ul>
            <li><a href='selling1.php'><span>Sweets Status</span></a></li>
            <li><a href='sweets.php'><span>Add Sweets</span></a></li>
            <li><a href='sweets1.php'><span>View Sweets</span></a></li>        
            <li><a href='updatesweets.php'><span>Update Sweets</span></a></li>        
            <li><a href='ingredients.php'><span>Add Ingredients</span></a></li>    
            <li><a href='ingredients1.php'><span>View Ingredients</span></a></li>
            <li><a href='waste1.php'><span>Waste</span></a></li>
          </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Employee</span></a>
          <ul>
            <li><a href='employee.php'><span>Add Employee</span></a></li>
            <li><a href='updateEmp.php'><span>Update Employee</span></a></li>
            <li><a href='delEmp.php'><span>Delete Employee</span></a></li>
            <li><a href='viewEmp.php'><span>View Employee</span></a></li>
            <li><a href='hourly_emp1.php'><span>View Hourly Employee</span></a></li>
            <li><a href='salaried_emp1.php'><span>View Regular Employee</span></a></li>
            <li><a href='dependent.php'><span>Add Dependent</span></a></li>
            <li><a href='dependent1.php'><span>View Dependent</span></a></li>
            <li><a href='department1.php'><span>View Department</span></a></li>
          </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Raw Material</span></a>
          <ul>
            <li><a href='raw_material.php'><span>Add Raw Material</span></a></li>
            <li><a href='raw_materialbyID'><span>View Raw Material by ID</span></a></li>
            <li><a href='raw_material1.php'><span>View Raw Material</span></a></li>
            <li><a href='stock1.php'><span>View Stock</span></a></li>
          </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Accounts</span></a>
           <ul>
          <li><a href='account1.php'><span>Pecuniary</span></a></li>
          <li ><a href='paySalary.php'><span>Pay Salary</span></a></li>
           </ul>
        </li>
          <li class='has-sub '><a href='#'><span>Customer</span></a>
           <ul>
          <li ><a href='customer.php'><span>Billing</span></a></li>
          <li ><a href='viewCustbyID.php'><span>View Billing by C_ID</span></a></li>
          <li ><a href='viewCust.php'><span>View Billing</span></a></li>
           </ul>
        </li>
          <li ><a href='production.php'><span>Supply</span></a></li>
          <li class='has-sub '><a href='#'><span>Requirement</span></a>
           <ul>
          <li ><a href='requirement.php'><span>Produce</span></a></li>
          <li ><a href='addReq.php'><span>Add Requirements</span></a></li>
           </ul>
        </li>
          <li><a href='logout.php'><span>Logout</span></a></li>
        </ul>
      </div>
<?php
} 
else if($_SESSION['dtype']=='1')
{
?>
<div id='cssmenu'>
  <ul>
    <li ><a href='loginPage.php'><span>Home</span></a></li>
    <li class='has-sub '><a href='#'><span>Sweets</span></a>
    <ul>
      <li><a href='selling1.php'><span>Sweets Status</span></a></li>
      <li><a href='sweets1'><span>View Sweets</span></a></li>        
      <li><a href='ingredients1.php'><span>View Ingredients</span></a></li>
      <li><a href='waste1.php'><span>Waste</span></a></li>
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Employee</span></a>
    <ul>
      <li ><a href='empdetail.php'><span>Employee Details</span></a></li>
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Customer</span></a>
    <ul>
      <li ><a href='customer.php'><span>Billing</span></a></li>
      <li ><a href='viewCustbyID.php'><span>View Billing by C_ID</span></a></li>
      <li ><a href='viewCust.php'><span>View Billing</span></a></li>
    </ul>
    </li>
    <li><a href='logout.php'><span>Logout</span></a></li>
  </ul>
</div>
<?php
} 
 
else if($_SESSION['dtype']=='2')
{
?>
<div id='cssmenu'>
  <ul>
    <li ><a href='loginPage.php'><span>Home</span></a></li>
    <li class='has-sub '><a href='#'><span>Sweets</span></a>
    <ul>
      <li><a href='sweets1'><span>View Sweets</span></a></li>        
      <li><a href='ingredients.php'><span>Add Ingredients</span></a></li>    
      <li><a href='ingredients1.php'><span>View Ingredients</span></a></li>
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Employee</span></a>
    <ul>
      <li ><a href='empdetail.php'><span>Employee Details</span></a></li>
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Raw Material</span></a>
    <ul>
      <li><a href='stock1.php'><span>View Stock</span></a></li>
    </ul>
    </li>
    <li ><a href='production.php'><span>Supply</span></a></li>
    <li ><a href='requirement.php'><span>Produce</span></a></li>
    <li><a href='logout.php'><span>Logout</span></a></li>
  </ul>
</div>
<?php
}  
else if($_SESSION['dtype'] =='3')
{
?>
<div id='cssmenu'>
  <ul>
    <li><a href='loginPage.php'><span>Home</span></a></li>
    <li class='has-sub '><a href='#'><span>Sweets</span></a>
    <ul>
      <li><a href='sweets1'><span>View Sweets</span></a></li>        
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Employee</span></a>
    <ul>
      <li ><a href='empdetail.php'><span>Employee Details</span></a></li>
    </ul>
    </li>
    <li class='has-sub '><a href='#'><span>Raw Material</span></a>
    <ul>
      <li><a href='raw_material.php'><span>Add Raw Material</span></a></li>
      <li><a href='raw_materialbyID'><span>View Raw Material by ID</span></a></li>
      <li><a href='raw_material1.php'><span>View Raw Material</span></a></li>
      <li><a href='stock1.php'><span>View Stock</span></a></li>
    </ul>
    </li>
    <li><a href='logout.php'><span>Logout</span></a></li>
  </ul>
</div>
<?php
} 
?>

      <div id="welcome">
        <h2 class="title" align="center">Nandi Sweets</h2>
      </div>

