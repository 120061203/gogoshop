<?php
// MySQL兼容性函數 - 將舊的mysql_*函數轉換為mysqli_*函數

function mysql_query($query) {
    global $link;
    return mysqli_query($link, $query);
}

function mysql_fetch_array($result) {
    return mysqli_fetch_array($result);
}

function mysql_num_rows($result) {
    return mysqli_num_rows($result);
}

function mysql_pconnect($host, $username, $password) {
    return mysqli_connect($host, $username, $password);
}

function mysql_select_db($database) {
    global $link;
    return mysqli_select_db($link, $database);
}

// 錯誤處理函數
function mysql_error() {
    global $link;
    return mysqli_error($link);
}

function mysql_errno() {
    global $link;
    return mysqli_errno($link);
}
?>
