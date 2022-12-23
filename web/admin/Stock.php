<?php
require_once "../includes/config/config.php";

$url = "http://localhost:3000/api/showstock";
$response = curl_get($url);

$url2 = "http://localhost/linenotify/mainnotify.php";

$data2 = [
    'action' => 'stock',
    'stockdata' => json_encode($response[0])
];
$response2 = json_post($url2, $data2);
// echo "<pre>";
// print_r($response2);

//var_dump($response2);
//json_response($url2);


function json_post($url, $data)
{
// print_r($data);
// die();
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // $apiResponse - available data from the API request
    $jsonArrayResponse = json_decode($apiResponse, true);
    return $jsonArrayResponse;
}


// echo "<pre>";
// print_r($response[0]);
$product_id = "";
$product_name = "";
$type = "";
if(count($_POST) > 0){
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
    }
    $url1 = "http://localhost:3000/api/insertstockwithid";
    $data1 = [
        "product_id" => $product_id
    ];
    $response1 = curl_post($url1, $data1);
    // print_r($response1);
    if($response1['code'] == '200'){
        header("location: Stock.php");
    }
}
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
        <a class="btn btn-primary" href="Insertstock.php" role="button">เพิ่มสต็อคใหม่</a>
        <table class="table table-dark table-hover text-center mt-3">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">ประเภทสินค้า</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($response[0]); $i++) { ?>
                    <tr>
                        <form action="" method="POST">
                            <th scope="col"><button class="btn btn-success" type="submit" name="product_id" value="<?php echo $response[0][$i]['product_id'] ?>">เพิ่ม stock</button></th>
                        <th><?php echo $i + 1 ?></th>
                        <td><?php echo $response[0][$i]['product_id'] ?></td>
                        <td><?php echo $response[0][$i]['product_name'] ?></td>
                        <td><?php echo $response[0][$i]['type'] ?></td>
                        </form>
                        <td><?php echo $response[0][$i]['remain'] ?></td>
                        <?php if ($response[0][$i]['remain'] == 0) { ?>
                            <td class="text-danger">สินค้าหมด</td>
                        <?php } else if ($response[0][$i]['remain'] < 5) { ?>
                            <td class="text-warning">สินค้าใกล้หมด</td>
                        <?php } else { ?>
                            <td class="text-success">มีสินค้า</td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require_once "../includes/views/footer.php"; ?>
</body>

</html>