<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增產品</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "../css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        include('connect.php');

        //檢查登入狀態
        $sql_query = "select admin_id,admin_pwd from shop_users where admin_id='".$_SESSION['usr']."' and admin_pwd='".$_SESSION['pwd']."'";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:shop.php');

        $sql_query = "select admin_id from shop_users where admin_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
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
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
            <?ob_end_flush();?>
        </div>
    </nav>
    <div class="container">
        <div class="shopManageArea">
            <h1>新增產品</h1>
            <div class="card">
                <a href="newDrink.php">
                    <i class="fas fa-coffee"></i>
                </a>
                <div class="cardIntro">
                    新增飲料
                </div>
            </div>
            <div class="card">
                <a href="newTopping.php">
                    <i class="fas fa-candy-cane"></i>
                </a>
                <div class="cardIntro">
                    新增配料
                </div>
            </div>
        </div>

    </div>
</body>

</html>