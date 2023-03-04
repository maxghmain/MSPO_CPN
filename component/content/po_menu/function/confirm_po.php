<?php
session_start();
include 'php/connect_db.php';

$sql = "UPDATE po_tbl SET state_id = 13 WHERE po_id = $po_id_select";
mysqli_query($conn, $sql);

$sql = "UPDATE po_logs_tbl SET state_id = 13,user_id = $user_id WHERE po_id = $po_id_select";
mysqli_query($conn, $sql);

$sql = "UPDATE order_tbl SET state_id = 14 WHERE po_id = $po_id_select";
mysqli_query($conn, $sql);


mysqli_close($conn);

?>