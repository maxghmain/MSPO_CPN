<?php
$sql = "SELECT po_id,type_po_id FROM po_tbl WHERE state_id = 8 AND type_po_id = 1";
$query = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($query)) {
    $_SESSION['po_id'] = $row['po_id'];
}else{
    $sql = "INSERT INTO po_tbl(state_id,type_po_id) VALUES (8,1);";
    mysqli_query($conn, $sql);
    $sql = "SELECT po_id FROM po_tbl WHERE state_id = 8 AND type_po_id = 1 ;";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $_SESSION['po_id'] = $row['po_id'];
}

?>