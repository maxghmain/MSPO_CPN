<?php
include 'php/connect_db.php';

$sql = "UPDATE po_tbl SET state_id = 16 WHERE po_id = $check_in";
mysqli_query($conn, $sql);

$sql = "UPDATE order_tbl SET state_id = 16 WHERE po_id = $check_in";
mysqli_query($conn, $sql);

$sql = "UPDATE po_logs_tbl SET state_id = 16 WHERE po_id = $check_in";
mysqli_query($conn,$sql);
?>