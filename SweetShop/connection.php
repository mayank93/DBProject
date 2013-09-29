<?php
// this file is for connecting to mysql server and using the sweet_shop database. We will be including this is every php file that will access the database.
$connect=mysql_connect("localhost","root","hotmailyaho");
mysql_query("use sweet_shop;",$connect);
?>
