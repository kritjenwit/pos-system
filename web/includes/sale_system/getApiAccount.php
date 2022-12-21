<?php

    require_once '../config/config.php';

    if (count($_POST) > 0)
    {
        $pd_name = isset($_POST['pd_name']) ? $_POST['pd_name'] : "";
        $pd_type = isset($_POST['pd_type']) ? $_POST['pd_type'] : "";
        $pd_brand = isset($_POST['pd_brand']) ? $_POST['pd_brand'] : "";
        $pd_price = isset($_POST['pd_price']) ? $_POST['pd_price'] : "";
        $pd_time = isset($_POST['pd_time']) ? $_POST['pd_time'] : "";

        if ($pd_id == "" ||
            $pd_names == "" ||
            $pd_types == "" ||
            $pd_prices == "" ||
            $pd_times == "")
        {
            $_SESSION['error'] = "Products is not empty.";
            goto here;
        } else {
            $url = API_URL . "/putAccount";
            $data = [
                'user_id' => $_SESSION['user_id'],
                'pd_name' => $pd_name,
                'pd_type' => $pd_type,
                'pd_brand' => $pd_brand,
                'pd_price' => $pd_price,
                'pd_time' => $pd_time
            ];
            $response = curl_get($url);

            if (!is_array($response)) {
                $_SESSION['error'] = "No Response from api not JSON";
            }

            if ($response == 200) {
                $_SESSION['success'] = "Success";
                $dataAccount = $response['data'] ?? [];
            } else {
                $_SESSION['error'] = "Not found";
            }
        }
        here:
    }


?>