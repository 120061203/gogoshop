<?
    include("connect.php");
    
    $drinkName=$_POST['drinkName'];
    $midPrice=$_POST['midPrice'];
    $largePrice=$_POST['largePrice'];

    $sql_query = "select drink_id from drinks order by drink_id desc";
    $result = mysql_query($sql_query);
    $row=mysql_fetch_array($result);
    $cnt = 'D001'; //流水號
    if($row[0])//有資料
    {
        $num=intval(substr($row[0],2,3));//後面三碼轉成數字
        $num_str = strval($num); //int轉string

        if ($num == 9) //產生流水號
            $cnt = 'D010';
        elseif ($num == 99) 
            $cnt = 'D100';
        else
            $cnt = 'D'.str_repeat('0', (3 - strlen($num_str))).($num_str + 1);
    }

    if(@copy($_FILES['drinkFile']['tmp_name'],"../imgs/".$cnt.".png"))
    {
        $sql_query="insert into drinks values('".$cnt."','".$drinkName."','".$midPrice."','".$largePrice."',default)";
        mysql_query($sql_query);
        
        header('Location:shopManage.php');

        //echo "<h2>Your file has been uploaded successfully.</h2>"."<br>";

        //echo "<font size=5 color=#ff0000> Filename:</font>" .$_FILES['drinkFile']['name']."<br>";  
    }
    else
    {
        header('Location:newDrink.php');
        //echo "<h2>Error:failed to upload file</h2>"."<br>";
    }
?>