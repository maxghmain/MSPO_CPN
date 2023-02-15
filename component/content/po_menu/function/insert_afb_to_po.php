<?php
session_start();
include 'php/connect_db.php';
$po_id = $_SESSION['po_id'];
$sql = "UPDATE order_afb_tbl SET state_id = 10,order_afb_value = order_afb_value-$order_afb_value WHERE order_afb_id = $item_Number_select ";
mysqli_query($conn,$sql);

$sql = "INSERT INTO order_tbl(order_detail,order_queantity,unit_id,order_note,po_id,state_id) 
VALUES ('$name_ms_real_name',$order_afb_value,$unit_id,'$order_afb_note',$po_id,9)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO po_afb_tbl(po_afb_num,po_afb_book_num,group_id,po_id) 
VALUES ($form_afb_number,$form_afb_book_number,$group_id,$po_id)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO po_people_afb_tbl(po_people_afb_name,po_id,group_id) 
VALUES ('$form_afb_people_name',$po_id,$group_id)";
mysqli_query($conn, $sql);

$sql = "SELECT * FROM order_afb_tbl";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
while ($row['order_afb_value'] == 0){
    $sql="UPDATE order_afb_tbl SET state_id = 2";
    mysqli_query($conn,$sql);
}




?>