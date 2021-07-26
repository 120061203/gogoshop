<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的會員</title>
    <link rel="stylesheet" href="css/main.css">
    <style><?php ob_start(); session_start(); include "../css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="logo/gogoshop.ico" type="image/x-icon">
</head>

<body>
    <?php
        include 'connect.php';
        // echo $_SESSION['usr'];

        //檢查登入狀態
        $sql_query = "select admin_id,admin_pwd from shop_users where admin_id='".$_SESSION['usr']."' and admin_pwd='".$_SESSION['pwd']."'";
        $result = mysql_query($sql_query);
        if(!mysql_fetch_array($result))
            header('Location:shop.php');

        $sql_query = "select admin_id from shop_users where admin_id='".$_SESSION['usr']."'"; //顯示名字
        $result = mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $name = $row[0];
        // echo $name;
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
    <?php
        $sql_query="SELECT * FROM users";
        $result = mysql_query($sql_query);
        // echo mysql_num_rows($result);
        // $row = mysql_fetch_array($result);
        
    ?>



    <div class="container">
        <div class="myVipArea">
            <h1>會員名單</h1>
            <table>
                <thead>
                    <tr>
                        <th>會員姓名</th>
                        <!--name row[1]-->
                        <th>會員賬號</th>
                        <!--user_id row[0]-->
                        <th>會員電話</th>
                        <!--phone_num row[2]-->
                        <th>會員地址</th>
                        <!--addr row[4]-->
                        <th>會員郵箱</th>
                        <!--mail row[5]-->
                        <th>操作</th>

                    </tr>
                </thead>
                <?while ($row = mysql_fetch_array($result)) {//while1 找有幾個會員

                ?>
                <tbody>
                    <tr>
                        <td><?echo $row[1]?></td>
                        <!--name row[1]-->
                        <td><?echo $row[0]?></td>
                        <!--user_id row[0]-->
                        <td><?echo $row[2]?></td>
                        <!--phone_num row[2]-->
                        <td><?echo $row[4]?></td>
                        <!--addr row[4]-->
                        <td><?echo $row[5]?></td>
                        <!--mail row[5]-->
                        <td>
                            <div class="editVip"><a href="editVip.php?user_id=<?echo $row[0]; ?>"><i class="fas fa-edit"></i></a></div>
                            <div class="deleteVip"><a href="deleteVip.php?user_id=<?echo $row[0]; ?>"><i class="fas fa-trash"></i></a></div>
                        </td>
                    </tr>
                </tbody>
                <?php
                }//while1 end
                ob_end_flush();
                ?>
            </table>
        </div><!--myVipArea-->
    </div><!--containerEnd-->
    
</body>

</html>