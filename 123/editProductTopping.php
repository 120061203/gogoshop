<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯配料</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php session_start(); include "css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        include('connect.php');

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
        </div>
    </nav>
    <div class="container">
        <div class="newToppingArea">
            <h1>編輯配料</h1>
            <div class="uploadTopping">
                <!-- <i class="fas fa-cloud-upload-alt"></i> -->
                <form action="editProductTopping_result.php" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td>配料名稱</td>
                                <td><input type="text" maxLength="10" size="30" name="toppingName" placeholder="請輸入配料名稱" value="珍珠" required></td>
                            </tr>
                            <tr>
                                <td>配料價格</td>
                                <td><input type="number" maxLength="20" size="30" name="toppingPrice" placeholder="請輸入配料價格" value="5" required></td>
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