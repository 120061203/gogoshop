<?
    include("connect.php");
    
    $drink_id=$_POST['drink_id'];
    $drinkName=$_POST['drinkName'];
    $midPrice=$_POST['midPrice'];
    $largePrice=$_POST['largePrice'];

    @copy($_FILES['drinkFile']['tmp_name'],"../imgs/".$drink_id.".png");
    $sql_query="update drinks set drink_name='".$drinkName."',mid_price='".$midPrice."',large_price='".$largePrice."' where drink_id='".$drink_id."'";
    echo $sql_query;
    mysql_query($sql_query);
    // if()
    // {
        
    //     //echo "<h2>Your file has been uploaded successfully.</h2>"."<br>";

    //     //echo "<font size=5 color=#ff0000> Filename:</font>" .$_FILES['drinkFile']['name']."<br>";  
    // }
    // else
    // {
    //     //echo "<h2>Error:failed to upload file</h2>"."<br>";
    // }
    // header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
    // header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
    // header("Cache-Control: no-store, no-cache, must-revalidate");
    // header("Cache-Control: post-check=0, pre-check=0", false);
    // header("Pragma: no-cache");

    header('Location:shopManage.php');
?>