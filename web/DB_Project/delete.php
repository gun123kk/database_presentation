<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");


$id = $_GET['id'];
$data="DELETE FROM commenter WHERE COMTR_NUM = '$id'";
$output = $conn->query($data);
echo 'Success!';
echo '<meta http-equiv=REFRESH CONTENT=2;url=admin.php>';
?>
