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
		echo '暱稱:<input type = "text" name = "name"><br><br>';
		echo '<select name="sex">';
		echo '<option value="男">男</option>';
		echo '<option value="女">女</option>';		
		echo '</select>';
		echo '<br><br>';
		echo '<input type = "submit" name = "check" value ="送出" >';
		
		


?>
</table>
</form>

<input type = "submit" name = "cancel" value ="取消" onclick="location.href='login.php'">