<?
    include('connect.php');

    $drink_id=$_GET['drink_id'];
    $sql_query="update drinks set status=1 where drink_id='".$drink_id."'";
    mysql_query($sql_query);

    header('Location:productlist.php');
?>