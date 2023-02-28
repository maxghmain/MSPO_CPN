<?php
session_start();
include 'php/connect_db.php';

$sql = "UPDATE po_tbl SET comp_contect_id = $select_comp WHERE po_id = $po_id";
mysqli_query($conn, $sql);

?>