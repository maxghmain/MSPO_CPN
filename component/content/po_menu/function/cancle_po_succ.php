<?php
session_start();
include 'php/connect_db.php';

$sql = "UPDATE po_tbl SET state_id = 19 WHERE po_id = $po_id_select";
mysqli_query($conn,$sql);

$sql = "UPDATE po_logs_tbl SET state_id = 19 WHERE po_id = $po_id_select";
mysqli_query($conn,$sql);

$sql = "UPDATE order_tbl SET state_id = 19 WHERE po_id = $po_id_select";
mysqli_query($conn, $sql);
?>