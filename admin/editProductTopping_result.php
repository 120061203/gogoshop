<?
    include("connect.php");
    
    $topping_id=$_POST['topping_id'];
    $toppingName=$_POST['toppingName'];
    $toppingPrice=$_POST['toppingPrice'];

    $sql_query="update toppings set topping_name='".$toppingName."',topping_price='".$toppingPrice."' where topping_id='".$topping_id."'";
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