<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Basic PHP PDO SQL SUM by month : devbanban.com 2021</title>
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
                                <th width="70%" class="text-center">ยอดขาย</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td>เดือน</td>
                                <td align="right">เชี้ยไรเนี่ย</td>
                            </tr>
                            <tr class="table-danger">
                                <td  class="text-center">Total</td>
                                <td align="right"></td>
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