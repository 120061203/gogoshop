<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>付款取貨方式</title>
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
        ob_end_flush();
        ?>
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
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="payArea">
            <h1>付款取貨方式</h1>
            <form action="pay_result.php" method="get">
                <table>
                    <tbody>
                        <tr>
                            <td>付款方式 :</td>
                            <td><label>線上支付<input type="radio" value="online" name="pay_way" checked></label></td>
                            <td><label>現金支付<input type="radio" value="cash" name="pay_way"></label></td>
                        </tr>
                        <tr>
                            <td>收貨方式 :</td>
                            <td><label>來店自取<input type="radio" value="come"  name="pickup_way" checked></label></td>
                            <td><label>外送到府<input type="radio" value="delivery" name="pickup_way"></label></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="確認訂單">
            </form>
        </div>
        <!--payAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>