<?php require_once '../includes/config/config.php'; 
require_once "../includes/constant/index.php";?>
<?php

$stat = "";
if (count($_POST) > 0) {
  if (isset($_POST['tdata'])) {
    $tdata = $_POST['tdata'];
  }
  if($_POST['tdata'] == ""){
    echo '
        <script>
        alert("กรุณาเลือกประเภทข้อมูล");
        </script>';
        goto here;
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




?>
<?php require_once BASE_PATH . '/includes/views/header.php'; ?>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <?php if (count($_POST) > 0) : ?>

    <div class="container justify-content-center d-flex">
    <canvas id="myChart" style="width:100%; max-width:800px; border:1px soild red;"></canvas>
    </div>
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
  <?php here: ?>
  <form action="" method="post">
    <div class="container justify-content-center d-flex">
    <label for="tdata" class="form-label">เลือกประเภทข้อมูล</label>
    <input class="px-2" list="tdata" name="tdata">
    <datalist id="tdata">
      <option value="ประเภทสินค้า">
      <option value="แบรนสินค้า">
    </datalist>
    <input class="btn btn-info" type="submit">
  </div>
  </form>


</body>

</html>