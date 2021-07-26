<?
    include('connect.php');

    $topping_id=$_GET['topping_id'];
    $sql_query="update toppings set status=1 where topping_id='".$topping_id."'";
    mysql_query($sql_query);

    header('Location:productlist.php');
?>