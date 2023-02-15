<?php
session_start();
include 'php/connect_db.php';
$po_id = $_SESSION['po_id'];
$sql = "INSERT INTO order_tbl(order_detail,order_queantity,unit_id,po_id,state_id) 
VALUES ('$name_ms_real_name',$order_afb_value,$unit_id,$po_id,9)";
mysqli_query($conn, $sql);


?>