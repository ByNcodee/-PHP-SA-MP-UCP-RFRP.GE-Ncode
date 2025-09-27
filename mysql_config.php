<?php 
 
 function OpenCon()
 {
    $dbhost = "eu2.ultra-h.com";
    $dbuser = "server_13022";
    $dbpass = "2ybl1u6afi";
    $dbname = "server_13022_byncode";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
 }
 function CloseCon($conn)
 {
    $conn -> close();
 }


?>