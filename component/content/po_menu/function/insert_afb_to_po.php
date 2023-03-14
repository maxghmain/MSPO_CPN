<?php
session_start();
include 'php/connect_db.php';
$po_id = $_SESSION['po_id'];
$item_Number_select = $_SESSION['item_Number_select'];


    $sql ="INSERT INTO order_tbl (order_afb_id, order_detail, order_queantity, unit_id, order_note,po_id,state_id) 
    VALUES ('$item_Number_select', '$name_item', '$value_item', '$unit_item', '$note_item','$po_id',9)";
    mysqli_query($conn,$sql);

    $sql = "INSERT INTO po_afb_tbl(po_afb_num,po_afb_book_num,group_id,po_id)
    VALUES ('$form_afbnum','$form_afbbook','$group_id_item','$po_id')";
    mysqli_query($conn,$sql);

    $sql = "INSERT INTO po_people_afb_tbl(po_people_afb_name,po_id,group_id)
    VALUES ('$form_afb_pel','$po_id','$group_id_item')";
    mysqli_query($conn,$sql);

    $sql = "UPDATE order_afb_tbl SET state_id = 10 WHERE order_afb_id = $item_Number_select";
    mysqli_query($conn,$sql);


mysqli_close($conn);

?>