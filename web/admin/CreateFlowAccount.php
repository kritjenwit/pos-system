<?php
require_once '../includes/constant/index.php';
require_once "../includes/config/config.php";

$description = "";
$seller = "";
$type = "";
$summary = "";
$status = "";
if (count($_POST) > 0) {
    if ($_POST['description']) {
        $description = $_POST['description'];
    }
    if ($_POST['seller']) {
        $seller = $_POST['seller'];
    }
    if ($_POST['type']) {
        $type = $_POST['type'];
    }
    if ($_POST['summary']) {
        $summary = $_POST['summary'];
    }
    if ($description == "" || $seller == "" || $type == "" || $summary == "") {
        //echo "empty.";
        header("location: CreateFlowAccount.php");
        goto here;
    }
    $url = API_URL . "/api/createflow";
    $data = [
        'description' => $description,
        'seller' => $seller,
        'type' => $type,
        'summary' => $summary
    ];
    $response = curl_post($url, $data);
    if ($response['code'] == 200) {
        echo '
        <script>
        alert("Create is Success.");
        window.location.href="FlowAccount.php";
        </script>';
    }
    function json_response($data)
    {
        header("Content-Type: application/json; charset=UTF-8 ");
        return json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
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
            
                <div class="card-header text-white bg-warning">
                <a class="btn btn-secondary" href="<?php echo BASE_URL ?>/dashboard.php" role="button">Back</a>
                    
                </div>
                <div class="card-body">
                    <form class="row g-3" method="POST">
                        <div class="mb">
                            <label for="input" class="form-label">ชื่อผู้จำหน่าย</label>
                            <input type="text" class="form-control" name="seller" id="input" placeholder="Example input placeholder" required>
                        </div>
                        <div class="mb">
                            <label for="input" class="form-label">ประเภท</label>
                            <input type="text" class="form-control" name="type" id="input" placeholder="Example input placeholder" required>
                        </div>
                        <div class="mb">
                            <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                        <div class="mb">
                            <label for="input" class="form-label">ยอดค้างชำระ</label>
                            <input type="number" class="form-control" name="summary" id="input" placeholder="Example input placeholder" required>
                        </div>
                        <button class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            
        </div>
    </div>
</body>

</html>