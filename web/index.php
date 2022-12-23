<?php 
require_once './includes/config/config.php';
require_once './includes/constant/index.php';


if (is_login() == false) {
    echo "<script>
        alert('login now!');
        window.location.href = '".BASE_URL."/systemlg/login.php';
    </script>";
    
}


?>

<?php require_once './includes/views/header.php' ?>
<body>
    
    <h1>Hello world</h1>
    <a href="<?php echo BASES_URL."/logout.php"?>">Logout</a>



    <?php require_once './includes/views/header.php' ?>
</body>

