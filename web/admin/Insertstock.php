<?php
require_once "../includes/config/config.php";
require_once "../includes/constant/index.php";

$product_id = "";
$product_name = "";
$type = "";
$type1 = "";
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
    }
    if (isset($_POST['type'])) {
        $type1 = $_POST['type1'];
        //echo $type1;
    }
    if ($type1 == "") {
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
        $response = curl_post($url, $data);
        //print_r($response);
        if ($response['code'] == '200') {
            echo '
        <script>
        alert("Create is Success.");
        window.location.href="stock.php";
        </script>';
        }

        if ($response['code'] == '406') {
            echo '
            <script>
            alert("Please Check product id.");
            window.location.href="Insertstock.php";
            </script>';
        }
    } else {
        if ($product_id == "" || $product_name == "" || $type1 == "") {
            //echo "empty.";
            goto here;
        }
        $url = "http://localhost:3000/api/insertstock";
        $data = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'type' => $type1
        ];
        $response = curl_post($url, $data);
        //print_r($response);
        if ($response['code'] == '200') {
            echo '
        <script>
        alert("Create is Success.");
        window.location.href="stock.php";
        </script>';
        }

        if ($response['code'] == '406') {
            echo '
            <script>
            alert("Please Check product id.");
            window.location.href="Insertstock.php";
            </script>';
        }
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
            <div class="card-header">
                <a class="btn btn-secondary " href="Stock.php" role="button">ย้อนกลับ</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
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
                        <select class="form-select" aria-label="Default select example" id="type1" name="type1" onchange="showinput()">
                            <option selected>เสื้อผ้า</option>
                            <option value="กางเกง">กางเกง</option>
                            <option value="เสื้อเชิ๊ต">เสื้อเชิ๊ต</option>
                            <option value="เสื้อกีฬา">เสื้อกีฬา</option>
                            <option value="เสื้อแจ็คเก็ต">เสื้อแจ็คเก็ต</option>
                            <option value="เสื้อกล้าม">เสื้อกล้าม</option>
                            <option value="รองเท้า">รองเท้า</option>
                            <option value="ชุดลำลอง">ชุดลำลอง</option>
                            <option value="">อื่นๆ</option>
                        </select>
                        <br>
                        <input type="text" class="form-control" style="display: none;" name="type" id="input1" placeholder="Example input placeholder">
                    </div>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showinput() {
            var x = document.getElementById("type1").value;
            console.log(x);
            if (x == "") {
                //console.log("AUdi");
                // var a = document.getElementById("cars");
                // var aa = document.createElement("input");
                // aa.appendChild(aa);
                document.getElementById('input1').style.display = '';
                x = "";
            } else {
                document.getElementById('input1').style.display = 'none';
            }
        }
    </script>
</body>

</html>