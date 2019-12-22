<?php 
session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<body onload="setFocus()">
<div class="Container">
<div style="width:100%">
</div>
<div style="text-align:center;font-weight:bold;margin:3px auto;">

</div>
<div style="width:386px;border:solid 2px blue;margin:0 auto;">
  <div style="width:380px;margin:3px auto;">
  <form method="POST" name="LoginForm" action="connect.php">
    <table border="0" align="center" width="100%">
<?php
	include("mysql_connect.inc.php");

	$ID = $_POST['ID'];
	$name = $_POST['name'];
	$sql = "SELECT * FROM commenter WHERE COMTR_ACCOUNT='$ID'";
	$output = $conn->query($sql);
	$row = $output->fetch_assoc();
	$name_check = $row['COMTR_NAME'];
	$ID_check = $row['COMTR_ACCOUNT'];



	//紅色字體為判斷密碼是否填寫正確
	if(isset($name) && isset($name_check)&& $name == $name_check && isset($ID) && isset($ID_check)&& $ID == $ID_check)
	{
		//$ID = $_SESSION['account'];
	
		//更新資料庫資料語法
		// $sql = "SELECT * FROM commenter where COMTR_ACCOUNT='$ID'";
		echo $Now = date('Y-m-d H:i:s');
		echo '<br>';
		// if($conn->query($sql))
		// {
				echo $name_check.'您的密碼為:'.$row['COMTR_PASSWD'];
				echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
		// }
	}
	else if($ID =='')
	{
			echo '請輸入帳號!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=resetpwd.php>';
	}
	else if($email =='')
	{
			echo '請輸入信箱!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=resetpwd.php>';
	}
	else if($ID != $ID1 || $email != $email2)
	{
			echo '帳號或信箱輸入錯誤!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=resetpwd.php>';
	}
?>
</table>
<form>
