<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增配料</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "../css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        include("connect.php");
        //未登入
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
            <span class="userShowName"><?echo $name; ob_end_flush();?></span>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="newToppingArea">
            <h1>新增配料</h1>
            <div class="uploadTopping">
                <!-- <i class="fas fa-cloud-upload-alt"></i> -->
                <form action="newTopping_result.php" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td>配料名稱</td>
                                <td><input type="text" maxLength="10" size="30" name="name" placeholder="請輸入配料名稱" required></td>
                            </tr>
                            <tr>
                                <td>配料價格</td>
                                <td><input type="number" maxLength="20" size="30" name="price" placeholder="請輸入配料價格" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="上傳">
                </form>

            </div>
            <!--uploadToppingEnd-->
        </div>
        <!--newToppingAreaEnd-->
    </div>
</body>

</html>