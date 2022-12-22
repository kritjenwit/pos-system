<?php
require_once "../includes/config/config.php";

$url = "http://localhost:3000/api/stock";
$response = curl_get($url);
// print_r($response);
// die();
$url1 = "http://localhost/linenot/mainnotify.php";
$data =  [
    'action' => "stock",
    // 'stockdata' => $response,
    'stockdata' => json_encode($response)
  ];
$response1 = json_post($url1,$data);
$response2 = $response1['data'];

// $url2 = "http://localhost/linenot/mainnotify.php";
// $data =  [
//     'stockdata' => $response,
//   ];
// $response2 = curl_post($url2,$data);

echo "<pre>";
print_r($response1);
echo "</pre>";


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
    <div class="container mt-3">
        <table class="table table-success table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                        </div>
                    </th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">ประเภทสินค้า</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($response); $i++) { ?>
                    <tr class="text-center">
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                </label>
                            </div>
                        </th>
                        <th><?php echo substr($response[$i]['date_time'],0,10)?></th>
                        <td>เสื้อผ้า</td>
                        <td>H&M</td>
                        <td>เสื้อผ้า</td>
                        <td><?php echo substr($response[$i]['remain'],0,10)?></td>
                        <td><?php echo substr($response[$i]['status'],0,10)?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<?php 


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
?>
</html>