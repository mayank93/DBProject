<?php
include 'header.php';
?>
<div>
    <p align="center"><b> Welcome Mr <?php
//    session_start();
    echo $_SESSION['username']
    ?>	</b></p>
</div>
<?php
include('footer.php');
?>
