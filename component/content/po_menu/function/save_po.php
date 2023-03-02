<?php
session_start();
include 'php/connect_db.php';
$po_number = $_SESSION['po_number'];

    $sql = "UPDATE po_tbl SET po_num = $po_number,po_price_not_vat = $totalPriceSum,po_price_vat=$vat,po_price_sum_vat=$price_vat,state_id= 11 WHERE po_id = $po_id ";
    mysqli_query($conn, $sql);

    $sql = "UPDATE order_tbl SET state_id = 12 WHERE po_id = $po_id ";
    mysqli_query($conn, $sql);

    
mysqli_close($conn);
?>