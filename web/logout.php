<?php

    require_once "./includes/config/config.php";
    require_once "./includes/constant/index.php";

    session_destroy();
    // print_r(session_destroy());
    header('Location: ' . BASE_URL . '/includes/systemlg/login.php');

?>