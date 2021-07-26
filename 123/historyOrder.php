<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歷史訂單</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php ob_start(); session_start(); include "css/main.css" ?>
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
            <span class="userShowName"><?echo $name; ?></span>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </nav>
    <div class="container">
        <div class="historyOrderArea">
            <h1>歷史訂單</h1>
            <table class="historyTable">
                <thead>
                    <tr>
                        <th>編號</th>
                        <th>下單時間</th>
                        <th>姓名</th>
                        <th class="drinkName">品項</th>
                        <th>尺寸</th>
                        <th>甜度</th>
                        <th>冰塊</th>
                        <th>配料</th>
                        <th>價格</th>
                        <th>總金額</th>
                        <th>取貨</th>
                        <th>付款</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'connect.php'; //選擇訂單編號
                        $sql_query = "select * from orders";
                        $result = mysql_query($sql_query);

                        while ($row = mysql_fetch_array($result)) {//row:order_id
                            $sql_query = "select * from drink_order where order_id='".$row[0]."'";
                            $result1 = mysql_query($sql_query);
                            $drink_cnt = mysql_num_rows($result1);//品項數目
                            //echo $drink_cnt;
                               //                   0          1       2      3        4    5    6         7         8          9           10           11        12       13
                            $sql_query = "SELECT order_id,order_date,name,drink_name,size,sweet,ice,topping_name,mid_price,large_price,topping_price,sum_money,pickup_way,pay_way
                            FROM (orders join users on buyer_id=user_id) left join (((`drink_order` natural join drinks) left join topping_order using(drink_order_id)) left join toppings using(topping_id)) using(order_id)
                            where order_id='".$row[0]."'";
                            //echo $sql_query;
                            $result2 = mysql_query($sql_query);
                            $count = 0;//用來在第一筆新增rowspan的數字
                            while ($row2 = mysql_fetch_array($result2)) {//row2:訂單中的資料
                                ++$count; ?>
                                <tr>
                                <?php
                                    if ($count == 1) {
                                ?>
                                    <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[0]; ?></td>
                                <?
                                    $date=substr($row2[1],5,5);
                                    $time=substr($row2[1],11,5);
                                    //echo $date.'<br>';
                                    //echo $time
                                ?>

                                    <td rowspan=<?echo $drink_cnt; ?>><?echo $date?><br><?echo $time?></td>        <!--時間-->
                                    <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[2]; ?></td>
                                <?php
                                    } 
                                ?>
                                    <td><?echo $row2[3]; ?></td>        <!--品項-->
                                    <td><?echo $row2[4]; ?></td>        <!--尺寸-->
                                    <?php
                                    $sweet;
                                    if ($row2[5] == 0) {
                                        $sweet = '無糖';
                                    } elseif ($row2[5] == 3) {
                                        $sweet = '微糖';
                                    } elseif ($row2[5] == 5) {
                                        $sweet = '半糖';
                                    } elseif ($row2[5] == 7) {
                                        $sweet = '少糖';
                                    } elseif ($row2[5] == 10) {
                                        $sweet = '全糖';
                                    }
                                ?>
                                    <td><?echo $sweet; ?></td>        <!--甜度-->
                                <?php
                                    $ice;
                                    if ($row2[6] == 0) {
                                        $ice = '熱飲';
                                    } elseif ($row2[6] == 3) {
                                        $ice = '去冰';
                                    } elseif ($row2[6] == 5) {
                                        $ice = '微冰';
                                    } elseif ($row2[6] == 7) {
                                        $ice = '少冰';
                                    } elseif ($row2[6] == 10) {
                                        $ice = '正常';
                                    }
                                ?>
                                    <td><?echo $ice; ?></td>        <!--冰塊-->
                                <?php
                                    //echo $row2[5];
                                    if($row2[7]==NULL)
                                    {
                                ?>
                                    <td><?echo '--'; ?></td>            <!--配料-->
                                <?
                                    }
                                    else
                                    {
                                ?>
                                    <td><?echo $row2[7]; ?></td>        <!--配料-->
                                <?
                                    }
                                    $d_price=0;
                                    if($row2[2]=='L')
                                        $d_price=$row2[9];
                                    else
                                        $d_price=$row2[8];
                                ?>
                                <td><?echo $d_price+$row2[10]?>元</td>                           <!--飲料價格(飲料加配料)-->
                                
                                <?
                                    if ($count == 1) {
                                ?>
                                        <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[11]?>元</td><!--總金額-->
                                        <?
                                            if($row[12]=='come')
                                            {
                                        ?>
                                                <td rowspan=<?echo $drink_cnt; ?>>來店自取</td><!--取貨方式-->
                                        <?
                                            }
                                            else
                                            {
                                        ?>
                                                <td rowspan=<?echo $drink_cnt; ?>>外送到府</td><!--取貨方式-->
                                        <?
                                            }
                                        ?>

<?
                                            if($row[13]=='online')
                                            {
                                        ?>
                                                <td rowspan=<?echo $drink_cnt; ?>>線上支付</td><!--付款方式-->
                                        <?
                                            }
                                            else
                                            {
                                        ?>
                                                <td rowspan=<?echo $drink_cnt; ?>>現金支付</td><!--付款方式-->
                                        <?
                                            }
                                        ?>
                                        
                                <?php
                                    } 
                                ?>
                                </tr>
                            <?php
                                } 
                            ?>
                        <?php
                            }ob_end_flush();
                        ?>
                </tbody>
            </table>

        </div>
        <!--historyOrderAreaEnd-->
    </div>
    <!--containerEnd-->
</body>

</html>