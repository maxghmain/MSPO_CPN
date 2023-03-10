
<?php
session_start();
include 'php/connect_db.php';

date_default_timezone_set('Asia/Kolkata');      
$date=date("Y/m/d h:i:sa");
$sql = "UPDATE order_tbl SET order_queantity = order_queantity-$input_value_check_in,state_id = 15  WHERE order_id = $order_id_input";
mysqli_query($conn, $sql);

$sql = "UPDATE po_tbl SET state_id = 15 WHERE po_id = $check_in";
mysqli_query($conn, $sql);

$sql = "UPDATE po_logs_tbl SET state_id = 15 WHERE po_id = $check_in";
mysqli_query($conn, $sql);

$sql = "UPDATE material_tbl 
    SET material_value = material_value+$input_value_check_in,material_type_id=$type_material,material_class_shelf_id=$class_shelf
    WHERE material_name = '$name_item_check_in'";
mysqli_query($conn, $sql);



mysqli_close($conn);
?>