<?php

    require_once '../config/config.php';

    if (count($_POST) > 0)
    {
        $pd_names = isset($_POST['pd_names']) ? $_POST['pd_names'] : "";
        $pd_types = isset($_POST['pd_types']) ? $_POST['pd_types'] : "";
        $pd_brand = isset($_POST['pd_brand']) ? $_POST['pd_brand'] : "";
        $pd_prices = isset($_POST['pd_prices']) ? $_POST['pd_prices'] : "";
        $pd_times = isset($_POST['pd_times']) ? $_POST['pd_times'] : "";

        if ($images == "" ||
            $pd_names == "" ||
            $pd_types == "" ||
            $pd_prices == "" ||
            $pd_times == "")
        {
            $_SESSION['error'] = "Products is not empty.";
            goto here;
        } else {
            $url = API_URL . "/apiAccount.js";
            $data = [
                'user_id' => $_SESSION['user_id'],
                'pd_names' => $pd_names,
                'pd_types' => $pd_types,
                'pd_brand' => $pd_brand,
                'pd_prices' => $pd_prices,
                'pd_times' => $pd_times
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