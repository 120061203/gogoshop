<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員專區</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php ob_start(); session_start(); include 'css/main.css'; ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        include 'connect.php';

        //未登入狀態
        $sql_query = "select user_id,pwd from users where user_id='".$_SESSION['usr']."' and pwd='".$_SESSION['pwd']."' and status=1";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:login.php');

        $sql_query = "select name from users where user_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        ?>
    <nav>
    <nav>
        <div class="logo">
            <a href="index.php">
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
            <span class="userShowName"><?echo $name; ?></span>
            <?
                ob_end_flush();
            ?>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="memberArea">
            <h1>會員專區</h1>
            <div class="card">
                <a href="index.php">
                    <i class="fas fa-book-open"></i>
                </a>
                <div class="cardIntro">
                    查看菜單
                </div>
            </div>
            <div class="card">
                <a href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <div class="cardIntro">
                    購物清單
                </div>
            </div>
            <div class="card">
                <a href="myOrder.php">
                    <i class="fab fa-wpforms"></i>
                </a>
                <div class="cardIntro">
                    我的訂單
                </div>
            </div>
            <div class="card">
                <a href="editProfile.php">
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="cardIntro">
                    個人資料
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