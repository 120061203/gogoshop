<?
    ob_start();
    session_start();
    include("connect.php");
	
    echo $_POST['captcha'].'<br>'.$_SESSION['captcha'];

    if($_POST['captcha'] == $_SESSION['captcha'])
    {
        header('Location:resetPassword.php');
    }
    else
    {
       $_SESSION['captcha_error']=1;
       header('Location:captcha.php');
    }
    
    ob_end_flush();
?>