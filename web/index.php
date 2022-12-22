<?php 
require_once 'includes/config/config.php';
require_once 'includes/constant/index.php';

if (is_login() == false) {
    echo "<script>
        alert('login now!');
        header('Location: " . BASE_URL . "/systemlg/login.php');
    </script>";
    
}
// print_r(BASE_URL); die;


?>

<?php require_once './includes/views/header.php' ?>
<body>
    
    <h1>Hello world</h1>
    <a href="<?php echo BASE_URL ?>/logout.php">Logout</a>



    <?php require_once './includes/views/header.php' ?>
</body>