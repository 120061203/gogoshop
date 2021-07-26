<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的購物車</title>
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

        $size = $_GET['size'];
        $sweet = $_GET['sweet'];
        $ice = $_GET['ice'];
        $topping_id = $_GET['topping_id'];

        $drink_id = $_SESSION['drink_id'];
        //echo $drink_id;
        $cart_id = $_SESSION['cart_id'];
        //echo $cart_id;
        $usr = $_SESSION['usr'];

        $sql_query = 'select cart_id from cart order by cart_id desc';
        $result = mysql_query($sql_query);
        $row=mysql_fetch_array($result);
        $cnt = 'C001'; //流水號
        if($row[0])//有資料
        {
            $num=intval(substr($row[0],1,3));//後面三碼轉成數字
            $num_str = strval($num); //int轉string

            if ($num == 9) //產生流水號
                $cnt = 'C010';
            elseif ($num == 99) 
                $cnt = 'C100';
            else
                $cnt = 'C'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
        }


        if ($topping_id == 'NULL' && $_SESSION['edit_flag'] == 0) {
            $sql_query = "insert into cart values('".$cnt."','".$usr."','".$drink_id."','".$size."','".$sweet."','".$ice."',".$topping_id.',1)';
        } elseif ($topping_id != 'NULL' && $_SESSION['edit_flag'] == 0) {
            $sql_query = "insert into cart values('".$cnt."','".$usr."','".$drink_id."','".$size."','".$sweet."','".$ice."','".$topping_id."',1)";
        } elseif ($topping_id == 'NULL' && $_SESSION['edit_flag'] == 1) {
            $sql_query = "update cart set size='".$size."',sweet='".$sweet."',ice='".$ice."',topping_id=".$topping_id.",status=1 where cart_id='".$cart_id."'";
            $_SESSION['edit_flag'] = 0;
        } elseif ($topping_id != 'NULL' && $_SESSION['edit_flag'] == 1) {
            $sql_query = "update cart set size='".$size."',sweet='".$sweet."',ice='".$ice."',topping_id='".$topping_id."',status=1 where cart_id='".$cart_id."'";
            $_SESSION['edit_flag'] = 0;
        }
        //echo $sql_query;
        mysql_query($sql_query); //加入購物車
        //$_SESSION['edit_flag'] = 0;

        $sql_query = "select name from users where user_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        //unset($_SESSION['drink_id']);
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
        <div class="cartArea">
        <h1>我的購物車</h1>
            <table>
                <thead>
                    <tr>
                        <th>品項</th>
                        <th>尺寸</th>
                        <th>甜度</th>
                        <th>冰塊</th>
                        <th>配料</th>
                        <th>金額</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql_query = "select drink_name,size,sweet,ice,topping_name,large_price,mid_price,topping_price,drink_id,cart_id,cart.status
                                  from cart left join drinks using(drink_id) left join toppings using(topping_id)
                                  where user_id='".$_SESSION['usr']."'"; //下sql語法
                    $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
                    $sum = 0;
                    while ($row = mysql_fetch_array($result)) {//while1
                        if ($row[10] == '1') {//0移除購物車 2已提交訂單
                            ?>
                    <tr>
                        <td><?echo $row[0]; ?></td>     <!-- 品項 -->
                        <td><?echo $row[1]; ?></td>     <!-- 尺寸 -->
                        <?php
                        $sweet_t;
                            if ($row[2] == 0) {
                                $sweet_t = '無糖';
                            } elseif ($row[2] == 3) {
                                $sweet_t = '微糖';
                            } elseif ($row[2] == 5) {
                                $sweet_t = '半糖';
                            } elseif ($row[2] == 7) {
                                $sweet_t = '少糖';
                            } elseif ($row[2] == 10) {
                                $sweet_t = '全糖';
                            }
                            echo '<td>'.$sweet_t.'</td>'; //甜度
                            $ice_e;
                            if ($row[3] == 0) {
                                $ice_e = '熱飲';
                            } elseif ($row[3] == 3) {
                                $ice_e = '去冰';
                            } elseif ($row[3] == 5) {
                                $ice_e = '微冰';
                            } elseif ($row[3] == 7) {
                                $ice_e = '少冰';
                            } elseif ($row[3] == 10) {
                                $ice_e = '正常';
                            }
                            echo '<td>'.$ice_e.'</td>';  //冰塊
                            if ($row[4] == null) {
                                echo '<td>--</td>';
                            }    //配料
                            else {
                                echo '<td>'.$row[4].'</td>';
                            }
                            //echo gettype($row[12]);
                            $L_price = intval($row[5]) + intval($row[7]);
                            $M_price = intval($row[6]) + intval($row[7]);
                            //echo gettype(intval($row[12]));
                            if ($row[1] == 'L') {
                                $sum += $L_price;
                                echo '<td>'.$L_price.'元</td>';
                                $_SESSION['sum'] = $sum;
                            } else {
                                $sum += $M_price;
                                echo '<td>'.$M_price.'元</td>';
                                $_SESSION['sum'] = $sum;
                            } ?>
                        <td>
                            <div class="editDrink"><a href="editDrink.php?cart_id=<?echo $row[9]; ?>&drink_id=<?echo $row[8]; ?>"><i class="fas fa-edit"></i></a></div>
                            <div class="deleteDrink"><a href="deleteDrink.php?cart_id=<?echo $row[9]; ?>"><i class="fas fa-trash"></i></a></div>
                        </td>
                    </tr>
                <?php
                        }
                    }//while1 end 輸出購物清單
                ?> 
                </tbody>

            </table>
            <div class="sumMoney">
                <div class="moneyText">總金額</div>
                <div class="moneyNumber"><?echo $sum; ?>元</div>
            </div>
            <?php
                $sql_query = 'select * from cart where status=1';
                $result = mysql_query($sql_query);
                $count = mysql_num_rows($result); //資料筆數
                if ($count == 0) {
                    ?>
                    <div class="submitOrder disappear"><a href="pay.php">送出訂單</a></div>
                    <?php
                } else {
                    ?>
                    <div class="submitOrder"><a href="pay.php">送出訂單</a></div>
                <?php
                }ob_end_flush();
                ?>
                    <div class="keepShopping"><a href="index.php">繼續購物</a></div>
                    <div class="clearFix"></div>
                 </div>
        <!--cartAreaEnd-->
    </div>
    <!--containerEnd-->

</body>

</html>