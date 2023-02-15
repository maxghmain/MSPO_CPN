<?php
$check_page_addData = $_SESSION['addData_id'];
$sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE order_afb_id = $item_Number_select ";
$query = mysqli_query($conn, $sql);
$count_data = 1;
while ($row = mysqli_fetch_array($query)) {
    echo '<tr">';
    echo '<td >';
    echo $count_data;
    echo '</td>';
    echo '<td >';
    echo $row['name_ms_normal_name'];
    echo '</td>';
    echo '<td >';
    echo $row['name_ms_real_name'];
    echo '</td>';
    echo '<td >';
    echo $row['order_afb_value'];
    echo '</td>';
    echo '<td >';
    echo $row['unit_name'];
    echo '</td>';
    echo '<td>';
    echo '<input type="number" id="po_price_not_vat" style="width:80px"/>';
    echo '</td>';
    echo '<td >';
    echo $row['order_afb_note'];
    echo '</td>';

   
    echo '</tr>';
    $count_data++;
}
$count_data = 1;
mysqli_close($conn);
