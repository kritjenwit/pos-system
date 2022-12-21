<?php require_once '../includes/views/header.php'; ?>
<?php require_once '../includes/config/config.php'; ?>
<?php
$url = "http://localhost:3000/api/sale";
$data = [
    'user_id' => "2",
];
$response = curl_post($url, $data);
$sale = $response['data'];
$url = "http://localhost:3000/api/lsale";
$data = [
    'user_id' => "2",
];
$lresponse = curl_post($url, $data);
$lsale = $lresponse['data'];
$newlsale = [];
foreach ($lsale as $value) {
    $newlsale[$value['DATE']][] = $value;
}


?>

<body>
    <div class="container mt-3">
        <h2>ยอดขายรายเดือน</h2>
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <?php foreach ($sale as $row) { ?>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="pill" href="#<?php echo $row['DATE'] ?>"><?php echo $row['DATE'] ?></a>
                </li>
            <?php } ?>
        </ul>

        <!-- Tab panes -->

        <div class="tab-content">
            <?php foreach ($sale as $row) { ?>
                <div id="<?php echo $row['DATE'] ?>" class="container tab-pane"><br>
                    <h3><?php echo $row['DATE'] ?></h3>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>เดือน</th>
                                <th>จำนวน</th>
                                <th class="text-center">ยอดขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $nowm = [];
                            foreach ($newlsale as $rowm) {
                                $nowm[] = $newlsale[$row['DATE']];
                            } ?>
                            <?php foreach ($newlsale[$row['DATE']] as $value) : ?>

                                <tr>
                                    <td><?= $value['pdt'] . $value['pdb'] . $value['NAME']; ?></td>
                                    <td align="right"><?= $value['amount']; ?></td>
                                    <td align="right"><?= $value['price']; ?></td>
                                </tr>
                            <?php $total += $value['price'];
                        endforeach; ?>
                           
                            <tr class="table-danger">
                                <td class="text-center">Total</td>
                                <td align="right" colspan="2"><?= number_format($total, 2); ?></td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            <?php } ?>

        </div>

    </div>

</body>

</html>