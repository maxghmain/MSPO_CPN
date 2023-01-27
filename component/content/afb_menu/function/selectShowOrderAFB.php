<?php
$sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE a.form_afb_id = '$_SESSION[form_afb_id]' ";
$query = mysqli_query($conn, $sql);
$count_data = 1;
while ($row = mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td style="word-wrap: break-word;">';
    echo $count_data;
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo $row['name_ms_normal_name'];
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<p>' . $row['name_ms_real_name'] . '</p>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<p>' . $row['order_afb_value'] . '</p>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<p>' . $row['unit_name'] . '</p>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<p>'. $row['order_afb_note'] . '</p>';
    echo '</td>';
    echo '<td style="word-wrap: break-word;">';
    echo '<button id="edit_butt" onclick="showpopup()">แก้ไข</button> <br /> <button id="delete_butt">ลบ</button>';
   /* echo '<button id="edit_butt" value="'.$row['name_ms_real_name'].'">แก้ไข</button> <br /> <button id="delete_butt"  value="'.$row['name_ms_real_name'].'">ลบ</button>';*/
    echo '</td>';
    echo '</tr>';
    $count_data++;
}
$count_data = 0;
?>
<script type="text/javascript" src="js/custom/edit_delete_butt_get_value.js"></script>