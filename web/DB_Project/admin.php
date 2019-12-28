<?php
    include("mysql_connect.inc.php");
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
            echo '<th width="10%">ID</th>';
			echo '<th width="10%" >暱稱</th>';
			echo '<th width="10%">帳號</th>';
			echo '<th width="5%">密碼</th>';
            echo '<th width="5%">性別</th>';
            echo '<th width="5%"></th>';
			// echo '<td>刪除</td>';
            echo '</tr>';
            // $count = mysqli_query($conn,"SELECT * FROM db_hw");
			$result = "SELECT * FROM commenter ORDER BY COMTR_NUM DESC";
			// mysqli_close($conn);
			$output = $conn->query($result);
  			// $no_fields=mysqli_num_fields($result);
                $i = 1;
				if ($output ->num_rows > 0) {
					while($row = $output->fetch_assoc()) {
                        
                        $num = $row["COMTR_NUM"];
                        $name = $row["COMTR_NAME"];
						$account = $row["COMTR_ACCOUNT"];
						$password = $row["COMTR_PASSWD"];
						$sex = $row["COMTR_SEX"];

                        echo '<tr>';
                        echo '<td>'.$num.'</td>';
						echo '<td>'.$name.'</td>';
						echo '<td>'.$account.'</td>';
						echo '<td>'.$password.'</td>';
						echo '<td>'.$sex.'</td>';
                        echo '<td><a  class="example_f" href=delete.php?id='.$num.'>刪除</a></td>';
                        // echo '<td> <button  class="example_f" id="commit" onclick="processFormData('.$i.',0)">評論</button></td>';
                        echo '</tr>';
                        $i = $i + 1;
					}
				}
			echo '</table>';
			echo '</form>';
			echo '</div>';
				
	?>

		</center></br>

</div>



