<?php
$check_page_addData = $_SESSION['addData_id'];
$sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE a.form_afb_id = '$_SESSION[form_afb_id]' ";
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
    echo '<div style="display: block;">';
    echo '<div style="display: flex; justify-content:center;">';
    echo '<div id="value_num">';
    echo $row['order_afb_value'];
    echo '</div>';
    echo '<div id="center" style="width:5px;">';
    echo '&nbsp;';
    echo '</div>';
    echo '<div id="unit_name">';
    echo $row['unit_name'];
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</td>';
    echo '<td >';
    echo $row['order_afb_note'];
    echo '</td>';
    echo '<td >';
    if ($check_page_addData != "") {
        echo '<a id="edit_butt" href="mspo_display.php?menu=afb_add_afb&addData_id=' . $check_page_addData . '&editData_id=' . $row['order_afb_id'] . '">แก้ไขรายการ</a><br />';
    } else {
        echo '<a id="edit_butt" href="mspo_display.php?menu=afb_add_afb&editData_id=' . $row['order_afb_id'] . '">แก้ไขรายการ</a><br />';
    }
    echo '</td>';
    echo '<td >';
    if ($check_page_addData != "") {
        echo '<a id="delete_butt" href="mspo_display.php?menu=afb_add_afb&addData_id=' . $check_page_addData . '&deleteData_id=' . $row['order_afb_id'] . '">ลบรายการ</a>';
    } else {
        echo '<a id="delete_butt" href="mspo_display.php?menu=afb_add_afb&deleteData_id=' . $row['order_afb_id'] . '">ลบรายการ</a>';
    }
    echo '</td>';
    echo '</tr>';
    $count_data++;
}
$count_data = 1;
mysqli_close($conn);
