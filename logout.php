<?php 


include "mysql_config.php";
$conn = OpenCon();

session_start();
 

if(isset($_SESSION['web_user']) && $_SESSION["web_user"] == $_GET["logout"] )
{
 
    session_destroy();
 
    unset($_SESSION['web_user']);
    header("location: index.php");
        
}
 
?>