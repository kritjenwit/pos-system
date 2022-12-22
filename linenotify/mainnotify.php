<?php
require_once "config.php";
$pd_id = 0;
$pd_name = "";
$amount = 0;
$price = 0;
$action = "";
$stockdata = "";

if (!isset($_POST)) {
	echo "ไม่มีการส่งค่ามา";
	die();
}
if (isset($_POST['action'])) {
	$action = $_POST['action'];
	switch ($action) {
		case 'sale':
			if (isset($_POST['pd_id'])) {
				$pd_id = $_POST['pd_id'];
			}
			if (isset($_POST['pd_name'])) {
				$pd_name = $_POST['pd_name'];
			}
			if (isset($_POST['amount'])) {
				$amount = $_POST['amount'];
			}
			if (isset($_POST['price'])) {
				$price = $_POST['price'];
			}
			$result = [
				'pdid' => $pd_id,
				'pd_name' => $pd_name,
				'amount' => $amount,
				'price' => $price
			];
			$sToken = "irdgUenG4p2fahnCW6Ft1e7O8cLbLWsWyrmVMp7FvX5";  // โทเค่นใส่อันนี้
			$sMessage = "มีการสั่งซื้อสินค้าID " . $result['pdid'] . "ชื่อสินค้า " . $result['pd_name'] . "จำนวน " . $result['amount'] . " หน่วย ยอดรวม " . $result['price'] . " บาท";  // แต่งข้อความตรงเน้

			linenotify($sToken, $sMessage);
			break;
		case 'stock':
			if (isset($_POST['stockdata'])) {
				$stockdata = json_decode( $_POST['stockdata'], true);
			}
			$nstock = [];
			$msg = "";
			foreach ($stockdata as $stock){
				if($stock['remain'] <= 10){
					$msg .= "Item id ".$stock['product_id']." ชื่อสินค้า ".$stock['product_name']." เหลือ " . $stock['remain'] . "ชิ้น \n";
				}
			

			}
			if($msg != ""){
				$sToken = "irdgUenG4p2fahnCW6Ft1e7O8cLbLWsWyrmVMp7FvX5";  // โทเค่นใส่อันนี้

			linenotify($sToken, $msg);
			}
	}
}
