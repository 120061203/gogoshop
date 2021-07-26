<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員修改個人資料</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php

        include 'connect.php';
	
	//檢查登入狀態
        $sql_query = "select admin_id,admin_pwd from shop_users where admin_id='".$_SESSION['usr']."' and admin_pwd='".$_SESSION['pwd']."'";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:shop.php');


        $_SESSION['editVip_user_id']=$_GET['user_id'];
        $sql_query = "select name from users where user_id='".$_SESSION['editVip_user_id']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        $sql_query=" SELECT * FROM users where user_id='".$_SESSION['editVip_user_id']."' ";
        $result=mysql_query($sql_query);
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
            <span class="userShowName"><?echo $name; ?></span>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="editVipArea">
            <div class="registerArea">
                <h1>賬戶修改</h1>
                <i class="fas fa-user-circle"></i>
                <form method="get" action="editVip_result.php">
                    <table>
                        <?while($row = mysql_fetch_array($result)){?>
                        <tbody>
                            <tr>
                                <td>帳號</td>
                                
                                <td><input type=text maxLength="10" size="30" name="usr" placeholder="請輸入賬號" value=<?echo $row[0]?>></td>
                            </tr>
                            <tr>
                                <td>密碼</td>
                                <td><input type="password" maxLength="10" size="30" name="pwd" placeholder="請輸入密碼" value=<?echo $row[3]?>></td>
                            </tr>
                            <tr>
                                <td>姓名</td>
                                <td><input type=text maxLength="20" size="30" name="name" placeholder="請輸入姓名" value=<?echo $row[1]?>></td>
                            </tr>
                            <tr>
                                <td>電話</td>
                                <td><input type=text maxLength="20" size="30" name="phone" placeholder="請輸入電話" value=<?echo $row[2]?>></td>
                            </tr>
                            <tr>
                                <td>郵箱</td>
                                <td><input type="email" maxLength="30" size="30" name="mail" placeholder="請輸入郵箱" value=<?echo $row[5]?>></td>
                            </tr>
                            <tr>
                                <td>地址</td>
                                <td><input type=text maxLength="30" size="30" name="addr" placeholder="請輸入地址" value=<?echo $row[4]?>></td>
                                <input type="hidden" name="oid" value=<?echo $row[0]?>><!--傳送舊id-->
                            </tr>
                        </tbody>
                    </table>
                    <?php
        }//印出資料庫的內容 並填入欄位
        ?>          
                    <input value="確認修改" type="submit">

                </form>
            </div><!--registerArea-->
        </div><!--editProfileArea-->
        
    </div><!--containerEnd-->
</body>

</html>