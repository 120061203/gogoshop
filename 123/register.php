<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用戶註冊</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php include "css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="logo/logo.svg" alt="">
            </a>
        </div>

    </nav>
    <header>
        <div class="banner">

            <div class="bannerLeft">

                <h1>GOGO茶飲</h1>
                <br>
                <h2>總有你的一杯</h2>
                <br>
                <a href="login.php">登入</a>
                <a href="register.php" class="disappear">註冊</a>
            </div>
            <div class="bannerRight">
                <img src="imgs/bannerRight.png" alt="">
                <div class="white"></div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="registerArea">
            <h1>用戶註冊</h1>
            <i class="fas fa-user-circle"></i>
            <form method="get" action="register_result.php">
                <table>
                    <tbody>
                        <tr>
                            <td>帳號</td>
                            <td><input type=text maxLength="10" size="30" name="usr" placeholder="請輸入賬號" required></td>
                        </tr>
                        <tr>
                            <td>密碼</td>
                            <td><input type="password" maxLength="10" size="30" name="pwd" placeholder="請輸入密碼" required></td>
                        </tr>
                        <tr>
                            <td>姓名</td>
                            <td><input type=text maxLength="20" size="30" name="name" placeholder="請輸入姓名" required></td>
                        </tr>
                        <tr>
                            <td>電話</td>
                            <td><input type=text maxLength="20" size="30" name="phone" placeholder="請輸入電話" required></td>
                        </tr>
                        <tr>
                            <td>郵箱</td>
                            <td><input type="email" maxLength="30" size="30" name="mail" placeholder="請輸入郵箱" required></td>
                        </tr>
                        <tr>
                            <td>地址</td>
                            <td><input type=text maxLength="30" size="30" name="addr" placeholder="請輸入地址" required></td>
                        </tr>
                    </tbody>
                </table>
                <input value="註冊" type="submit">

            </form>
            <?
                if($_SESSION['email_error'])
                {
            ?>
            <span class="wrong">此郵箱已註冊 , 請重新輸入</span>
            <?  
                unset($_SESSION['email_error']);
                }ob_end_flush();
            ?>
            <?
                if($_SESSION['account_error'])
                {
            ?>
            <span class="wrong">此帳號已存在 , 請重新輸入</span>
            <?  
                unset($_SESSION['account_error']);
                }ob_end_flush();
            ?>
        </div>

    </div>
</body>