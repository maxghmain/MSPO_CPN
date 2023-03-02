<?php
session_start();
include 'php/connect_db.php';
$item_id = $_SESSION['item_id'];
$order_id = $_POST['order_id'];
$item_price = $_POST['item_price'];
$sql = "UPDATE order_tbl SET order_price = $item_price,order_price_sum_all = order_queantity*$item_price WHERE order_id = $order_id";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>
