<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$data="select* from commiter";
//$ID = $POST['ID'];
$id = $_POST['first'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$sex = $_POST['sex'];
//$People = $_POST['people'];4
$check = 0;
//$ID = $_SESSION['account'];
		//echo $Date;echo $Session;echo $Class;
$output = $conn->query($data);
$row = $output->fetch_assoc();
//紅色字體為判斷密碼是否填寫正確
foreach($row as $check_account){
	// if($id == $check_account['COMTR_ACCOUNT']){
	// 	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	// 	echo '此帳號已有人使用!<br>';
	// 	$check = 1;
	// }
	echo 	$check_account;
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
else if($name=='')
{
	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	echo '請填入信箱!<br>';
	$check = 1;
}
if($check == 0)
{
		$sql = "INSERT INTO commiter(COMTR_ACCOUNT,COMTR_PASSWD,COMTR_NAME,COMTR_SEX) VALUES('$id','$pwd','$name','$sex')";
        $conn->query($sql);
        echo 'Success!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>