<?php

    session_start(); 
    header('Content-Type: text/html; charset=utf-8');
    include("mysql_connect.inc.php");
    $id=$_POST['res_num'];
    $ID = $_SESSION['Account'];
    $type = $_POST['res_Type'];
    $star = $_POST['star'];
    $commit = $_POST['commit'];
    echo $ID.'____';
    echo $id.'___';
    echo $type.'___';
    echo $star.'___';
    echo $commit.'___';
?>