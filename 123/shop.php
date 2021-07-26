<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店家後台登入</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php ob_start(); session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        include('connect.php');
        
        $sql_query = "select admin_id,admin_pwd from shop_users where admin_id='".$_SESSION['usr']."' and admin_pwd='".$_SESSION['pwd']."'";
        $result = mysql_query($sql_query);
        if(mysql_fetch_array($result))
            header('Location:shopManage.php');
    ?>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="logo/logo.svg" alt="">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="loginArea">
            <h1>店家後台登入</h1>
            <i class="fas fa-user-circle"></i>
            <form method="post" action="shop_result.php">
                <table>
                    <tbody>
                        <tr>
                            <td>帳號</td>
                            <td><input type=text maxLength="10" size="30" name="usr" placeholder="請輸入賬號"></td>
                        </tr>
                        <tr>
                            <td>密碼</td>
                            <td><input type="password" maxLength="10" size="30" name="pwd" placeholder="請輸入密碼"></td>
                        </tr>

                        </tr>
                    </tbody>
                </table>
                <input value="登入" type="submit">
    
            </form>
            <span class="wrong">賬號或密碼錯誤 , 請重新輸入</span>
        </div>
        <!--loginAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>