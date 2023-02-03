<style>
    .titel_afb_row {
        border: 1px solid #006ebc;
        width: 100%;
        margin: 10px;
        border-radius: 10px;
        
    }

    .box_afb {
        width: 100%;
        display: flex;
       /* border: 1px solid red;*/
        height: auto;
    }

    .afb_info_box {
        display: flex;
        /*border: 1px solid red;*/
    }
</style>
<?php
include 'php/connect_db.php';
$sql = "SELECT
order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note,form_afb_id as form_afb_id_test,form_afb_number,form_afb_book_number,form_afb_write_date,form_afb_savesys_date,form_afb_people_name,form_afb_people_name_ok,form_afb_detail_work_for,state_id
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id  
INNER JOIN form_afb_tbl as e ON a.form_afb_id_test = e.form_afb_id_test
INNER JOIN state_tbl as f ON a.state_id = f.state_id
LIMIT 3";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['state_id'] == 1) {
            echo '<div class="box_afb">';
                echo '<div class="titel_afb_row">';
                    echo '<div style="font-size:20px;text-align:center;background: #006ebc;color:#fff; border-radius: 10px;">';
                        echo 'ใบขอซื้อ';
                    echo '</div>';
                    echo '<br>';
                    echo '<div class="afb_info_box">';
                        echo '<div style="width:100%;">';
                            echo 'เล่มที่ :' . $row['form_afb_number'];
                        echo '</div>';
                    echo '<div style="width:100%;">';
                        echo 'เลขที่ :' . $row['form_afb_book_number'];
                    echo '</div>';
                echo '</div>';
                    echo '<div class="afb_info_box">';
                        echo '<div style="width:100%;">';
                            echo 'วันที่เขียน :' . $row['form_afb_write_date'];
                        echo '</div>';
                        echo '<div style="width:100%;">';
                            echo 'วันที่เพิ่มลงระบบ :' . $row['form_afb_savesys_date'];
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="afb_info_box">';
                        echo '<div style="width:100%;">';
                            echo 'ผู้ขอซื้อ :' . $row['form_afb_people_name'];
                        echo '</div>';
                        echo '<div style="width:100%;">';
                            echo 'ผู้อนุมัติ :' . $row['form_afb_people_name_ok'];
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="afb_info_box">';
                    echo '<div style="width:100%;">';
                        echo 'ใช้งานกับ :' . $row['form_afb_detail_work_for'];
                    echo '</div>';
                   
                echo '</div>';
                    echo '<br>';
                echo '</div>';
               
            echo '</div>';
        
        }
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>