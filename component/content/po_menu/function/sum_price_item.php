<?php
session_start();
include 'php/connect_db.php';
if(isset($_GET['item_price'])){
    $item_price = $_GET['item_price'];

    $sql = "UPDATE order_tbl SET order_price = $item_price WHERE order_id = $item_id";
    mysqli_query($conn,$sql);

}
mysqli_close($conn);
?>