<html>

<head>
<title>修改個人資料結果</title>
</head>

<body>

<?php
	ob_start();
    session_start();
	include("connect.php");
	
	$usr=$_SESSION["usr"];
	$pwd=$_GET["pwd"];
	$mail=$_GET["mail"];
	$phone=$_GET["phone"];
	$name=$_GET["name"];
	$addr=$_GET["addr"];

	$select_db=@mysql_select_db("gogodrinkshop");//選擇資料庫
	if(!$select_db)
	{
		echo'<br>error';
	}
	else
	{
		//echo'<br>找到資料庫';
		
        // $sql_query="INSERT INTO users VALUES('".$usr."','".$name."','".$phone."','".$pwd."','".$addr."','".$mail."')";
        $sql_query="UPDATE users
                    SET name='".$name."',phone_num='".$phone."',pwd='".$pwd."',addr='".$addr."',mail='".$mail."'
                    WHERE user_id='".$usr."'
                    ";
		$result=mysql_query($sql_query);
		
		$_SESSION['pwd']=$pwd;
		////////////////修改成功條件
		if($result)
		{
			echo'<br>註冊成功!<br>';
		
			// echo'<h5>進入<a href="login.php">登入畫面</a></h5> ';
			// echo'
			// <meta http-equiv="refresh" content="0; url=member.php">
        	// <h5>網頁將在3秒後返回註冊畫面<br>若不想等待，請<a href="member.php">點擊此</a></h5> 
            // ';
            header('location:member.php');
			$sql_query="select * from users where user_id='".$usr."'";//下sql語法
			$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
			
			echo'<table border=1 width=50%>';
			echo'<tr>';
			echo'<td>usrid';
			echo'<td>passwd';
			echo'<td>name';
			echo'<td>Email';
			echo'<td>phone';
			echo'<td>address';
			
			while($row=mysql_fetch_array($result))
			{
				echo'<tr>';
				echo'<td>'.$row[0];
				echo'<td>'.$row[1];
				echo'<td>'.$row[2];
				echo'<td>'.$row[3];
				echo'<td>'.$row[4];
				echo'<td>'.$row[5];
			} 
			echo'</table>';
			
		}
		else
		{
			echo'帳號重複';
			echo'
			<meta http-equiv="refresh" content="3; url=editProfile.php">
        	<h5>網頁將在3秒後返回註冊畫面<br>若不想等待，請<a href="editProfile.php">點擊此</a></h5> 
			';
		}ob_end_flush();
	}
?>

</body>

</html>