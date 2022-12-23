<?php
require_once "./includes/config/config.php";
require_once './includes/constant/index.php';


    session_destroy();
    // echo BASE_URL."/systemlg/login.php";
    echo "<script>
        alert('login now!');
        window.location.href = '".BASE_URL."/systemlg/login.php';
    </script>";
    // header("Location : ". BASE_URL."/systemlg/login.php");
    
?>