<?php
session_start();
include 'php/connect_db.php';
$sql = "UPDATE form_afb_tbl SET state_id = 6 WHERE form_afb_id = $form_afb_id ";
$q=mysqli_query($conn,$sql);
if (!$q) {
    die('Error: ' . mysqli_error($conn));
}
?>