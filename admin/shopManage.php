<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php ob_start(); session_start(); include "../css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        include 'connect.php';
        // echo $_SESSION['usr'];

        //檢查登入狀態
        $sql_query = "select admin_id,admin_pwd from shop_users where admin_id='".$_SESSION['usr']."' and admin_pwd='".$_SESSION['pwd']."'";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:shop.php');

        $sql_query = "select admin_id from shop_users where admin_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        // echo $name;
    ?>
    <nav>
        <div class="logo">
            <a href="shopManage.php">
                <img src="logo/logo.svg" alt="">
            </a>
        </div>
        <!-- <div class="back">
            <a href="index.php">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div> -->
        <div class="name">
            <span class="hello">你好，</span>
            <span class="userShowName"><?echo $name?></span>
            <?
                ob_end_flush();
            ?>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="shopManageArea">
            <h1>後台管理系統</h1>
            <div class="card">
                <a href="newDrink.php">
                    <i class="fas fa-coffee"></i>
                </a>
                <div class="cardIntro">
                    新增飲料
                </div>
            </div>
            <div class="card">
                <a href="productList.php">
                    <i class="fab fa-wpforms"></i>
                </a>
                <div class="cardIntro">
                    產品清單
                </div>
            </div>
            <div class="card">
                <a href="myVip.php">
                    <i class="fas fa-users"></i>
                </a>
                <div class="cardIntro">
                    我的會員
                </div>
            </div>
            <div class="card">
                <a href="historyOrder.php">
                    <i class="fab fa-wpforms"></i>
                </a>
                <div class="cardIntro">
                    歷史訂單
                </div>
            </div>
            <div class="card">
                <a href="waitOrder.php">
                    <i class="far fa-clock"></i>
                </a>
                <div class="cardIntro">
                    待做訂單
                </div>
            </div>
            <div class="card">
                <a href="logout_temp.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <div class="cardIntro">
                    賬號登出
                </div>
            </div>
        </div>

    </div>
</body>

</html>