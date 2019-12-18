<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        $dbname = "project";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpwd = "";
        // if(!@mysql_connect($dbhost, $dbuser, $dbpwd))
        //         die("aaa");
        // mysql_query("SET NAMES utf8");
        // if(!@mysql_select_db($dbname))
        //         die("�L�k�ϥθ�Ʈw");
        $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
        if ($conn->connect_error) {
                die("Connection failed: " . $con->connect_error);
            
        }
?>