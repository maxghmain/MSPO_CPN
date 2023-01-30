<?php
$check_page_addData = $_SESSION['addData_id'];
$sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE a.form_afb_id = '$_SESSION[form_afb_id]' ";
$query = mysqli_query($conn, $sql);
$count_data = 1;
while ($row = mysqli_fetch_array($query)) {
    echo '<tr">';
    echo '<td style="word-wrap: break-word; display:none;">';
    echo '<option id="id_ms' . $row['order_afb_id'] . '" value="' . $row['order_afb_id'] . '">' . $row['order_afb_id'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="number' . $row['order_afb_id'] . '" value="' . $count_data . '">' . $count_data . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="name_not' . $row['order_afb_id'] . '" value="' . $row['name_ms_normal_name'] . '">' . $row['name_ms_normal_name'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="name_yes' . $row['order_afb_id'] . '" value="' . $row['name_ms_real_name'] . '">' . $row['name_ms_real_name'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="value' . $row['order_afb_id'] . '" value="' . $row['order_afb_value'] . '">' . $row['order_afb_value'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="unit' . $row['order_afb_id'] . '" value="' . $row['unit_name'] . '">' . $row['unit_name'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<option id="note' . $row['order_afb_id'] . '" value="' . $row['order_afb_note'] . '">' . $row['order_afb_note'] . '</option>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    if ($check_page_addData != "") {
        echo '<a id="edit_butt" href="mspo_display.php?menu=afb_add_afb&addData_id=' . $check_page_addData . '&editData_id=' . $row['order_afb_id'] . '">แก้ไขรายการ</a><br />';
        echo '<a id="delete_butt" href="mspo_display.php?menu=afb_add_afb&addData_id=' . $check_page_addData . '&deleteData_id=' . $row['order_afb_id'] . '">ลบรายการ</a>';
    } else {
        echo '<a id="edit_butt" href="mspo_display.php?menu=afb_add_afb&editData_id=' . $row['order_afb_id'] . '">แก้ไขรายการ</a><br />';
        echo '<a id="delete_butt" href="mspo_display.php?menu=afb_add_afb&deleteData_id=' . $row['order_afb_id'] . '">ลบรายการ</a>';
    }
    echo '</td>';
    echo '</tr>';
    $count_data++;
}
$count_data = 1;
mysqli_close($conn);
?>