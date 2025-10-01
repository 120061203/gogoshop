<?php
    //連接資料庫
    $location = $_ENV['DB_HOST'] ?? 'localhost'; //從環境變數獲取或使用默認值
    $account = $_ENV['DB_USER'] ?? 'root';
    $password = $_ENV['DB_PASSWORD'] ?? '12345678';
    $database = $_ENV['DB_NAME'] ?? 'gogodrinkshop';
    
    if (isset($location) && isset($account) && isset($password)) {
        $link = mysqli_connect($location, $account, $password, $database);

        if (!$link) {
            echo'無法連接資料庫';
            exit;
        } else {
            // 設置字符集
            mysqli_set_charset($link, 'utf8');
            //echo"連接成功";
        }
    }
    
    // 包含MySQL兼容性函數
    include_once '../mysql_compat.php';
    ?>
	