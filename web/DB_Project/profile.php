<?php
    include("mysql_connect.inc.php");
    session_start();
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
<div style="text-align:right;font-weight:bold;margin:3px auto;">
    <input class="button button1" type="button" name="Back" value = "返回" onclick="location.href='index.php'">
</div>
<div style="text-align:center;font-weight:bold;margin:3px auto;">
   
    <br><br>
	
    <?php
        function count_line($id){
            include("mysql_connect.inc.php");
            $count = "SELECT COMTR_NUM,COUNT(COM_LINE) FROM comment_line WHERE COMTR_NUM = '$id' GROUP BY COMTR_NUM ";
            $count = $conn->query($count);
            $row = $count->fetch_assoc();
            return $row['COUNT(COM_LINE)'];
        } 
        function avg_star($id){
            include("mysql_connect.inc.php");
            $sql = "SELECT AVG(comment_line.COM_STAR),commenter.COMTR_NAME FROM comment_line INNER JOIN commenter 
                    ON comment_line.COMTR_NUM = commenter.COMTR_NUM
                    WHERE commenter.COMTR_NUM = '$id'";
            $o = $conn->query($sql);
            $row = $o->fetch_assoc();
            return $row;
        }
        function get_commiter($num){
            include("mysql_connect.inc.php");
            $get_num = "SELECT * FROM commenter WHERE COMTR_ACCOUNT = '$num'";
            $o = $conn->query($get_num);
            $row = $o->fetch_assoc();
            return $row['COMTR_NUM'];
        }
        function get_res($num){
            include("mysql_connect.inc.php");
            $get_num = "SELECT * FROM rst_table WHERE RST_NUM = '$num'";
            $o = $conn->query($get_num);
            $row = $o->fetch_assoc();
            return $row['RST_NAME'];
        }
        $id = $_SESSION['Account'];
        
        $id = get_commiter($id);
        $result = "SELECT * FROM comment_line WHERE COMTR_NUM ='$id';";
        $output = $conn->query($result);
        // print_r(avg_star($id));
        echo "現在日期".date("Y/m/d").'<br>';
        echo avg_star($id)['COMTR_NAME'].' 評論了'.count_line($id).'則評論  平均評分：'.avg_star($id)['AVG(comment_line.COM_STAR)'];
        echo '<div class="table-wrapper" style="align:center;">';
        echo '<form  id ="form" style="align:center" >';
        echo '<table id ="table1"class="fl-table" style="text-align:center;"  width ="500" border="1"  >';
        echo '<tr>';	
        echo '<th width="10%">序號</th>';
        echo '<th width="10%" >店名</th>';
        echo '<th width="5%">評分</th>';
        echo '<th width="5%">評論</th>';
        echo '<th width="5%"></th>';
        echo '</tr>';
        
            $i = 1;
            if ($output ->num_rows > 0) {
                while($row = $output->fetch_assoc()) {
                    // print_r($row);
                    // $name_res = $row["RST_NAME"];
                    // $id = $row["RST_NUM"];
                    // $location = $row["RST_ADDRESS"];
                    // $score = $row["RST_STAR"];
                    // $avg_price = $row["RST_AVG_PRICE"];
                    // $res_type = $row["RST_PHONE"];
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.get_res($row['RST_NUM']).'</td>';
                    echo '<td>'.$row['COM_STAR'].'</td>';
                    echo '<td>'.$row['COM_MSG'].'</td>';
                    echo '<td><a  class="example_f" href=commit.php?id='.$row['RST_NUM'].'>評論</a></td>';
                    // // echo '<td> <button  class="example_f" id="commit" onclick="processFormData('.$i.',0)">評論</button></td>';
                    echo '</tr>';
                    $i = $i + 1;
                }
            }
        echo '</table>';
        echo '</form>';
        echo '</div>';
				
	?>


</div>

