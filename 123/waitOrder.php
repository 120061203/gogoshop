<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>待做訂單</title>
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
    <?php
        //查詢status=0 已下單未製作 的所有訂單 列出編號order_id row[0] 下單時間order_date row[1]品項row[2]尺寸row[3]甜度row[4]冰塊row[5]配料row[6] 價格(含配料)row[7??] 狀態row[8]
        $sql_query="SELECT order_id,order_date,drink_name,size,sweet,ice,topping_name,mid_price,large_price,topping_price,status 
        FROM orders left join (((`drink_order` natural join drinks) left join topping_order using(drink_order_id)) left join toppings using(topping_id)) using(order_id) where status=0";
                    
        $result = mysql_query($sql_query);
        // $row = mysql_fetch_array($result);
        // while ($row = mysql_fetch_array($result)) {//列出每一筆訂單

        // }
        
    
    ?>
    <div class="container">
        <div class="waitOrderArea">
            <h1>待做訂單</h1>
            <?
                $sql_query = 'select * from orders where status=0 or status=1';
                $result = mysql_query($sql_query);

                while ($row = mysql_fetch_array($result)) {//while1 row:order_id 
                    
                    $sql_query = "select * from drink_order where order_id='".$row[0]."'";
                    $result1 = mysql_query($sql_query);
                    $drink_cnt = mysql_num_rows($result1);//品項數目
                    //echo $drink_cnt;
                       //                   0          1         2        3    4    5         6         7           8           9       10
                    $sql_query = "SELECT order_id,order_date,drink_name,size,sweet,ice,topping_name,mid_price,large_price,topping_price,orders.status 
                    FROM orders left join (((`drink_order` natural join drinks) left join topping_order using(drink_order_id)) left join toppings using(topping_id)) using(order_id)
                    where order_id='".$row[0]."'";
                    //echo $sql_query;
                    $result2 = mysql_query($sql_query);//訂單中的品項
                    $count = 0;//用來在第一筆新增rowspan的數字
            ?>
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
                    <?
                        while($row2 = mysql_fetch_array($result2)) {//row2:訂單中的資料
                            ++$count;
                    ?>
                        <tr>
                            <?
                                if($count==1)
                                {
                            ?>
                                <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[0]?></td>     <!--編號-->

                                <?
                                    $date=substr($row2[1],5,5);
                                    $time=substr($row2[1],11,5);
                                    //echo $date.'<br>';
                                    //echo $time
                                ?>

                                <td rowspan=<?echo $drink_cnt; ?>><?echo $date?><br><?echo $time?></td>        <!--時間-->
                            <?
                                 }
                            ?>
                            <td><?echo $row2[2]; ?></td>        <!--品項-->
                            <td><?echo $row2[3]; ?></td>        <!--尺寸-->
                            <?php
                                $sweet;
                                if ($row2[4] == 0) {
                                    $sweet = '無糖';
                                 } elseif ($row2[4] == 3) {
                                    $sweet = '微糖';
                                } elseif ($row2[4] == 5) {
                                    $sweet = '半糖';
                                } elseif ($row2[4] == 7) {
                                    $sweet = '少糖';
                                } elseif ($row2[4] == 10) {
                                    $sweet = '全糖';
                                }
                            ?>
                            <td><?echo $sweet; ?></td>        <!--甜度-->

                            <?php
                                $ice;
                                if ($row2[5] == 0) {
                                    $ice = '熱飲';
                                } elseif ($row2[5] == 3) {
                                    $ice = '去冰';
                                } elseif ($row2[5] == 5) {
                                    $ice = '微冰';
                                } elseif ($row2[5] == 7) {
                                    $ice = '少冰';
                                } elseif ($row2[5] == 10) {
                                    $ice = '正常';
                                }
                            ?>
                                    <td><?echo $ice; ?></td>        <!--冰塊-->
                            <?php
                                //echo $row2[5];
                                if($row2[6]==NULL)
                                {
                            ?>
                                    <td><?echo '--'; ?></td>            <!--配料-->
                            <?
                                }
                                else
                                {
                            ?>
                                    <td><?echo $row2[6]; ?></td>        <!--配料-->
                            <?
                                }
                            ?>
                            <?
                                $d_price=0;
                                if($row2[2]=='L')
                                    $d_price=$row2[8];
                                else
                                    $d_price=$row2[7];
                            ?>
                                <td><?echo $d_price+$row2[9]?>元</td><!--飲料價格(飲料加配料)-->
                            <?
                                if($count==1)
                                {
                            ?>            
                            <td rowspan=<?echo $drink_cnt; ?>>
                            <?
                                if($row2[10] == 0)//餐點狀態
                                    {
                                        echo '待製作';
                                    }
                                    else
                                    {
                                        echo '待領取';
                                    }
                            ?>
                            </td>
                            <?
                                }
                            ?>    
                        </tr>
                    <?
                        }
                    ?>
                    </tbody>
                </table>
                <!--drinkTableEnd-->
                <?
                     //                   0       1      2      3         4         5 
                     $sql_query="select name,phone_num,addr,sum_money,pickup_way,pay_way
                     from orders NATURAL JOIN users where order_id='".$row[0]."'";//訂購人資料
                     $result2=mysql_query($sql_query);
                     $row2=mysql_fetch_array($result2);
                     //echo $sql_query;
                     //echo '<br>'.$row2[0]
                ?>
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
                            <td><?echo $row2[0]?></td>
                            <td><?echo $row2[1]?></td>
                            <td><?echo $row2[2]?></td>
                            <td><?echo $row2[3]?>元</td>
                        <?
                            if($row2[4]=="come")
                            {
                        ?>
                            <td rowspan=3>來店自取</td>
                        <?
                            }
                            else
                            {
                        ?>
                            <td rowspan=3>外送到府</td>
                        <?
                            }
                            if($row2[5]=="online")
                            {
                        ?>
                            <td rowspan=3>線上支付</td>
                        <?
                            }
                            else
                            {
                        ?>
                            <td rowspan=3>現金支付</td>    
                            <?
                            }
                        ?>
                            <td rowspan=3>
                                <div class="operationButton">
                                    <a href="canGet.php?order_id=<?echo $row[0]?>">
                                        <div class="canGet">可取</div>
                                    </a>
                                    <a href="cancelOrder.php?order_id=<?echo $row[0]?>">
                                        <div class="cancelOrder">拒單</div>
                                    </a>
                                    <a href="completeOrder.php?order_id=<?echo $row[0]?>">
                                        <div class="completeOrder">結單</div>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--guestTableEnd-->
            <?
            }//while1 end
            ob_end_flush();
            ?>
            <!--guestTableEnd-->
        </div>
        <!--waiteOrderAreaEnd-->
    </div>
    <!--waitOrderEnd-->
</body>

</html>