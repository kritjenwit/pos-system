

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="px-3 py-4 bg-danger text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h2 class="fs-3 text-light">Shopee Clone</h2>
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="<?php echo BASES_URL?>" class="nav-link text-secondary">
                        Home
                    </a>
                </li>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){ ?>
                <li>
                    
                    <a href="" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="#" class="nav-link text-white">
                        Products
                    </a>
                </li>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){ ?>
                <li>
                    <a href="<?php echo BASE_URL."/sale_system/account_sys.php"?>" class="nav-link text-white">
                        ขายสินค้า
                    </a>
                </li>
                <?php } ?>
            </ul>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="px-3 py-2 border-bottom mb-3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div>
                            <i class="bi bi-shop px-5 fs-4"> Shop</i>
                        </div>
                        <form class="col-10 col-lg-auto mb-2 mb-lg-0 me-lg-auto w-50">
                            <div class="d-flex justify-content-center align-items-center border rounded">
                                <input type="search" class="form-control border-0 outline-0" placeholder="Search..." aria-label="Search">
                                <button class="btn btn-info" id="searchBtn">Search</button>
                            </div>
                        </form>
            
                        <div class="col-2 text-end">
                    <?php if(!isset($_SESSION['is_login'])){ ?>
                        <a href="<?php echo BASE_URL."/systemlg/login.php"?>"><button type="button" class="btn btn-light text-dark me-2">Sign In</button></a>
                        <a href="<?php echo BASE_URL."/systemlg/register.php"?>"><button type="button" class="btn btn-primary">Sign Up</button></a>
                        <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php require_once 'footer.php'; ?>
</body>
</html>