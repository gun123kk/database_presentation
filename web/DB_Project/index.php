<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 session_start();
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
    <title>台北餐廳推薦系統</title>
  </head>
  <body>
    <body onload="setFocus()">
      <div class="Container">
        <form action="login.php">
          <div style="text-align:right;font-weight:bold;margin:3px auto;">
            <?php
              if(empty($_SESSION['Account']))
                echo'<button class="button button1" value="登入" >登入</button>';
            ?>
              
          </div>
        </form>
        <div style="text-align:center;font-weight:bold;margin:3px auto;">
        台北餐廳推薦系統
        </div>
        <br>
        <div style="width:386px;margin:0 auto;">
          <div style="width:380px;margin:3px auto;">
            <form style="text-align:center;margin:6px 0 0 0;"method="POST" name="LoginForm" action="search.php">
              <table border="0" align="center" width="100%">
                <div style="text-align:center;font-weight:bold;margin:3px auto;">
                  找餐廳
                </div>
                <br>
                <tr height="30">
                  <td align="center">台北市：
                    <select name="Location">
                        <option value="AREA_00">中正區</option>
                  　     <option value="AREA_01">大同區</option>
                  　     <option value="AREA_02">中山區</option>
                  　     <option value="AREA_03">松山區</option>
                        <option value="AREA_04">大安區</option>
                    　  <option value="AREA_05">萬華區</option>
                    　  <option value="AREA_06">信義區</option>
                    　  <option value="AREA_07">士林區</option>
                        <option value="AREA_08">北投區</option>
                    　  <option value="AREA_09">內湖區</option>
                    　  <option value="AREA_10">南港區</option>
                  　    <option value="AREA_11">文山區</option>　  
                    </select>  
                  </td>
                </tr>
                
                <!-- <tr height="30">
                  <td align="right">登入密碼：</td>
                    <td>
                      <input type="password" name="PWD" size="20" maxlength="30" class="pwdtext">
                    </td>
                  </td>  
                </tr> -->
              </table>
              <br>
              <!-- <div style="text-align:center;margin:6px 0 0 0;"> -->
                <!-- <td align="right">帳號:philip  密碼:123456</td><br> -->
                  <input  type="submit" name="Search" value="送出">
                <br><br>
              <!-- </div> -->
            </form>
          </div> 
          <div style="text-align:center;margin:8px 0 0 0;">
          選出您想找的地區吧!
          </div>
          <!-- <div style="text-align:center;margin:8px 0 0 0;">
            <input style="center"; type="submit"; name="created"; value="新增帳戶" onclick="location.href='create.php'">
            <input type="button" name="ResetPWD" value = "忘記密碼" onclick="location.href='resetpwd.php'">
          </div> -->
        </div>
        
      </div>
      <br>

    </body>
  </body>
</html>
