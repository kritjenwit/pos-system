<?php

require_once '../config/config.php';
require_once '../constant/index.php';

if(isset($_POST['send'])) {
    // print_r($_POST); die;
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $comfirm_password = isset($_POST['comfirm_password']) ? $_POST['comfirm_password'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";

    if (empty($firstname) || empty($lastname) ||  empty($username) ||  empty($password) ||  empty($comfirm_password) || empty($address)) 
    {
        $_SESSION['error'] = "Invalid empty.";
        goto here;
        
    }
    
    if ($password != $comfirm_password) {
        $_SESSION['error'] = "Password and confirm password do not match.";
        goto here;
    } 
    
    $url = API_URL . "/api/registerUser";
    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'username' => $username,
        'password' => $password,
        'comfirm_password' => $comfirm_password,
        'phone' => $phone,
        'address' => $address,
    ];
    // print_r($data); die;
    $response = curl_post($url, $data);

    if (!is_array($response)) {
        $_SESSION['error'] = "No Response from api not JSON";
        goto here;
    } else {
        if ($response['code'] == 200) {
            $_SESSION['success'] = $response['message'];
            header('location: ' . BASE_URL . '/index.php');
        } else {
            $_SESSION['error'] = $response['message'];
        }
    }
    
}
here:

?>

<?php require_once '../views/header.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="d-lg-flex">
                <div class="col-lg-5">
                    <div class="mt-5 pe-3">
                        <img class="rounded w-100" width="550px" src="https://images.unsplash.com/photo-1529539795054-3c162aab037a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <h2 class="text-secondary font-monospace mt-3 text-sm-center text-lg-start">Welcome to Shopee Clone</h2>
                    </div>
                </div>
                <div class="col-lg-7 p-4">
                    <form action="" method="post">
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
    
                        <h1 class="mb-4 text-info fw-bold">Register</h1>
                        <div class="d-lg-flex">
                            <div class="col-lg-6 pe-2">
                                <label for="Username" class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="user">
                                <label for="Password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="pass">
                                <label for="comfirm_password" class="form-label">Comfrim Password</label>
                                <input class="form-control" type="password" name="comfirm_password" id="cpass">
                            </div>
                            <div class="col-lg-6">
                                <label for="Firstname" class="form-label">Firstname</label>
                                <input class="form-control" type="text" name="firstname" id="firstname">
                                <label for="Lastname" class="form-label">Lastname</label>
                                <input class="form-control" type="text" name="lastname" id="lastname">
                                <label for="Phone" class="form-label">Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                        </div>
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>

                        <input class="form-control btn btn-info mt-5 fw-bold text-light" type="submit" name="send" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once '../views/footer.php'; ?>
</body>

