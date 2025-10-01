<html>

<head>
<title>首頁</title>
</head>

<body>

<?php
	$flag=0;
	include("connect.php");

	$usr=$_GET["usr"];
	$pwd=$_GET["pwd"];
	
	//echo $usr;
	//echo $pwd;
	
	// 檢查資料庫連接
	if(!$link)
	{
		echo'<br>找不到資料庫';
	}
	else
	{
		//echo'<br>找到資料庫';
		
		$sql_query="select * from users where user_id='".$_COOKIE["usr"]."'and pwd='".$_COOKIE["pwd"]."'";//下sql語法
		$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
		
		if(mysql_num_rows($result)==1)
		{
			echo '<center>';
			echo'<br>WELCOME!!!';
			$flag=1;
			echo'<table border=1>';
			echo'<tr>';
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
			
			$sql_query="select * from drinks";//下sql語法
			$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
			
			echo'<center><table border=0 cellspacing="0" cellpadding="0" width=40%>';
			echo'<tr>';
			
			while($row=mysql_fetch_array($result))
			{
				$cnt++;
				if($cnt==5)
				{
					echo'<tr>';
					$cnt=1;
				}
					
				echo'<td width=20%><center><img src=../gogoshop/pic/'.$row[0].'.png style="border:0px #ccc solid;padding:20px;" width=300 hight=200></center>';
				echo'　 '.$row[1].'　小杯NT $'.$row[2].'　大杯NT $'.$row[3];
			} 
			
			echo'</table>';
		}
		else
		{
			echo'<center><br>WELCOME!!!<br>未登入<br>';
			
		}
		if($flag==0)
		{
?>
			<button><a href="login.php" style="text-decoration:none;color:black">登入</a></button>
			<button><a href="register.php" style="text-decoration:none;color:black">註冊</a></button>
<?php
		}
		else
		{
			$flag=0;
?>
			<button><a href="logout_temp.php" style="text-decoration:none;color:black">登出</a></button>
<?php	
		}
	}
?>

</body>


</html>