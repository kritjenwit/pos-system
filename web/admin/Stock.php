<?php
require_once '../includes/constant/index.php';
require_once BASE_PATH . '/includes/config/config.php';

$url = API_URL . "/api/showstock";
$response = curl_get($url);

$url2 = BASE_URL_LINE . "/linenotify/mainnotify.php";

$data1 = [
    'action' => 'stock',
    'stockdata' => json_encode($response)
];
$response2 = json_post($url2,$data1);


function json_post($url, $data)
{

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
    $url1 = API_URL . "/api/insertstockwithid";
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


<?php require_once "../includes/views/header.php"; ?>
<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-primary" href="Insertstock.php" role="button">เพิ่มสต็อคใหม่</a>
            </div>
            <div>
                <a clsss="btn btn-secondery" href="<?php echo BASE_URL ?>/dashboard.php" role="button">Back</a>
            </div>
        </div>
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