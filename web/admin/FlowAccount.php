<?php
require_once "../includes/config/config.php";
require_once "../includes/constant/index.php";
$url = API_URL . "/api/user";
$response = curl_get($url);

function json_response($data)
{
    header("Content-Type: application/json; charset=UTF-8 ");
    return json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
}
$btn = "";
if (count($_POST) > 0) {
    if (isset($_POST['btn'])) {
        $btn = $_POST['btn'];
    }
    $url = API_URL . "/api/updateflow";
    $data = [
        'id' => $btn
    ];
    $response1 = curl_post($url, $data);
    if ($response1['code'] == 200) {
        header("location: FlowAccount.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowAccount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once "../includes/views/header.php"; ?>

    <div class="container mt-3">
        <div class="card border-info">
            <div class="card-header bg-secondary">
                <a class="btn btn-primary" href="CreateFlowAccount.php" role="button">เพิ่มข้อมูล</a>
            </div>
            <div class="card-body bg-secondary">
                <table class="table table-dark table-hover border-secondary mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">
                                <div class="form-check float-end">
                                </div>
                            </th>
                            <th scope="col">วันที่</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">ชื่อผู้จำหน่าย</th>
                            <th scope="col">หมวดหมู่</th>
                            <th scope="col">ยอดรวมสุทธิ</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($response); ++$i) { ?>
                            <tr class="text-center">
                                <th scope="row">
                                    <div class="form-check">
                                        <form action="" method="post">
                                            <?php if ($response[$i]['status'] == "รอดำเนินการ") { ?>
                                                <button name="btn" class="btn btn-warning" value="<?php echo $response[$i]['id'] ?>">ชำระ</button>
                                            <?php } else { ?>
                                                <p class="text-success">เสร็จสิ้น</p>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </th>
                                <th><?php echo substr($response[$i]['date_time'], 0, 10) ?></th>
                                <td><?php echo $response[$i]['description'] ?></td>
                                <td><?php echo $response[$i]['seller'] ?></td>
                                <td><?php echo $response[$i]['type'] ?></td>
                                <td><?php echo $response[$i]['summary'] ?></td>
                                <?php if ($response[$i]['status'] == "ชำระแล้ว") { ?>
                                    <td class="text-success"><?php echo $response[$i]['status'] ?></td>
                                <?php } else { ?>
                                    <td class="text-danger">รอดำเนินการ</td>
                                <?php }  ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>