<?php
include 'php/connect_db.php';
$id_data = $_SESSION['deleteData_id'];
$sql = "DELETE * FROM oder_afb_tbl WHERE order_afb_id = $id_data ";
mysqli_query($conn,$sql);
?>