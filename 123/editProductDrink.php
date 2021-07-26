<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯飲料</title>
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
        <div class="editProductDrinkArea">
            <h1>編輯飲料</h1>
            <div class="uploadDrink">
                <!-- <i class="fas fa-cloud-upload-alt"></i> -->
                <form action="editProductDrink_result.php" method="post" enctype="multipart/form-data">

                    <table>
                        <tbody>
                            <tr class="drinkPic">
                                <td>飲料圖檔</td>
                                <td><i class="fas fa-cloud-upload-alt uploadIcon"></i><img src="imgs/D001.png" alt=""><label for="drinkFile"><input type="file" name="drinkFile" id="drinkFile" placeholder="請上傳飲料圖檔" value="點擊更改">重新上傳</label></td>
                            </tr>
                            <tr>
                                <td>飲料名稱</td>
                                <td><input type="text" maxLength="10" size="30" name="drinkName" placeholder="請輸入飲料名稱" value="gogo奶茶" required></td>
                            </tr>
                            <tr>
                                <td>中杯價格</td>
                                <td><input type=number maxLength="20" size="30" name="midPrice" placeholder="請輸入中杯價格" value="40" required></td>
                            </tr>
                            <tr>
                                <td>大杯價格</td>
                                <td><input type=number maxLength="20" size="30" name="largePrice" placeholder="請輸入大杯價格" value="50" required></td>
                            </tr>

                        </tbody>
                    </table>





                    <input type="submit" value="更新">
                </form>

            </div>
            <!--uploadDrinkEnd-->
        </div>
        <!--newDrinkAreaEnd-->
    </div>
</body>

</html>