<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if (isset($_POST['ResetPWD']) && !empty($_POST['ResetPWD'])) {
    header ("Location:resetpwd.php");
    exit();
}
?>
<style>
  .button {
    background-color: rgba( 0, 0, 0, 0.1); /* Green */
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  }

  .button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  }
</style>
<html>
  <head>
    <title>登入</title>
  </head>
  <body>
    <body onload="setFocus()">
      <div class="Container">
        <div style="text-align:right;font-weight:bold;margin:3px auto;">
          <input class="button button1" type="button" name="Back" value = "返回" onclick="location.href='index.php'">
        </div>
        <div style="text-align:center;font-weight:bold;margin:3px auto;">
        餐廳推薦評論
        </div>
        
        <div style="width:386px;margin:0 auto;">
          <div style="width:380px;margin:3px auto;">
            <form method="POST" name="LoginForm" action="connect.php">
              <table border="0" align="center" width="100%">
                <div style="text-align:center;font-weight:bold;margin:3px auto;">
                  使用者登入
                </div>
                <tr height="30">
                  <td align="right">登入帳號：</td>
                    <td>
                      <input type="text" name="ID" size="20" maxlength="10" placeholder="at0000">
                    </td>
                </tr>
                <tr height="30">
                  <td align="right">登入密碼：</td>
                    <td>
                      <input type="password" name="PWD" size="20" maxlength="30" class="pwdtext" placeholder="1234">
                    </td>
                  </td>  
                </tr>
              </table>
              <div style="text-align:center;margin:6px 0 0 0;">
                <!-- <td align="right">帳號:philip  密碼:123456</td><br> -->
                  <input type="submit" name="login" value="登入">
                <br>
              </div>
            </form>
          </div> 
          
          <div style="text-align:center;margin:8px 0 0 0;">
          不知或忘記密碼，請點選『忘記密碼』按鈕重設密碼
          </div>
          <div style="text-align:center;margin:8px 0 0 0;">
            <!-- <input style="center"; type="submit"; name="created"; value="新增帳戶" onclick="location.href='create.php'"> -->
            <input type="button" name="ResetPWD" value = "忘記密碼" onclick="location.href='resetpwd.php'">
          </div>
        </div>
        
      </div>
      <br>
      
      
    </body>
  </body>
</html>
