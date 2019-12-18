<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$data=mysql_query("select* from myaccount");
//$ID = $POST['ID'];
$id = $_POST['first'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
//$People = $_POST['people'];4
$check = 0;
//$ID = $_SESSION['account'];
		//echo $Date;echo $Session;echo $Class;

//紅色字體為判斷密碼是否填寫正確
for($i = 0;$i<mysql_num_rows($data);$i++){
	$rs=mysql_fetch_row($data);
	if($id == $rs[0]){
		echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
		echo '此帳號已有人使用!<br>';
		$check = 1;
	}	
}
if($pwd==''){
	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	echo '請填入密碼!<br>';
	$check = 1;
}
else if($id=='')
{
	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	echo '請填入帳號!<br>';
	$check = 1;
}
else if($email=='')
{
	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	echo '請填入信箱!<br>';
	$check = 1;
}
if($check == 0)
{
		$sql = "INSERT INTO myaccount(id,password,email) VALUES('$id','$pwd','$email')";
        mysql_query($sql); 
        echo 'Success!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>