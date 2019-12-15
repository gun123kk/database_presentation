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
</style>
<div style="text-align:center;font-weight:bold;margin:3px auto;">
    <?php
        include("mysql_connect.inc.php");
        // mysqli_query($conn,"set names utf8");
        // mysqli_select_db($conn,"DB_Project");
        // $sql = mysqli_query($conn,"select* from db_hw  ");
        
        $location = $_POST['Location'];
        echo '台北市';
        if($location == "AREA_00")
            echo '中正區';
        elseif($location == "AREA_01")
            echo '大同區';
        elseif($location == "AREA_02")
            echo '中山區';
        elseif($location == "AREA_03")
            echo '松山區';
        elseif($location == "AREA_04")
            echo '大安區';
        elseif($location == "AREA_05")
            echo '萬華區';
        elseif($location == "AREA_06")
            echo '信義區';
        elseif($location == "AREA_07")
            echo '士林區';
        elseif($location == "AREA_08")
            echo '北投區';
        elseif($location == "AREA_09")
            echo '內湖區';
        elseif($location == "AREA_10")
            echo '南港區';
        elseif($location == "AREA_11")
            echo '文山區';
        echo '推薦餐廳';
    ?>
    <br><br>
	
<?php
		echo "現在日期".date("Y/m/d").'<br>';





		echo '<center><br>';

        // $result = "SELECT * FROM db_hw WHERE location_num = '$location'";
        // if(!$result){
        //     echo("Error: ".mysqli_error($conn));
        //         exit();
        // }
		// if(isset($_SESSION['account']))
		// {
			echo '<div class="table-wrapper" style="align:center;">';
            echo '<form  id ="form" style="align:center" >';
			echo '<table id ="table1"class="fl-table" style="text-align:center;"  width ="500" border="1"  >';
			echo '<tr>';	
            //echo '<td>編號</td>';
            echo '<th width="10%">序號</th>';
			echo '<th width="10%" >店名</th>';
			echo '<th width="10%">地址</th>';
			echo '<th width="5%">評分</th>';
            echo '<th width="5%">平均價位</th>';
            echo '<th width="5%">電話</th>';
            echo '<th width="5%"></th>';
			// echo '<td>刪除</td>';
            echo '</tr>';
            // $count = mysqli_query($conn,"SELECT * FROM db_hw");
			$result = "SELECT * FROM RST_Table WHERE area = '$location'";
			// mysqli_close($conn);
			$output = $conn->query($result);
  			// $no_fields=mysqli_num_fields($result);
                $i = 1;
				if ($output ->num_rows > 0) {
					while($row = $output->fetch_assoc()) {
                        
                        $name_res = $row["RST_NAME"];
                        $id = $row["RST_NUM"];
						$location = $row["RST_ADDRESS"];
						$score = $row["RST_STAR"];
						$avg_price = $row["RST_AVG_PRICE"];
						$res_type = $row["RST_PHONE"];
                        echo '<tr>';
                        echo '<td>'.$id.'</td>';
						echo '<td>'.$name_res.'</td>';
						echo '<td>'.$location.'</td>';
						echo '<td>'.$score.'</td>';
						echo '<td>'.$avg_price.'</td>';
                        echo '<td>'.$res_type.'</td>';
                       
                        echo '<td> <button  class="example_f" id="commit" onclick="processFormData('.$i.',1)">評論</button></td>';
                        echo '</tr>';
                        $i = $i + 1;
					}
				}
			echo '</table>';
			echo '</form>';
			echo '</div>';
			// for($i = 0;$i<mysqli_num_rows($count)-1;$i++){
			// 	$rs=mysqli_fetch_row($result);
			// 	echo '<tr>'.'<td>'.$rs[0].'</td>';
			
			// 		if($rs[1]==5)
			// 			echo '<td>中午</td>';
			// 		else if($rs[1]>5 || $rs[1]<5)
			// 			echo '<td>第 '.$rs[1].' 節</td>';

			// 	if($rs[2] == 1)
			// 		echo '<td>A5-611</td>';
			// 	else if($rs[2] == 2)
			// 		echo '<td>A5-705B</td>';
			// 	else if($rs[2] == 3)
			// 		echo '<td>A5-804</td>';
			// 	else if($rs[2] == 4)
			// 		echo '<td>A5-811</td>';
			// 	//echo '<td>'.$rs[2].'</td>';
			// 	echo '<td>'.$rs[3].'</td>';
			// 	echo '<td>';
			// 	echo '<form method="POST" name="LoginForm">';
			// 	// if($rs[3] == $_SESSION['account']){
			// 	// 	echo '<input type="submit" name="remove" value="刪除">';
			// 	// 	echo '<input type="hidden" name="id" value='.$rs[4].'>';	
			// 	// }
			// 	echo'</form>';
			// 	echo '</td>';
			// 	echo '</tr>';
				
			// }
			
		// }
		// else{
		// 	echo 'You have not login !';
		// 	echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';	
		// }			
	?>

		</center></br>

</div>
<script >
    function processFormData(row,cell) {
        var nameElement = document.getElementById("table1").rows[row].cells[cell].innerText;
        // const name = .table.rows[0].cells[0].innerHTML;
        // self.location = "commit.php?name=nameElement";
        // document.location.href("commit.php?name="+nameElement);
        wlocation.href="commit.php";
        // alert("你的姓名是 " + nameElement + "\n");
    }
</script>


