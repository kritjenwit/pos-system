<?php require_once('../views/header.php'); ?>

<?php 
    require_once '../config/config.php';
    require_once '../constant/index.php';

    $error = "";
    $success = "";

    if (isset($_POST['getvalue'])) {
        $pd_id = isset($_POST['product_id']) ? $_POST['product_id'] : "";

        $url = API_URL . "/api/getDataSales";
        $data = [
            'product_id' => $pd_id,
        ];
        $response = curl_post($url, $data);

        $dataGetSale = $response['dataProduct'][0];
        // print_r($dataGetSale); die
    }



    
    if (isset($_POST['send']))
    {
        // print_r($_POST); die;
        $pd_id = isset($_POST['product_id']) ? $_POST['product_id'] : "";
        $pd_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
        $pd_type = isset($_POST['product_type']) ? $_POST['product_type'] : "";
        $pd_brand = isset($_POST['product_brand']) ? $_POST['product_brand'] : "";
        $pd_price = isset($_POST['price']) ? $_POST['price'] : "";
        $pd_amount = isset($_POST['amount']) ? $_POST['amount'] : "";

        $result = (int)$pd_price * (int)$pd_amount;

        $url = API_URL . "/api/putAccount";
        $data = [
            'product_id' => $pd_id,
            'product_name' => $pd_name,
            'product_type' => $pd_type,
            'product_brand' => $pd_brand,
            'amount' => $pd_amount,
            'price' => $result,
        ];
        $response = curl_post($url, $data);
        if (!is_array($response)) {
            $error = '<script>
                alert("No Response from api not JSON");
                window.location.href = ' . BASE_URL . ' "account_sys.php";
            </script>';
        }

        if ($response['code'] == 200) {
            $success = 'Successfully';
            $dataPutAccount = $response['result'];
        } else {
            $error = 'Failed!';
        }
    }
    // print_r($_SESSION); die;
    // return $dataPutAccount;
    here:
?>
<body>
    <div class="container">
        <h1 class="my-3 text-center fs-1 fw-bold text-warning">Sale Products</h1>
        <div class="row">
            <form action="" method="post">
                <?php if($error != "") : ?>
                    <div class="alert alert-danger">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if($success != "") : ?>
                    <div class="alert alert-success">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-center">
                    <label for="product_id" class="form-label">Code:</label>
                    <div class="col-6 px-4 input-group">
                        <input class="form-control" type="number" name="product_id" value="<?php echo $dataGetSale['product_id'] ?>" id="idProduct" min="1" max="100000">
                        <button class="btn btn-warning" type="submit" name="getvalue">Search</button>
                    </div>
                </div>
            </form>
            <?php if (isset($_POST['getvalue'])) : ?>
            <form action="" method="post">
                <div class="mt-3 card p-5 mb-5" width="150px">
                    
                    <div class="d-flex justify-content-between">
                        <div class="col-4 px-4">
                            <input type="hidden" name="product_id" value="<?php echo $dataGetSale['product_id'] ?>">
                            <label for="product_name">Name:</label>
                            <input class="form-control" type="hidden" name="product_name" value="<?php echo $dataGetSale ? $dataGetSale['product_name'] : ""; ?>">
                            <input class="form-control" type="text" name="product_name" value="<?php echo $dataGetSale ? $dataGetSale['product_name'] : ""; ?>" disabled>
                            <label for="product_type">Type:</label>
                            <input class="form-control" type="hidden" name="product_type" value="<?php echo $dataGetSale['product_type'] ?>">
                            <input class="form-control" type="text" name="product_type" value="<?php echo $dataGetSale['product_type'] ?>" disabled>
                            <label for="product_brand">Brand</label>
                            <input class="form-control" type="hidden" name="product_brand" value="<?php echo $dataGetSale['product_brand'] ?>">
                            <input class="form-control" type="text" name="product_brand" value="<?php echo $dataGetSale['product_brand'] ?>" disabled>
                        </div>
                        <div class="col-4 px-4">
                            <label for="price">Price</label>
                            <input class="form-control" type="hidden" name="price" value=<?php echo $dataGetSale['product_price'] ?>> 
                            <input class="form-control" type="number" name="price" value=<?php echo $dataGetSale['product_price'] ?> disabled> 
                            <label for="amount">Amount</label>
                            <input class="form-control" type="number" name="amount" id="amount">
                        </div>
                    </div>
                    <!-- <button type="submit" class="mt-5 btn btn-success" name="send">Send</button> -->
                    <input class="mt-5 btn btn-success" type="submit" name="send" value="Send" id="send">
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- <script>
        let sendBtn = document.getElementById('send');
        let getValBtn = document.getElementById('getval');

        getValBtn.addEventListener('click', function(e) {
            sendBtn.style.display = 'block';
            getValBtn.style.display = 'none';
        });
    </script> -->

</body>
</html>