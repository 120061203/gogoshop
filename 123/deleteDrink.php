<?php

include 'connect.php';
$cart_id = $_GET['cart_id'];
$sql_query = "update cart set status=0 where cart_id='".$cart_id."'"; //status 0 為刪除
mysql_query($sql_query);
header('Location:cart.php');
