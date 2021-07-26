<?php

session_start();
include 'connect.php';

$pay_way = $_GET['pay_way'];
$pickup_way = $_GET['pickup_way'];
$sum = $_SESSION['sum'];

//////////存進orders//////////
$sql_query = "select phone_num,addr from users where user_id='".$_SESSION['usr']."'"; //下sql語法
//echo $sql_query;
$result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
$row = mysql_fetch_array($result);
$phone = $row[0];
$addr = $row[1];
//echo $phone;
//echo $addr;
$order_id_temp;
// $sql_query = 'select * from orders';
//         $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
//         $count = mysql_num_rows($result); //資料筆數，無資料時給流水號編號
//         $count_str = strval($count); //int轉string

//         $cnt = 'O000'; //流水號
//         if ($count == 0) {//產生流水號
//             $cnt = 'O001';
//         } elseif ($count == 9) {
//             $cnt = 'O010';
//         } elseif ($count == 99) {
//             $cnt = 'O100';
//         } else {
//             $cnt = 'O'.str_repeat('0', (3 - strlen($count_str))).($count_str + 1);
//         }

$sql_query = 'select order_id from orders order by order_id desc';
$result = mysql_query($sql_query);
$row=mysql_fetch_array($result);
$cnt = 'O001'; //流水號
if($row[0])//有資料
{
    $num=intval(substr($row[0],1,3));//後面三碼轉成數字
    $num_str = strval($num); //int轉string

    if ($num == 9) //產生流水號
        $cnt = 'O010';
    elseif ($num == 99) 
        $cnt = 'O100';
    else
        $cnt = 'O'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
}
$order_id_temp = $cnt;
$sql_query = "insert into orders values('".$cnt."','".$_SESSION['usr']."','".$addr."','".$phone."',CURRENT_TIMESTAMP,'".$pay_way."','".$pickup_way."','".$sum."',0)"; //0已下單，未製作
//echo $sql_query; //新增訂單
mysql_query($sql_query);

$sql_query = "select drink_id,sweet,ice,size,topping_id from cart where user_id='".$_SESSION['usr']."' and status=1";
$result = mysql_query($sql_query);
while ($row = mysql_fetch_array($result)) {//while1
    //////////存進drink_order//////////
    // $sql_query = 'select * from drink_order';
    // $result1 = mysql_query($sql_query); //執行sql語法，執行完會丟給result
    // $count = mysql_num_rows($result1); //資料筆數，無資料時給流水號編號
    // $count_str = strval($count); //int轉string

    // $cnt = 'DO000'; //流水號
    // if ($count == 0) {//產生流水號
    //     $cnt = 'DO001';
    // } elseif ($count == 9) {
    //     $cnt = 'DO010';
    // } elseif ($count == 99) {
    //     $cnt = 'DO100';
    // } else {
    //     $cnt = 'DO'.str_repeat('0', (3 - strlen($count_str))).($count_str + 1);
    // }

    $sql_query = "select drink_order_id from drink_order order by drink_order_id desc";
    $result1 = mysql_query($sql_query);
    $row1=mysql_fetch_array($result1);
    $cnt = 'DO001'; //流水號
    if($row1[0])//有資料
    {
        $num=intval(substr($row1[0],2,3));//後面三碼轉成數字
        $num_str = strval($num); //int轉string

        if ($num == 9) //產生流水號
            $cnt = 'DO010';
        elseif ($num == 99) 
            $cnt = 'DO100';
        else
            $cnt = 'DO'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
    }
    $drink_order_id_temp = $cnt;

    $sql_query = "insert into drink_order values('".$cnt."','".$order_id_temp."','".$row[0]."','".$row[1]."',
    '".$row[2]."','".$row[3]."')";
    mysql_query($sql_query);

    //////////存進topping_order//////////

    // $sql_query = 'select * from topping_order';
    // $result1 = mysql_query($sql_query); //執行sql語法，執行完會丟給result
    // $count = mysql_num_rows($result1); //資料筆數，無資料時給流水號編號
    // $count_str = strval($count); //int轉string

    // $cnt = 'TO000'; //流水號
    // if ($count == 0) {//產生流水號
    //     $cnt = 'TO001';
    // } elseif ($count == 9) {
    //     $cnt = 'TO010';
    // } elseif ($count == 99) {
    //     $cnt = 'TO100';
    // } else {
    //     $cnt = 'TO'.str_repeat('0', (3 - strlen($count_str))).($count_str + 1);
    // }

    $sql_query = 'select topping_order_id from topping_order order by topping_order_id desc';
    $result1 = mysql_query($sql_query);
    $row1=mysql_fetch_array($result1);
    $cnt = 'TO001'; //流水號
    if($row1[0])//有資料
    {
        $num=intval(substr($row1[0],2,3));//後面三碼轉成數字
        $num_str = strval($num); //int轉string

        if ($num == 9) //產生流水號
            $cnt = 'TO010';
        elseif ($num == 99) 
            $cnt = 'TO100';
        else
            $cnt = 'TO'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
    }

    if ($row[4] != 'NULL') {//有點配料
        $sql_query = "insert into topping_order values('".$cnt."','".$drink_order_id_temp."','".$row[4]."')";
        mysql_query($sql_query);
    }
}//while1 end 儲存訂單

//更改購物車狀態
$sql_query = "update cart set status=2 where user_id='".$_SESSION['usr']."' and status=1"; //將購物車狀態設為2(已提交訂單)
mysql_query($sql_query);

header('Location:member.php');
