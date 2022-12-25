<?php
require_once "../includes/config/config.php";
require_once "../includes/constant/index.php";
$url = API_URL . "/api/showstock";
$response = curl_get($url);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once "../includes/views/header.php"; ?>
    <div>
        <h1 class="text-center text-success">DashBoard</h1>
    </div>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-6">
                <canvas id="myChart" style="width:100%;max-width:800px text-center"></canvas>
            </div>
            <div class="col-6 mt-5">
                <table class="table table-secondary table-hover text-center mt-3">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($j = 0; $j < count($response[0]); $j++) { ?>
                            <tr>
                                <td><?php echo $response[0][$j]['product_id'] ?></label></td>
                                <td><?php echo $response[0][$j]['product_name'] ?></label></td>
                                <td><?php echo $response[0][$j]['remain'] ?></label></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script>
        var colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
            '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
            '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
            '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
            '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
            '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
            '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
            '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
            '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
            '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
        ];
        var cntdata = <?php echo count($response[0]); ?>;
        var xValues = [];
        var yValues = [];
        var barColors = [];
        <?php for ($i = 0; $i < count($response[0]); $i++) { ?>
            xValues.push("<?php echo $response[0][$i]['product_name'] ?>");
            yValues.push("<?php echo $response[0][$i]['remain'] ?>");
            barColors.push(colorArray[<?php echo $i ?>]);
        <?php } ?>
        new Chart("myChart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Stock DashBoard"
                }
            }
        });
    </script>
</body>

</html>