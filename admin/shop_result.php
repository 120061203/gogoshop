<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店家登入結果</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include '../css/main.css'; ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>

<?php
    $_SESSION['usr'] = $_POST['usr'];
    $_SESSION['pwd'] = $_POST['pwd'];

    include 'connect.php';

    //$usr=$_POST["usr"];
    //$pwd=$_POST["pwd"];

    //echo $usr;
    //echo $pwd;

    //$select_db=@mysql_select_db("gogodrinkshop");//選擇資料庫
    if (!$select_db) {
        echo'<br>找不到資料庫';
    } else {
        //echo'<br>找到資料庫';
        echo $usr;
        echo $pwd;
        $sql_query = "select * from shop_users where admin_id='".$_SESSION['usr']."'and admin_pwd='".$_SESSION['pwd']."'"; //下sql語法
        $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result

        if (mysql_num_rows($result) == 1) {
            //setcookie('usr',$usr);
            //setcookie('pwd',$pwd);

            echo'<br>登入成功';
            // echo'
            // <meta http-equiv="refresh" content="0; url=shopManage.php">
            // <h5>網頁將在3秒後進首頁<br>若不想等待，請<a href="shopManage.php">點擊此</a></h5>
            // ';
            header('Location:shopManage.php');
            echo'<table border=1>';
            echo'<tr>';
            echo'<tr>';
            echo'<td>usrid';
            echo'<td>passwd';
            // echo'<td>name';
            // echo'<td>Email';
            // echo'<td>phone';
            // echo'<td>address';

            while ($row = mysql_fetch_array($result)) {
                echo'<tr>';
                echo'<td>'.$row[0];
                echo'<td>'.$row[1];
                // echo'<td>'.$row[2];
                // echo'<td>'.$row[3];
                // echo'<td>'.$row[4];
                // echo'<td>'.$row[5];
            }
        } else {
            $_SESSION['shop_wrong']=1;
            header('Location:shop.php');
            echo'<br>你的帳號不存在';
            echo'
            <meta http-equiv="refresh" content="3; url=login.php">
            <h5>網頁將在3秒後進登入畫面<br>若不想等待，請<a href="shop.php">點擊此</a></h5> 
            ';
        }
    }ob_end_flush();
?>

</body>


</html>