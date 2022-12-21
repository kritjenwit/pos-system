<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<?php

$stat = "";
if (count($_POST) > 0) {
  if (isset($_POST['tdata'])) {
    $tdata = $_POST['tdata'];
  }

  $url = "http://localhost:3000/api/stat";
  $data = [
    'tdata' => $tdata,
  ];
  $response = curl_post($url, $data);
  $stat = $response['data'];
  // echo "<pre>";
  // print_r($stat);
  // echo "</pre>";
  // die();
  $x = [];
  foreach ($stat as $xvalue){
    $x[] = $xvalue['TYPE'];
}
  $y = [];
  foreach ($stat as $yvalue){
    $y[] = $yvalue['total'];
}



}
function curl_post($url, $data)
{

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

<body>
  <?php if (count($_POST) > 0) : ?>


    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    <script>
      var xValues = JSON.parse('<?php echo json_encode($x, JSON_UNESCAPED_UNICODE) ?>');
      var yValues = JSON.parse('<?php echo json_encode($y) ?>');
      var barColors = "red";

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: "Stat"
          }
        }
      });
      console.log(xValues)
    </script>
  <?php endif; ?>
  <form action="" method="post">
    <label for="tdata">เลือกประเภทข้อมูล</label>
    <input list="tdata" name="tdata">
    <datalist id="tdata">
      <option value="ประเภทสินค้า">
      <option value="แบรนสินค้า">
    </datalist>
    <input type="submit">
  </form>


</body>

</html>