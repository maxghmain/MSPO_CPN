<?php
session_start();
include 'php/connect_db.php';
$sql = "UPDATE form_afb_tbl SET state_id = 6 WHERE form_afb_id = $form_afb_id ";
mysqli_query($conn,$sql);
$sql = "UPDATE order_afb_tbl SET state_id = 7 WHERE form_afb_id = $form_afb_id ";
mysqli_query($conn,$sql);
 echo "<script>alert('ยกเลิกใบขอซื้อเสร็จสิ้น');</script>";

?>