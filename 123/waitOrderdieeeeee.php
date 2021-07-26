<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>待做訂單</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        include 'connect.php';
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
            <span class="userShowName"><?echo $_SESSION['usr']?></span>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <?php
        //查詢status=0 已下單未製作 的所有訂單 列出編號order_id row[0] 下單時間order_date row[1]品項row[2]尺寸row[3]甜度row[4]冰塊row[5]配料row[6] 價格(含配料)row[7??] 狀態row[8]
        $sql_query="SELECT order_id,order_date,drink_name,size,sweet,ice,topping_name,sum_money 
                    FROM orders natural join (drinks NATURAL join drink_order) natural join (toppings NATURAL join topping_order) 
                    where status=0";
        $result = mysql_query($sql_query);
        
        while ($row = mysql_fetch_array($result)) {//while1 列出每一筆訂單
        
        
        
    
    ?>
    <div class="container">
        <div class="waitOrderArea">
            <h1>待做訂單</h1>

            <table class="drinkTable">
                <thead>
                    <tr>
                        <th>編號</th>
                        <th>下單時間</th>
                        <th>品項</th>
                        <th>尺寸</th>
                        <th>甜度</th>
                        <th>冰塊</th>
                        <th>配料</th>
                        <th>價格</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan=3>O001</td>
                        <td rowspan=3>01-10<br>12:00</td>
                        <td>QQ奶茶</td>
                        <td>大杯</td>
                        <td>全糖</td>
                        <td>去冰</td>
                        <td>珍珠</td>
                        <td>50+5元</td>
                        <td rowspan=3>等待</td>
                    </tr>
                    <tr>
                        <!-- <td>O001</td> -->
                        <!-- <td>2021-01-10 12:00</td> -->
                        <td>QQ奶茶</td>
                        <td>大杯</td>
                        <td>全糖</td>
                        <td>去冰</td>
                        <td>珍珠</td>
                        <td>50+5元</td>
                        <!-- <td>自取</td> -->
                        <!-- <td>線上</td> -->
                        <!-- <td>等待</td> -->
                    </tr>
                    <tr>
                        <!-- <td>O001</td> -->
                        <!-- <td>2021-01-10 12:00</td> -->
                        <td>QQ奶茶</td>
                        <td>大杯</td>
                        <td>全糖</td>
                        <td>去冰</td>
                        <td>珍珠</td>
                        <td>50+5元</td>
                        <!-- <td>自取</td> -->
                        <!-- <td>線上</td> -->
                        <!-- <td>等待</td> -->
                    </tr>
                </tbody>
            </table>
            <!--drinkTableEnd-->
            <table class="guestTable">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th class="phone">電話</th>
                        <th class="address">地址</th>
                        <th>總價</th>
                        <th>取貨</th>
                        <th>付款</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>陳小二</td>
                        <td>0905333333</td>
                        <td>高雄市楠梓區高雄大學路700號</td>
                        <td>165元</td>
                        <td rowspan=3>自取</td>
                        <td rowspan=3>線上</td>
                        <td rowspan=3>
                            <div class="operationButton">
                                <a href="canGet.php">
                                    <div class="canGet">可取</div>
                                </a>
                                <a href="cancelOrder.php">
                                    <div class="cancelOrder">拒單</div>
                                </a>
                                <a href="completeOrder.php">
                                    <div class="completeOrder">結單</div>
                                </a>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
            }//while1 列出每一筆訂單 end 
        ?>


            <!-- guestTableEnd-->
            <table class="drinkTable">
                <thead>
                    <tr>
                        <th>編號</th>
                        <th>下單時間</th>
                        <th>品項</th>
                        <th>尺寸</th>
                        <th>甜度</th>
                        <th>冰塊</th>
                        <th>配料</th>
                        <th>價格</th>

                        <th>狀態</th>

                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <tr>
                            <td rowspan=2>O002</td>
                            <td rowspan=2>01-10<br>12:00</td>
                            <td>gogo咖啡</td>
                            <td>大杯</td>
                            <td>全糖</td>
                            <td>熱飲</td>
                            <td>--</td>
                            <td>70元</td>

                            <td rowspan=3>等待</td>

                        </tr>
                        <tr>
                            <!-- <td>O001</td> -->
                            <!-- <td>2021-01-10 12:00</td> -->
                            <td>布丁巧克力</td>
                            <td>大杯</td>
                            <td>全糖</td>
                            <td>去冰</td>
                            <td>珍珠</td>
                            <td>60+5元</td>
                            <!-- <td>自取</td> -->
                            <!-- <td>線上</td> -->
                            <!-- <td>等待</td> -->
                        </tr>

                    </tbody>
                </tbody>
            </table>
            <!--drinkTableEnd-->
            <table class="guestTable">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th class="phone">電話</th>
                        <th class="address">地址</th>
                        <th>總價</th>
                        <th>取貨</th>
                        <th>付款</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>陳小三</td>
                        <td>0905333333</td>
                        <td>高雄市楠梓區高雄大學路700號</td>
                        <td>135元</td>
                        <td>自取</td>
                        <td>線上</td>
                        <td>
                            <div class="operationButton">
                                <a href="canGet.php?order_id=O002"><!--status to 1-->
                                    <div class="canGet">可取</div>
                                </a>
                                <a href="cancelOrder.php?order_id=O002"><!--status to 2-->
                                    <div class="cancelOrder">拒單</div>
                                </a>
                                <a href="completeOrder.php?order_id=O002"><!--status to 3-->
                                    <div class="completeOrder">結單</div>
                                </a>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--guestTableEnd -->
        </div>
        <!--waiteOrderAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>