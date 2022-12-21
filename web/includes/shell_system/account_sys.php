<?php require_once('../views/header.php'); ?>

<?php 
    require_once '../config/config.php';
    require_once '../constant/index.php';

    $error = "";
    $success = "";
    if (isset($_POST['send']))
    {
        // print_r($_POST); die;
        $pd_id = isset($_POST['product_id']) ? $_POST['product_id'] : "";
        $pd_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
        $pd_type = isset($_POST['product_type']) ? $_POST['product_type'] : "";
        $pd_brand = isset($_POST['product_brand']) ? $_POST['product_brand'] : "";
        $pd_price = isset($_POST['product_price']) ? $_POST['product_price'] : "";
        $pd_amount = isset($_POST['product_amount']) ? $_POST['product_amount'] : "";
        
        if ($pd_id == "" ||
            $pd_name == "" ||
            $pd_type == "" ||
            $pd_brand == "" ||
            $pd_price == "" ||
            $pd_amount == "")
        {
            $error = 'input is empty.';
            goto here;
        } else {

            $url = "http://localhost:3000/api/putAccount";
            $data = [
                'product_id' => $pd_id,
                'product_name' => $pd_name,
                'product_type' => $pd_type,
                'product_brand' => $pd_brand,
                'product_price' => $pd_price,
                'product_amount' => $pd_amount,
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
    }
    // print_r($_SESSION); die;
    // return $dataPutAccount;
    here:
?>
<body>
    <div class="container">
        <h1 class="my-3 text-center fs-1 fw-bold text-warning">Data Products</h1>
        <div class="row">
            <form action="" method="post">
                <?php if($error != "") : ?>
                    <div class="alert alert-danger">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if($success != "") : ?>
                    <div class="alert alert-success">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <div class="mt-3 card p-5 mb-5" width="150px">
                    <label for="product_id">Code:</label>
                    <input class="form-control" type="number" name="product_id" id="idProduct">
                    <label for="product_name">Name:</label>
                    <input class="form-control" type="text" name="product_name" id="nameProduct">
                    <label for="product_type">Type:</label>
                    <input class="form-control" type="text" name="product_type" id="type">
                    <label for="product_brand">Brand</label>
                    <input class="form-control" type="text" name="product_brand" id="pdBrand">
                    <div class="d-flex justify-content-between">
                        <div class="col-6 px-4">
                            <label for="price">Price</label>
                            <input class="form-control" type="number" name="product_price" id="price">
                        </div>
                        <div class="col-6 px-4">
                            <label for="amount">Amount</label>
                            <input class="form-control" type="number" name="product_amount" id="amount">
                        </div>
                    </div>
                    <input class="mt-5 btn btn-success" type="submit" name="send" value="Send">
                </div>
            </form>
        </div>
    </div>

</body>
</html>