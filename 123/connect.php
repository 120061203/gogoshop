	<?php
    //連接資料庫
    $location = 'localhost'; //連到本機
    $account = 'root';
    $password = '12345678';
    if (isset($location) && isset($account) && isset($password)) {
        $link = mysql_pconnect($location, $account, $password); //mysql_pconnect

        if (!$link) {
            echo'無法連接資料庫';
            exit;
        } else {
            $select_db = @mysql_select_db('gogodrinkshop'); //選擇資料庫
            //echo"連接成功";
        }
    }
    ?>
	