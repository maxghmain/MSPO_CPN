<?php
include 'php/connect_db.php';
$sql = "SELECT * FROM name_ms_tbl WHERE name_ms_normal_name = '$name_not_order_afb';";
$query = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($query)) {
    $name_ms_id = $row['name_ms_id'];
} else {
    $sql = "INSERT INTO name_ms_tbl(name_ms_normal_name,name_ms_real_name) VALUES
            ('$name_not_order_afb','$name_yes_order_afb');";
    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM name_ms_tbl WHERE name_ms_normal_name = '$name_not_order_afb';";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $name_ms_id = $row['name_ms_id'];
}
$sql = "SELECT unit_id,unit_name FROM unit_tbl WHERE unit_name = '$unit_order_afb';";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$unit_id = $row['unit_id'];

$sql4 = "INSERT INTO order_afb_tbl(name_ms_id,order_afb_value,unit_id,order_afb_note,state_id,form_afb_id) VALUES ($name_ms_id,'$value_order_afb',$unit_id,'$subject_order',3,$form_afb_id);";
mysqli_query($conn, $sql4);

mysqli_close($conn);

?>