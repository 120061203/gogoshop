<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加入購物車</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include '../css/main.css'; ?></style>
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

        $cart_id = $_GET['cart_id'];
        $_SESSION['cart_id'] = $cart_id;
        $drink_id = $_GET['drink_id'];
        $_SESSION['edit_flag'] = 1; //1有修改
        //echo $cart_id;
        //echo $drink_id;
        //echo "<p>drinkId:".$drink_id."</br>";
    ?>

    <?php
        $sql_query = "select * from drinks where drink_id='".$drink_id."'";
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
    ?>

    <nav>
        <!-- <div class="logo">
            <a href="index.php">
                <img src="logo/logo.svg" alt="">

            </a>
        </div> -->
        <div class="back">
            <a href="../index.php">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>

        <div class="name">
            <!-- <span class="hello">你好，</span>
            <span class="userShowName">###</span> -->
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="addToCartArea">
            <h1>飲料訂購單</h1>
            <div class="menu">
                <div class="drink">
                    <img src=../imgs/<?echo $row[0]; ?>.png?rand(0,32767) alt="">
                    <div class="drinkIntro">
                        <div class="drinkTitle">
                            <!-- QQ奶茶 -->
                            <?echo $row[1]; ?>
                        </div>
                        <div class="drinkPrice">
                            中杯
                            <?echo $row[2]; ?>元
                        </div>
                        <div class="drinkPrice">
                            大杯
                            <?echo $row[3]; ?>元
                        </div>
                        <?
                            ob_end_flush();
                        ?>
                    </div>
                    <!--drinkIntroEnd-->
                </div>
                <!--drinkEnd-->

            </div>
            <!--menuEnd-->
            <div class="addToCartOrder">
                <form action="cart.php" method="get">
                    <table>
                        <tbody>
                            <tr>
                                <td>尺寸</td>
                                <td><label>中杯<input type="radio" value="M" name="size" checked></label></td>
                                <td><label>大杯<input type="radio" value="L" name="size"></label></td>
                            </tr>
                            <tr>
                                <td>甜度</td>
                                <td><label>全糖<input type="radio" value="10" name="sweet"></label></td>
                                <td><label>少糖<input type="radio" value="7"  name="sweet"></label></td>
                                <td><label>半糖<input type="radio" value="5"  name="sweet"></label></td>
                                <td><label>微糖<input type="radio" value="3"  name="sweet"checked></label></td>
                                <td><label>無糖<input type="radio" value="0"  name="sweet"></label></td>
                            </tr>
                            <tr>
                                <td>冰熱</td>
                                <td><label>正常<input type="radio" value="10" name="ice"></label></td>
                                <td><label>少冰<input type="radio" value="7"  name="ice"></label></td>
                                <td><label>微冰<input type="radio" value="5"  name="ice"checked></label></td>
                                <td><label>去冰<input type="radio" value="3"  name="ice"></label></td>
                                <td><label>熱飲<input type="radio" value="0"  name="ice"></label></td>
                            </tr>
                            <tr>
                                <td>配料</td>
                                <td>
                                    <select name="topping_id">
                                        
                                        <option value="NULL" checked>---請選擇---</option>
                                        <!-- <option value="T001">珍珠5元</option>
                                        <option value="T002">波霸5元</option>
                                        <option value="T003">布丁10元</option>
                                        <option value="T004">薏仁10元</option>
                                        <option value="T005">仙草10元</option>
                                        <option value="T006">愛玉10元</option>
                                        <option value="T007">西米露10元</option>
                                        <option value="T008">蘆薈10元</option>
                                        <option value="T009">紅豆5元</option>
                                        <option value="T010">椰果10元</option> -->
                                        <?
                                            $sql_query="select * from toppings where status=1";
                                            $result=mysql_query($sql_query);
                                            while($row=mysql_fetch_array($result))
                                            {
                                            ?>
                                                <option value=<?echo $row[0]?>><?echo $row[1].$row[2]?>元</option>;
                                            <?
                                            }

                                            ob_end_flush();
                                        ?>
                                        
                                    </select>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <input type="submit" value="加入購物車">
                </form>
            </div>
        </div>
        <!--addToCartAreaEnd-->
    </div>
    <!--containerEnd-->

</body>

</html>