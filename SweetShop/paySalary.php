<?php
include 'connection.php';
include 'header.php';
if(isset($_SESSION['username']))
{

?>
<script>
function func1()
{
  window.location="listSalaried.php";
}
function func2()
{
  window.location="listHourly.php";
}
</script>
<div align="center"> 
<button  onclick="func1()">Salaried</button>
</div>
<div align="center">
<button onclick="func2()">Hourly</button>
</div>
<?php
  include('footer.php');
}
else
  header('location:index.php');

?>
