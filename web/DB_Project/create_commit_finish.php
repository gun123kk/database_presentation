<?php

    session_start(); 
    header('Content-Type: text/html; charset=utf-8');
    include("mysql_connect.inc.php");
    $id=$_POST['res_num'];
    $ID = $_SESSION['Account'];
    $type = $_POST['res_Type'];
    $star = $_POST['star'];
    $commit = $_POST['commit'];
    $time = $_POST['time'];
    // echo $time.'+';
    // echo $ID.'____';
    // echo $id.'___';
    // echo $type.'___';
    // echo $star.'___';
    // echo $commit.'___';

    function COMTR_NUM($account){
        include("mysql_connect.inc.php");
        $select = "select * from commenter where COMTR_ACCOUNT = '$account'";
        $o = $conn->query($select);
        $row = $o->fetch_assoc();
        return $row['COMTR_NUM'];
    }
    function avg_star($id){
        include("mysql_connect.inc.php");
        $select = "select RST_STAR From rst_table Where RST_NUM = '$id'";
        $o = $conn->query($select);
        $row = $o->fetch_assoc();
        return $row['RST_STAR'];
    }
    function COM_LINE($id){
        include("mysql_connect.inc.php");
        $select = "select count(COM_LINE) from comment_line where RST_NUM = '$id'";
        $o = $conn->query($select);
        $row = $o->fetch_assoc();
        // print_r($row);
        return $row['count(COM_LINE)'];
    }
    // echo avg_star($id);
    echo $id;
    echo '<br>';
    echo COM_LINE($id)+1;
    $line = COM_LINE($id)+1;
    echo '<br>';
    echo $time;
    echo '<br>';
    echo $star;
    echo '<br>';
    echo $commit;
    echo '<br>';
    echo COMTR_NUM($ID);
    $avgStar = number_format((avg_star($id) + $star)/2,1);
    $num = COMTR_NUM($ID);
    $data="select* from comment_line";
    $output = $conn->query($data);
    $row = $output->fetch_assoc();
    $sql = "INSERT INTO comment_line(RST_NUM,COM_LINE,COM_DATE_TIME,COM_STAR,COM_MSG,COMTR_NUM) VALUES('$id','$line','$time','$star','$commit','$num')";
    $conn->query($sql);
    $insert = "UPDATE rst_table SET RST_STAR = '$avgStar' WHERE RST_NUM = '$id'";
    $conn->query($insert);
    echo 'Success!';
    echo '<form method = "POST">';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    echo '</form>';
?>
