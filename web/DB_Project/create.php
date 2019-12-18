<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class="Container">
<div style="width:100%">

</div>
<div style="text-align:center;font-weight:bold;margin:3px auto;">
加入會員
</div>
<div style="width:386px;border:solid 2px red;margin:0 auto;">
  <div style="width:380px;margin:3px auto;">
  <form method="POST" name="LoginForm" action="create_finish.php">
    <table border="0" align="center" width="100%">
<?php
include("mysql_connect.inc.php");
		
        echo '帳號:<input type = "text" name = "first" value =""><br><br>';
		echo '密碼:<input type = "password" name = "pwd" value =""><br><br>';
		echo '信箱:<input type = "email" name = "email"><br><br>';
		echo '<input type = "submit" name = "check" value ="確認" >';
		
		/*if(empty($First))
			echo '帳號不能為空的';
		for($i = 0;$i<mysql_num_rows($data);$i++){
			$rs=mysql_fetch_row($data);
			if($First == $rs[0] ){
				echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
				echo '此帳號已有人使用!';
			}	
		}*/
        /*$email = $_SESSION['account'];
        $sql = "SELECT * FROM myaccount where email='$email'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        echo "<form name=\"form\" method=\"post\" action=\"resetpwd_finish.php\">"; 
		echo "Account:<input type=\"text\" name=\"ID\" value=\"$row[0]\" /><br>";
        echo "Enter the user Email:<input type=\"text\" name=\"email\" value=\"$row[2]\" /> <br>"; 
        echo "<input type=\"submit\" name=\"button\" value=\"Submit\" />";
        echo "</form>";*/


?>
</table>
</form>

<input type = "submit" name = "cancel" value ="取消" onclick="location.href='login.php'">