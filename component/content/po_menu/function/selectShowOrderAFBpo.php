<style>
    #box-show-po-item{
       border:1px solid red;
    }
</style>

<?php
$check_page_addData = $_SESSION['addData_id'];
$sql = "SELECT  order_id,order_detail,order_queantity,a.unit_id,unit_name,order_note
 FROM order_tbl as a
 INNER JOIN unit_tbl as b
 ON a.unit_id = b.unit_id
 WHERE po_id = $po_id";
$query = mysqli_query($conn, $sql);
$count_data = 1;
while ($row = mysqli_fetch_array($query)) {
    
    echo '<tr">';
    
    echo '<td >';
    echo $count_data;
    echo '</td>';
    echo '<td >';
    echo $row['order_detail'];
    echo '</td>';
    echo '<td >';
    echo $row['order_detail'];
    echo '</td>';
    echo '<td >';
    echo $row['order_queantity'];
    echo '</td>';
    echo '<td >';
    echo $row['unit_name'];
    echo '</td>';
    echo '<td>';
    echo '<input type="number" id="po_price_not_vat" style="width:80px"/>';
    echo '</td>';
    echo '<td >';
    echo $row['order_note'];
    echo '</td>';

   
    echo '</tr>';
    $count_data++;
}
$count_data = 1;
mysqli_close($conn);
