<?php 

//allow guests prevent anythig
if(isset($_SESSION["user"])){
    header("location:../MainPages/index.php");
    die();
}
