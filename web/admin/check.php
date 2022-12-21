<?php require_once '../includes/views/header.php'; ?>
<?php require_once '../includes/config/config.php'; ?>
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
 
                    <table class="table table-hover table-responsive table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th >เดือน</th> 
                                <th >จำนวน</th>
                                <th  class="text-center">ยอดขาย</th>
                            </tr>
                            <!-- width="30%" -->
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
                                <td align="right"><?= $value['amount'];?></td>
                                <td align="right"><?= $value['price'];?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="table-success">
                                <td><?= $row['DATE'];?></td>
                                <td align="right"><?= $row['amount'];?></td>
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
    </body>
</html>