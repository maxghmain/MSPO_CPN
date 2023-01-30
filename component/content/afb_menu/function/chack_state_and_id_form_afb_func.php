<?php
include 'php/connect_db.php';
$sql = "SELECT form_afb_id FROM form_afb_tbl WHERE state_id = 4 ;";
$query = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($query)) {
    $_SESSION['form_afb_id'] = $row['form_afb_id'];
}else{
    $sql = "INSERT INTO form_afb_tbl(state_id) VALUES (4);";
    mysqli_query($conn, $sql);
    $sql = "SELECT form_afb_id FROM form_afb_tbl WHERE state_id = 4 ;";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $_SESSION['form_afb_id'] = $row['form_afb_id'];
}
?>