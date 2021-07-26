<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>按下結單按鈕後</title>
</head>
<body>
    <?php
        include 'connect.php';
        $order_id=$_GET['order_id'];
        echo $order_id;
        $sql_query="UPDATE orders SET status =3 WHERE order_id='".$order_id."'";
        mysql_query($sql_query);
        header('Location:waitOrder.php');
    ?>
</body>
</html>