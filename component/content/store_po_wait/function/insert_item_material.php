<?php
session_start();
include 'php/connect_db.php';

$sql = "SELECT * FROM material_tbl WHERE material_name = '$name_item_check_in'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if($name_item_check_in == $row['material_name']){
    
}else{
    $sql = "INSERT INTO material_tbl(material_name,unit_id,material_type_id,material_class_shelf_id)
    VALUES ('$name_item_check_in',$unit_name_check,1,1)";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>