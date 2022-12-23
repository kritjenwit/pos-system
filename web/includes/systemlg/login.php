<?php

require_once '../config/config.php';
require_once '../constant/index.php';
if(isset($_POST['send'])) {

    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if (empty($username || $password)) 
    {
        $_SESSION['error'] = "Invalid empty.";
        goto here;
        
    }
    
    $url = API_URL . "/api/loginUser";
    $data = [
        'username' => $username,
        'password' => $password,
    ];
    $response = curl_post($url, $data);
    // print_r($response); die;

    if (!is_array($response)) {
        $_SESSION['error'] = "No Response from api not JSON";
        goto here;
    } else {
        if ($response['code'] == 200) {
            $_SESSION['success'] = $response['message'];
            $_SESSION['is_login'] = 'yes';
            $_SESSION['role'] =  $response['result'][0]['role'];
            header("Location: ".BASES_URL."");
        } else {
            $_SESSION['error'] = $response['message'];
        }
    }
    
}
here:
// print_r(is_login()); die;

?>

<?php require_once '../views/header.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mt-5 me-lg-auto">
                <img class="rounded" width="100%" src="https://media.istockphoto.com/id/1321139457/photo/cartoon-character-hand-holds-smart-phone.jpg?b=1&s=170667a&w=0&k=20&c=J1x-ZxYFr3PqXFpMA7dRAKwOZMCuer0J3QPkYKs3oIU=" alt="">
            </div>
            <div class="col-lg-7">
                <form action="" method="post">
                    <div class="mt-5">
                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if(isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php } ?>
    
                        <h1 class="fs-1 fw-bold text-success" >Log In</h1>
                        <div class="p-4">
                            <label for="Username">Username</label>
                            <input class="form-control" type="text" name="username" id="user">
                            <label for="Password">Password</label>
                            <input class="form-control" type="password" name="password" id="pass">
    
                            <input class="btn btn-success fw-bold text-light mt-5 form-control" type="submit" name="send" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../views/footer.php'; ?>

</body>

