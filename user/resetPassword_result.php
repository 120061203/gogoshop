<?
    ob_start();
    session_start();

    include("connect.php");
    $sql_query="update users set pwd='".$_POST['pwd']."' where mail='".$_SESSION['mail']."'";
    mysql_query($sql_query);

    unset($_SESSION['mail']);
    unset($_SESSION['captcha']);

    header('Location:login.php');
    ob_end_flush();
?>