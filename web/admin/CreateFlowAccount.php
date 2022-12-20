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
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">บันทึก</button>
                <button class="btn btn-light" onclick="window.print()"><img src="https://cdn-icons-png.flaticon.com/512/2891/2891455.png" style="width: 30px;" alt=""></button>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="mb">
                        <label for="input" class="form-label">ชื่อผู้จำหน่าย</label>
                        <input type="text" class="form-control" id="input" placeholder="Example input placeholder">
                    </div>
                    <div class="mb">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb">
                        <label for="input" class="form-label">วันที่</label>
                        <input type="text" class="form-control" id="input" placeholder="Example input placeholder">
                    </div>
                    <div class="mb">
                        <label for="input" class="form-label">ราคาสินค้า</label>
                        <input type="text" class="form-control" id="input" placeholder="Example input placeholder">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>