<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的訂單</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        <?php ob_start(); session_start(); include 'css/main.css'; ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        include 'connect.php';

        //未登入狀態
        $sql_query = "select user_id,pwd from users where user_id='".$_SESSION['usr']."' and pwd='".$_SESSION['pwd']."' and status=1";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:login.php');

        $sql_query = "select name from users where user_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        ?>
    <nav>
        <div class="logo">
            <a href="index.php">
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
            <span class="userShowName"><a href="member.php"><?echo $name; ?></a></span>
            <!-- <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>

    </nav>
    <div class="container">
        <div class="myOrderArea">
            <h1>我的訂單</h1>

            <table>
                <thead>
                    <tr>
                        <th>訂單編號</th>
                        <th>品項</th>
                        <th>尺寸</th>
                        <th>甜度</th>
                        <th>冰塊</th>
                        <th>配料</th>
                        <th>金額</th>
                        <th>總金額</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include 'connect.php'; //選擇訂單編號
                        $sql_query = 'select * from orders';
                        $result = mysql_query($sql_query);

                        while ($row = mysql_fetch_array($result)) {//row:order_id
                            $sql_query = "select count(drink_id) from drink_order group by order_id having order_id='".$row[0]."'";
                            $result1 = mysql_query($sql_query);
                            $row1 = mysql_fetch_array($result1);
                            $drink_cnt = $row1[0]; //品項數目
                            //echo $drink_cnt;
                               //                   0          1       2    3    4       5           6          7           8           9       10
                            $sql_query = "SELECT order_id,drink_name,size,sweet,ice,topping_name,mid_price,large_price,topping_price,sum_money,orders.status 
                            FROM orders left join (((`drink_order` natural join drinks) left join topping_order using(drink_order_id)) left join toppings using(topping_id)) using(order_id)
                            where order_id='".$row[0]."' and buyer_id='".$_SESSION['usr']."'";
                            //echo $sql_query;
                            $result2 = mysql_query($sql_query);
                            $count = 0;
                            while ($row2 = mysql_fetch_array($result2)) {//row2:訂單中的資料
                                ++$count; ?>
                                 <tr>
                                 <?php
                                if ($count == 1) {
                                    ?>
                                    <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[0]; ?></td>
                                <?php
                                } ?>
                                    <td><?echo $row2[1]; ?></td>        <!--品項-->
                                    <td><?echo $row2[2]; ?></td>        <!--尺寸-->
                                <?php
                                    $sweet;
                                    if ($row2[3] == 0) {
                                        $sweet = '無糖';
                                    } elseif ($row2[3] == 3) {
                                        $sweet = '微糖';
                                    } elseif ($row2[3] == 5) {
                                        $sweet = '半糖';
                                    } elseif ($row2[3] == 7) {
                                        $sweet = '少糖';
                                    } elseif ($row2[3] == 10) {
                                        $sweet = '全糖';
                                    }
                                ?>
                                    <td><?echo $sweet; ?></td>        <!--甜度-->
                                <?php
                                    $ice;
                                    if ($row2[4] == 0) {
                                        $ice = '熱飲';
                                    } elseif ($row2[4] == 3) {
                                        $ice = '去冰';
                                    } elseif ($row2[4] == 5) {
                                        $ice = '微冰';
                                    } elseif ($row2[4] == 7) {
                                        $ice = '少冰';
                                    } elseif ($row2[4] == 10) {
                                        $ice = '正常';
                                    }
                                ?>
                                    <td><?echo $ice; ?></td>        <!--冰塊-->
                                <?php
                                //echo $row2[5];
                                if($row2[5]==NULL)
                                {
                                ?>
                                    <td><?echo '--'; ?></td>            <!--配料-->
                                <?
                                }
                                else
                                {
                                ?>
                                    <td><?echo $row2[5]; ?></td>        <!--配料-->
                                <?
                                }
                                ?>
                                <?
                                $d_price=0;
                                if($row2[2]=='L')
                                    $d_price=$row2[7];
                                else
                                    $d_price=$row2[6];
                                ?>
                                <td><?echo $d_price+$row2[8]?>元</td>                           <!--飲料價格(飲料加配料)-->
                                <?
                                if ($count == 1) {
                                    ?>
                                    <td rowspan=<?echo $drink_cnt; ?>><?echo $row2[9]; ?>元</td>        <!--總金額-->
                                    <td rowspan=<?echo $drink_cnt; ?>>
                                        <?
                                            if($row2[10] == 0)
                                            {
                                                echo '已下單';
                                            }
                                            if($row2[10] == 1)
                                            {
                                                echo '可領取';
                                            }
                                            if($row2[10] == 2)
                                            {
                                                echo '已拒單';
                                            }if($row2[10] == 3)
                                            {
                                                echo '已結單';
                                            }
                                        ?>
                                    </td>
                                <?php
                                } 
                                ?>
                                </tr>
                                <?php
                            }   ?>            
                    <?php
                        }ob_end_flush();
                    ?>
                </tbody>
            </table>
            <div class="clearFix"></div>
        </div>
        <!--cartAreaEnd-->
    </div>
    <!--containerEnd-->

</body>

</html>