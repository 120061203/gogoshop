<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重設密碼</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        if(!$_SESSION['mail'])
            {
                header("Location:login.php");
            }

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
        <!-- <div class="name">
            <span class="hello">你好</span>
            <span class="userShowName">###</span>
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="resetPasswordArea">
            <h1>重設密碼</h1>
            <i class="fas fa-lock"></i>
            <form method="post" action="resetPassword_result.php">
                <table>
                    <tbody>
                        <tr>
                            <td>密碼</td>
                            <td><input type="password" maxLength="10" size="30" name="pwd" placeholder="請輸入新密碼"></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                <input value="確認新密碼" type="submit">
            </form>
        </div>
        <!--catchaAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>