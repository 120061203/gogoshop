<?php
    session_start();
    // setcookie('usr','');
    // setcookie('pwd','');
    session_destroy();
    header('Location:../index.php');
?>
<!-- <meta http-equiv="refresh" content="0; url=index.php"> -->
