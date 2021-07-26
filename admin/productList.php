<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品清單</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "../css/main.css" ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?
        include('connect.php');

        //檢查登入狀態
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
                <?
                    $sql_query="select * from drinks";
                    $result=mysql_query($sql_query);
                    while($row=mysql_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td><?echo $row[0]?></td>
                        <td><?echo $row[1]?></td>
                        <td><?echo $row[2]?>元</td>
                        <td><?echo $row[3]?>元</td>
                        <td class="operationButton">
                            <div class="editProductDrink"><a href="editProductDrink.php?drink_id=<?echo $row[0]?>"><i class="fas fa-edit"></i></a></div>
                            <?if($row[4] == 1)
                            {
                            ?>
                            <div class="lockProductDrink"><a href="lockProductDrink.php?drink_id=<?echo $row[0]?>"><i class="fas fa-lock"></i></a></div>
                            <?
                            }
                            else
                            {
                            ?>
                            <div class="unlockProductDrink"><a href="unlockProductDrink.php?drink_id=<?echo $row[0]?>"><i class="fas fa-lock-open"></i></a></div>
                            <?
                            }
                            ?>
                        </td>
                    </tr>
                <?
                    }
                ?>
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
                    <?
                        $sql_query="select * from toppings";
                        $result=mysql_query($sql_query);
                        while($row=mysql_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?echo $row[0]?></td>
                            <td><?echo $row[1]?></td>
                            <td><?echo $row[2]?>元</td>

                            <td class="operationButton">
                                <div class="editProductTopping"><a href="editProductTopping.php?topping_id=<?echo $row[0]?>"><i class="fas fa-edit"></i></a></div>
                                <?if($row[3] == 1)
                                {
                                ?>
                                <div class="editProductTopping"><a href="lockProductTopping.php?topping_id=<?echo $row[0]?>"><i class="fas fa-lock"></i></a></div>
                                <?
                                }
                                else
                                {
                                ?>
                                <div class="editProductTopping"><a href="unlockProductTopping.php?topping_id=<?echo $row[0]?>"><i class="fas fa-lock-open"></i></a></div>
                                <?
                                }
                                ?>
                            </td>
                        </tr>
                    <?
                        }ob_end_flush();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>