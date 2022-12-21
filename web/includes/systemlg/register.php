<?php

require_once '../config/config.php';
require_once '../constant/index.php';

if(isset($_POST['send'])) {

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $comfrim_password = isset($_POST['comfrim_password']) ? $_POST['comfrim_password'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";


    if (
        $firstname == "" ||
        $lastname == "" || 
        $username == "" || 
        $password == "" || 
        $comfrim_password == "" ||
        $address == ""
        ) 
        {
        $_SESSION['error'] = "Invalid empty.";
        goto here;
        
    }
    
    if ($password != $comfrim_password) {
        $_SESSION['error'] = "Password and confirm password do not match.";
        goto here;
    } 
    
    $url = API_URL . "api/registerUser";
    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'username' => $username,
        'password' => $password,
        'comfrim_password' => $comfrim_password,
        'address' => $address,
    ];
    $response = curl_post($url, $data);

    if (!is_array($response)) {
        $_SESSION['error'] = "No Response from api not JSON";
        goto here;
    } else {
        if ($response['code'] == 200) {
            $_SESSION['success'] = $response['message'];
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
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
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

                    <h1>Register</h1>
                    <div class="card p-4">
                        <label for="Username">Username</label>
                        <input class="form-control" type="text" name="username" id="user">
                        <label for="Password">Password</label>
                        <input class="form-control" type="password" name="password" id="pass">
                        <label for="comfrim_password">Comfrim Password</label>
                        <input class="form-control" type="password" name="comfrim_password" id="cpass">
                        <label for="Firstname">Firstname</label>
                        <input class="form-control" type="text" name="firstname" id="firstname">
                        <label for="Lastname">Lastname</label>
                        <input class="form-control" type="text" name="lastname" id="lastname">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>

                        <input class="btn btn-info" type="submit" name="send" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../views/footer.php'; ?>
</body>

