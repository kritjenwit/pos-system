<?php
require_once "../includes/config/config.php";
require_once "../includes/constant/index.php";

$product_id = "";
$product_name = "";
$type = "";
if (count($_POST) > 0) {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        //echo $product_id;
    }
    if (isset($_POST['product_name'])) {
        $product_name = $_POST['product_name'];
        //echo $product_name;
    }
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
        //echo $type;
    }
    if ($product_id == "" || $product_name == "" || $type == "") {
        //echo "empty.";
        goto here;
    }
    $url = "http://localhost:3000/api/insertstock";
    $data = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'type' => $type
    ];
    $response = curl_post($url,$data);
    //print_r($response);
    if($response['code'] == '200'){
        echo '
        <script>
        alert("Create is Success.");
        window.location.href="stock.php";
        </script>';
    }
}
here:
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
<?php require_once "../includes/views/header.php"; ?>

    <div class="container mt-3">
        
        <div class="card">
            <form action="" method="post">
                <div class="card-header">
                    <button class="btn btn-primary">บันทึก</button>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="mb">
                            <label for="input" class="form-label">รหัสสินค้า</label>
                            <input type="text" class="form-control" name="product_id" id="input" placeholder="Example input placeholder" required>
                        </div>
                        <div class="mb">
                            <label for="input" class="form-label">ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="product_name" id="input" placeholder="Example input placeholder" required>
                        </div>
                        <div class="mb">
                            <label for="input" class="form-label">ประเภทสินค้า</label>
                            <input type="text" class="form-control" name="type" id="input" placeholder="Example input placeholder" required>
                        </div>
                    </form>
                </div>
            </form>
            <a class="btn btn-secondary float-end" href="Stock.php" role="button">ย้อนกลับ</a>
        </div>
    </div>
</body>

</html>