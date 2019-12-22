<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<body onload="setFocus()">
<div class="Container">
<div style="width:100%">

</div>
<div style="text-align:center;font-weight:bold;margin:3px auto;">
忘記密碼
</div>
<div style="text-align:center;font-weight:bold;margin:3px auto;">

</div>
<div style="width:386px;border:solid 2px red;margin:0 auto;">
  <div style="width:380px;margin:3px auto;">
  <form method="POST" name="LoginForm" action="resetpwd_finish.php">
    <table border="0" align="center" width="100%">
<?php
include("mysql_connect.inc.php");


        
        //$email = $_SESSION['account'];
        $sql = "SELECT * FROM commenter";
        $output = $conn->query($sql);
        if ($output ->num_rows > 0) {
            while($row = $output->fetch_assoc()) {
            }
                echo "<form name=\"form\" method=\"post\" action=\"resetpwd_finish.php\">"; 
                echo '帳號:<input type="text" name="ID" value='.$row[2].'><br><br>';
                echo "暱稱:<input type=\"text\" name=\"name\" value=\"$row[1]\" /> <br><br>"; 
                echo "<input type=\"submit\" name=\"button\" value=\"送出\" />";
                echo '<input type="button" name="back" value = "取消" onclick="location.href=\'index.php\'">';
                
                echo "</form>";
            
        }
		
?>
</table>
</form>
