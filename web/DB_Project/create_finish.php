<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$data="select* from commenter";
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


//判斷帳號是否已存在
function check_account($id){
	include("mysql_connect.inc.php");
	$check = "select * from commenter where COMTR_ACCOUNT = '$id'";
	$check = $conn->query($check);
	$check = $check->fetch_assoc();
	return $check;
}


//抓取評論者comtr_NUM
function get_COMTR_NUM(){
	include("mysql_connect.inc.php");
	$sql = "select MAX(COMTR_NUM) from commenter";
	$o = $conn->query($sql);
	$o = $o->fetch_assoc();
	return $o['MAX(COMTR_NUM)'];
}

print_r( get_COMTR_NUM());
// die;
if(empty(check_account($id))){
	$sql = "INSERT INTO commenter(COMTR_NAME,COMTR_ACCOUNT,COMTR_PASSWD,COMTR_SEX) VALUES('".$name."','".$id."','".$pwd."','".$sex."')";
	$check = $conn->query($sql);
	// echo $check;
	echo 'Success!';
	echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
	// }
	// print_r(isset($check_account['COMTR_ACCOUNT']));die;
}
else{
	echo '<meta http-equiv=REFRESH CONTENT=2;url=create.php>';
	echo '此帳號已有人使用!<br>';
	$check = 1;
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



?>
