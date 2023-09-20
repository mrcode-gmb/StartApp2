<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:../create_login_account/index.php");
    }

?>