<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除會員</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <?php
        $user_id=$_GET["user_id"];
        echo $user_id;
    ?>
    <?php
        include 'connect.php';
        $sql_query="DELETE FROM users WHERE user_id='".$user_id."'";
        mysql_query($sql_query);
        header('Location:myVip.php');
    ?>
    
</body>
</html>