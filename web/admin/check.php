<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>doc</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <?php
                            //เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                      ?>
                      <br>
                    <h3> รายงานยอดขาย แยกเป็นรายเดือน</h3>
 
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="30%">เดือน</th>
                                <th width="30%">จำนวน</th>
                                <th width="70%" class="text-center">ยอดขาย</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php
                           $url= "http://localhost:3000/api/sale";
                           $data = [
                               'user_id' => "2",
                           ];
                           $response = curl_post($url, $data);
                           $sale = $response['data'];

                           $url= "http://localhost:3000/api/lsale";
                           $data = [
                               'user_id' => "2",
                           ];
                           $lresponse = curl_post($url, $data);
                           $lsale = $lresponse['data'];

                           $newlsale = [];
                           foreach($lsale as $value) {
                            $newlsale[$value['DATE']][] = $value;
                           }
                         
                        $total=0;
                           foreach($sale as $row)  {
                            $total += $row['total'];
                            ?>
                            <?php foreach ($newlsale[$row['DATE']] as $value) : ?>
                                <tr>        
                                <td><?= $value['pdt'].$value['pdb'].$value['NAME'];?></td>
                                <td><?= $value['amount'];?></td>
                                <td align="right"><?= $value['price'];?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><?= $row['DATE'];?></td>
                                <td><?= $row['amount'];?></td>
                                <td align="right"><?= number_format($row['total'],2);?></td>
                            </tr>
                            <?php } ?>
                            <tr class="table-danger">
                                <td  class="text-center">Total</td>
                                <td align="right" colspan="2"><?= number_format($total,2);?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <?php
function curl_post($url, $data) {

    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // $apiResponse - available data from the API request
    $jsonArrayResponse = json_decode($apiResponse, true);
    return $jsonArrayResponse;

}
?>
    </body>
</html>