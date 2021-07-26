<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系統登入</title>
    <link rel="stylesheet" href="css/main.css">
	<style><?php ob_start(); session_start(); include "css/main.css"; ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
	

</head>

<body>
    <?
        include('connect.php');
        //未登入狀態
        $sql_query = "select user_id,pwd from users where user_id='".$_SESSION['usr']."' and pwd='".$_SESSION['pwd']."' and status=1";
        $result = mysql_query($sql_query);
        if(mysql_fetch_array($result))
            header('Location:index.php');
    ?>
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
                <a href="login.php" class="disappear">登入</a>
                <a href="register.php">註冊</a>
            </div>
            <div class="bannerRight">
                <img src="imgs/bannerRight.png" alt="">
                <div class="white"></div>
            </div>
        </div>
    </header>
	<div class="container">
		<div class="loginArea">
			<h1>用戶登入</h1>
            <i class="fas fa-user-circle"></i>
            <form method="post" action="login_result.php">
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
                        
                        </tr>
                    </tbody>
                </table>
                <input value="登入" type="submit">
                
            </form>
            <?
                if($_SESSION['login_error'])
                {
            ?>
            <span class="wrong">密碼錯誤 , 請重新輸入</span>
            <?  
                unset($_SESSION['login_error']);
                }ob_end_flush();
            ?>
            <div class="forgetPassword">
                <a href="forgetPassword.php">忘記密碼</a>
            </div>
		</div><!--loginAreaEnd-->
	</div><!--containerEnd-->



</body>

</html>