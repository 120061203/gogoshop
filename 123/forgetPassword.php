<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php session_start(); include "css/main.css" ?></style>
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
        <!-- <div class="back">
            <a href="index.php">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div> -->
        <!-- <div class="name">
            <span class="hello">你好，</span>
            <span class="userShowName">###</span>
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div> -->
    </nav>
    <div class="container">
        <div class="forgetPasswordArea">
            <h1>忘記密碼</h1>
            <i class="fas fa-user-circle"></i>
            <form method="post" action="forgetPassword_result.php">
                <table>
                    <tbody>
                        <tr>
                            <td>郵箱</td>
                            <td><input type="email" maxLength="30" size="30" name="mail" placeholder="註冊時使用之郵箱" required></td>
                        </tr>

                        </tr>
                    </tbody>
                </table>
                <input value="寄驗證碼" type="submit">
            </form>
            <?
                if($_SESSION['email_error'])
                {
            ?>
            <span class="wrong">查無此郵箱 , 請重新輸入</span>
            <?  
                unset($_SESSION['email_error']);
                }ob_end_flush();
            ?>
        </div>
        <!--forgetPasswordEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>