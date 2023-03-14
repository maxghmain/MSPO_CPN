<?php
include 'php/connect_db.php';
$sql = "DELETE FROM order_afb_tbl  WHERE order_afb_id = $id_data ";
mysqli_query($conn,$sql);
?>
<?php mysqli_close($conn); ?>