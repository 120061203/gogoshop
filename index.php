<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOGO茶飲</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php session_start(); include 'css/main.css'; ?></style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        $flag = 0;
        include 'connect.php';

        //$usr=$_GET["usr"];
        //$pwd=$_GET["pwd"];
        //$select_db=@mysql_select_db("gogodrinkshop");//選擇資料庫
       // if (!$select_db) {//if1
        //    echo'<br>找不到資料庫';
        //} else {
            //找到資料庫
            //找這個人的名字顯示出來
            $sql_query = "select * from users where user_id='".$_SESSION['usr']."'and pwd='".$_SESSION['pwd']."' and status=1"; //下sql語法
            $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
            if (mysql_num_rows($result) == 1) {//if2 有找到這個人
                //flag = 1有這個人
                while ($row = mysql_fetch_array($result)) {//while1
                    $flag = 1;
                    // echo'<tr>';
                    // echo'<td>'.$row[0];
                    // echo'<td>'.$row[1];
                    //echo'<td>'.$row[1];//印名字
                    // echo'<td>'.$row[3];
                    // echo'<td>'.$row[4];
                    // echo'<td>'.$row[5];?>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="logo/logo.svg" alt="">
            </a>
        </div>
        <div class="name">
            <span class="hello">你好，</span>
            <span class="userShowName"><a href="user/member.php"><?echo $row[1]; ?></a></span>
        </div>
    </nav>
    <header>
        <div class="banner">

            <div class="bannerLeft">

                <h1>GOGO茶飲</h1>
                <br>
                <h2>總有你的一杯</h2>
                <br>
                <a href="user/logout_temp.php">登出</a>
                <a href="user/login.php" class="disappear">登入</a>
                <a href="user/register.php" class="disappear">註冊</a>
            </div>
            <div class="bannerRight">
                <img src="imgs/bannerRight.png" alt="">
                <div class="white"></div>
            </div>
        </div>
    </header>
    <?php
                }//while1 印出這個人的名字end
            }//if2 有找到這個人end

            if ($flag == 0) {// if 沒找到這個人
    ?>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="logo/logo.svg" alt="">
                </a>
            </div>
            <div class="name">
                <a href="user/login.php" class="disappear">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </nav>
        <header>
            <div class="banner">

                <div class="bannerLeft">

                    <h1>GOGO茶飲</h1>
                    <br>
                    <h2>總有你的一杯</h2>
                    <br>
                    <a href="user/login.php">登入</a>
                    <a href="user/register.php">註冊</a>
                </div>
                <div class="bannerRight">
                    <img src="imgs/bannerRight.png" alt="">
                    <div class="white"></div>
                </div>
            </div><!--bannerEnd-->
        </header>
    <?php
            }//if 沒找到這個人 end
        //}//if1 判斷是否找到資料庫end
    ?>
    
    
    <div class="container">
        <div class="menu">
            <?php
                $sql_query = 'select * from drinks where status=1'; //下sql語法 找飲料的id 給圖片
                $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
                while ($row = mysql_fetch_array($result)) {//while2 飲料圖片迴圈
            ?>
            <div class="drink">
                <img src=imgs/<?echo $row[0]; ?>.png?rand(0,32767) alt="">
                <div class="drinkIntro">
                    <div class="drinkTitle">
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
                    <div class="addToCart">
                        <a href="user/addToCart.php?drink_id=<?echo $row[0]; ?>"><i class="fas fa-plus-circle"></i></a>
                    </div>
                    <!--addToCartEnd-->
                    <div class="addToCartMobile">
                        <a href="user/addToCart.php?drink_id=<?echo $row[0]; ?>"><i class="fas fa-plus-circle"></i></a>
                    </div>
                    <!--addToCartMobileEnd-->
                </div>
                <!--drinkIntroEnd-->
            </div>
            <!--drinkEnd-->
            <?php
                }//while2 飲料圖片迴圈end
            ?>
            
        </div>
        <!--menuEnd-->
    </div>
    <!--containerEnd-->
    
    <footer>
        <div class="footerInner">
            <p>GOGO茶飲</p>
            <p>總有你的一杯</p>
            <p>客服專線 0800-000-482 (服務時間: 週一至週六 09:00-18:00，週日與國定假日除外)</p>
            <a href="index.php">首頁</a>
            <a href="user/login.php">登入</a>
            <a href="user/register.php">註冊</a>
            <a href="admin/shop.php">店家後台管理系統</a>
            <!-- <a href="logout_temp.php">登出</a> -->
        </div>

    </footer>
</body>

</html>