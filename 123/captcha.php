<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輸入驗證碼</title>
    <link rel="stylesheet" href="css/main.css">
    <style> <?php ob_start(); session_start(); include "css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
	<?
        if(!$_SESSION['mail'])
        {
            header("Location:login.php");
        }
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
        <!-- <div class="name">
            <span class="hello">你好</span>
            <span class="userShowName">###</span>
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="catchaArea">
            <h1>輸入驗證碼</h1>
            <i class="fas fa-shield-alt"></i>
            <form method="post" action="captcha_result.php">
                <table>
                    <tbody>
                        <tr>
                            <td>驗證</td>
                            <td><input type="text" maxLength="6" size="30" name="captcha" placeholder="請輸入6位驗證碼(區分大小寫)"></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                <input value="重設密碼" type="submit">
            </form>
            <?
                if($_SESSION['captcha_error'])
                {
            ?>
            <span class="wrong">驗證碼錯誤 , 請重新輸入</span>
            <?
                unset($_SESSION['captcha_error']);
                }ob_end_flush();
            ?>
        </div>
        <!--catchaAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>