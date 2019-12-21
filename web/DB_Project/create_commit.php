<?php
        session_start(); 
        header('Content-Type: text/html; charset=utf-8');
        include("mysql_connect.inc.php");
        $name=$_GET['id'];
        $ID = $_SESSION['Account'];
?>
<?php
   
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="script.js"  type="text/javascript" />
</head>

<style>

    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 15px;
}

.fl-table thead th {
    color: #ffffff;
    background-color: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

.example_f {
   border-radius: 4px;
   background: linear-gradient(to right, #67b26b, #4ca2cb) !important;
   border: none;
   color: #FFFFFF;
   text-align: center;
   text-transform: uppercase;
   font-size: 10px;
   padding: 5px;
   width:50px;
   transition: all 0.4s;
   cursor: pointer;
   margin: 5px;
 }
 .example_f span {
   cursor: pointer;
   display: inline-block;
   position: relative;
   transition: 0.4s;
 }
 .example_f span:after {
   content: '\00bb';
   position: absolute;
   opacity: 0;
   top: 0;
   right: -20px;
   transition: 0.5s;
 }
 .example_f:hover span {
   padding-right: 25px;
 }
 .example_f:hover span:after {
   opacity: 1;
   right: 0;
 }
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
<div style="text-align:center;font-weight:bold;">
    <!--  -->
    <br><br>
<?php
        function RES_TYPE($com_name){
            include("mysql_connect.inc.php");
            $result = "SELECT * FROM TYPE_CAT WHERE TYPE_NUM = '$com_name'";
            $output = $conn->query($result);
            while($row = $output->fetch_assoc()) {
                return $row['TYPE_NAME'];
            }
        }
        date_default_timezone_set("Asia/Taipei");
        echo "現在日期".date("Y/m/d/ h:i:s").'<br>';
        $time = date("Y/m/d/ h:i:s");
        echo '<center><br>';
        echo '<div class="table-wrapper" style="align:center;">';
        echo '<form method="POST" name="commit" action="create_commit_finish.php">';
        $result = "SELECT * FROM Offers Where RST_NUM = '$name'";//抓餐廳名稱  
        $output = $conn->query($result); 
        echo '<input type="hidden" value='.$name.' name = "res_num">';
        echo '推薦類型：<select name = "res_Type">';         
        while($row = $output->fetch_assoc()) {  
            $res_type = $row["TYPE_NUM"];  
            echo $res_type;         
            echo '<option >'.RES_TYPE($res_type).'</option>';
        }
        echo '</select><br><br>';
        echo '評分：<select name = "star">';
        echo '<option value = "0">不推薦</option>';
        echo '<option value = "1">1星</option>';
        echo '<option value = "2">2星</option>';
        echo '<option value = "3">3星</option>';
        echo '<option value = "4">4星</option>';
        echo '<option value = "5">5星</option>';
        echo '</select><br><br>';
        echo  '評論：  <textarea rows="10" cols="50" name = "commit"></textarea><br><br><br>';
        echo '<input type="submit"  class="button button1" name="login" value="送出">';
        echo '</form>';
        echo '</div>';
        echo'</center></br>';
				
	?>

    

</div>