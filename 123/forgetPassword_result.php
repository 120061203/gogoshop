<?
    session_start();
    include("connect.php");

    $_SESSION['mail'] = $_POST['mail'];

    $sql_query="select name from users where mail='".$_SESSION['mail']."'";
    //echo $sql_query;
    $result = mysql_query($sql_query);
    if($row = mysql_fetch_array($result))
    {
        $name = $row[0];
        $captcha = random_key(6);
        //echo $captcha;
        include("mail.php");
        $_SESSION['captcha'] = $captcha;
    }
    else
    {
        $_SESSION['email_error']=1;
        echo "無此信箱<br>3秒後跳回忘記密碼";

        header("refresh:3;url=forgetPassword.php");
    }

    function random_key($length = 32, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        if (!is_int($length) || $length < 0) {
            return false;
        }
        $characters_length = strlen($characters) - 1;
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $characters_length)];
        }
        return $string;
    }
?>