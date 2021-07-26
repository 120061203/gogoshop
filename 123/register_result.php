<html>

<head>
<title>註冊結果</title>
</head>

<body>

<?php
	ob_start();

	include("connect.php");
	
	$usr=$_GET["usr"];
	$pwd=$_GET["pwd"];
	$mail=$_GET["mail"];
	$phone=$_GET["phone"];
	$name=$_GET["name"];
	$addr=$_GET["addr"];

	//$select_db=@mysql_select_db("gogodrinkshop");//選擇資料庫
	// if(!$select_db)
	// {
	// 	echo'<br>error';
	// }
	// else
	// {
		//echo'<br>找到資料庫';
		
		$sql_query = "SELECT * FROM users WHERE user_id='".$usr."'";
		//echo $sql_query;
		$result = mysql_query($sql_query);
		//echo $result;
		if(!mysql_num_rows($result))//帳號不重複
		{
			$sql_query="INSERT INTO users VALUES('".$usr."','".$name."','".$phone."','".$pwd."','".$addr."','".$mail."',default)";
			$result=mysql_query($sql_query);
			echo $sql_query;

			////////////////修改成功條件
			if($result)
			{
				echo'<br>註冊成功!<br>';
			
				echo'<h5>進入<a href="login.php">登入畫面</a></h5> ';
				// echo'
				// <meta http-equiv="refresh" content="0; url=login.php">
				// <h5>網頁將在3秒後返回註冊畫面<br>若不想等待，請<a href="login.php">點擊此</a></h5> 
				// ';

				header('Location:login.php');
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
				$_SESSION['email_error']=1;
				header('Location:register.php');

				echo'信箱已被使用';
				echo'
				<meta http-equiv="refresh" content="3; url=register.php">
				<h5>網頁將在3秒後返回註冊畫面<br>若不想等待，請<a href="register.php">點擊此</a></h5> 
				';
			}
		}
		else
		{
			$_SESSION['account_error']=1;
			header('Location:register.php');

			echo'帳號重複';
			echo'
			<meta http-equiv="refresh" content="3; url=register.php">
        	<h5>網頁將在3秒後返回註冊畫面<br>若不想等待，請<a href="register.php">點擊此</a></h5> 
			';
		}
		//echo $sql_query;
	//}
	ob_end_flush();
?>

</body>

</html>