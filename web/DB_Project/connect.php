<?php
        session_start(); 
        header('Content-Type: text/html; charset=utf-8');
?>
<body>
<body onload="setFocus()">
<div class="Container">

<div style="text-align:center;font-weight:bold;margin:3px auto;">

</div>
<div style="width:386px;border:solid 2px red;margin:0 auto;">
  <div style="width:380px;margin:3px auto;">
  <form method="POST" name="LoginForm" action="connect.php">
    <table border="0" align="center" width="100%">
<?php
include("mysql_connect.inc.php");
mysqli_select_db($conn,$dbname);
$ID = $_POST['ID'];
$PWD = $_POST['PWD'];
$sql = "SELECT * FROM commenter WHERE COMTR_ACCOUNT ='$ID'";
$result = mysqli_query($conn,$sql);
$row = @mysqli_fetch_row($result);
if($ID != null && $PWD != null && $row[2] == $ID && $row[3] == $PWD)
{
        
        $_SESSION['Account'] = $ID;
		
        echo '歡迎 '.$_SESSION['Account'].' !';
       echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
else
{
        echo '帳號或密碼輸入有誤!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
 }
?>
</table>
</form>

</div>