<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品清單</title>
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
        <div class="productListArea">
            <h1>商品清單</h1>
            <table class="productDrinkTable">
                <thead>
                    <tr>
                        <th>飲料編號</th>
                        <th>品項</th>
                        <th>中杯價格</th>
                        <th>大杯價格</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>D001</td>
                        <td>gogo奶茶</td>
                        <td>40元</td>
                        <td>50元</td>
                        <td class="operationButton">
                            <div class="editProductDrink"><a href="editProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-edit"></i></a></div>
                            <!-- <div class="lockProductDrink"><a href="lockProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-lock"></i></a></div> -->
                            <div class="unlockProductDrink"><a href="unlockProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-lock-open"></i></a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>D002</td>
                        <td>gogo巧克力</td>
                        <td>50元</td>
                        <td>60元</td>
                        <td class="operationButton">
                            <div class="editProductDrink"><a href="editProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-edit"></i></a></div>
                            <!-- <div class="lockProductDrink"><a href="lockProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-lock"></i></a></div> -->
                            <div class="unlockProductDrink"><a href="unlockProcutDrink.php?drink_id=xxxxxxx"><i class="fas fa-lock-open"></i></a></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="productToppingTable">
                <thead>
                    <tr>
                        <th>配料編號</th>
                        <th>配料名稱</th>
                        <th>配料價格</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>T001</td>
                        <td>珍珠</td>
                        <td>5元</td>

                        <td class="operationButton">
                            <div class="editProductTopping"><a href="editProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-edit"></i></a></div>
                            <!-- <div class="editProductTopping"><a href="lockProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-lock"></i></a></div> -->
                            <div class="editProductTopping"><a href="unlockProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-lock-open"></i></a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>T002</td>
                        <td>波霸</td>
                        <td>5元</td>

                        <td class="operationButton">
                            <div class="editProductTopping"><a href="editProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-edit"></i></a></div>
                            <!-- <div class="editProductTopping"><a href="lockProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-lock"></i></a></div> -->
                            <div class="editProductTopping"><a href="unlockProcutTopping.php?topping_id=xxxxxxx"><i class="fas fa-lock-open"></i></a></div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>