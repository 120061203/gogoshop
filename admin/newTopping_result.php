<?
    include("connect.php");
    
    $name=$_POST['name'];
    $price=$_POST['price'];

    $sql_query = "select topping_id from toppings order by topping_id desc";
    $result = mysql_query($sql_query);
    $row=mysql_fetch_array($result);
    $cnt = 'T001'; //流水號
    if($row[0])//有資料
    {
        $num=intval(substr($row[0],2,3));//後面三碼轉成數字
        $num_str = strval($num); //int轉string

        if ($num == 9) //產生流水號
            $cnt = 'T010';
        elseif ($num == 99) 
            $cnt = 'T100';
        else
            $cnt = 'T'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
    }
    $sql_query="insert into toppings values('".$cnt."','".$name."','".$price."',default)";
    mysql_query($sql_query);
        
    header('Location:shopManage.php');
?>