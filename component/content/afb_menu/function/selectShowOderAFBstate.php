<style>
    .box-afb {
        margin: 10px;
        display: block;
        border: 1px solid #006ebc;
        width: 425px;
        border-radius: 10px;
    }

    .text-box {
        /*border: 1px solid red;*/
        margin: 5px;
    }

    #bikho {
        text-align: center;
        background: #006ebc;
        color: white;
        font-size: 20px;
        font-weight: bold;
        border-radius: 10px;
        
    }

    #num_afb {
        /* border: 1px solid red;*/
        display: flex;
    }

    #num_afb-1 {
        width: 100%;
    }
    #kuy{
        border: 1px solid red;
        width: 425px;
    }
</style>
<div class="box-afb">
    <div class="text-box">
        <div class="ohio">
        <?php
        include 'php/connect_db.php';
        $form_afb_id = $_SESSION['form_afb_id'];
        $sql = "SELECT a.order_afb_id, b.name_ms_normal_name, b.name_ms_real_name, a.order_afb_value, c.unit_name, a.order_afb_note 
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id 
WHERE a.form_afb_id = '$form_afb_id'";
        $query = mysqli_query($conn, $sql);
        $count_data = 1;

        $sql = "SELECT * FROM form_afb_tbl";
        $result = $conn->query($sql);
        $count_data = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div id="bikho">';
                echo 'ใบขอซื้อ';
                echo '</div>';
                echo '<div id="num_afb">';
                echo '<div id="num_afb-1">';
                echo 'เล่มที่ :' . $row['form_afb_number'];
                echo '</div>';
                echo '<div id="num_afb-1">';
                echo 'เลขที่ :' . $row['form_afb_book_number'];
                echo '</div>';
                echo '</div>';
                echo '<div id="num_afb">';
                echo '<div id="num_afb-1">';
                echo 'วันที่เขียน :' . $row['form_afb_write_date'];
                echo '</div>';
                echo '<div id="num_afb-1">';
                echo 'วันที่เพิ่มลงระบบ :' . $row['form_afb_savesys_date'];
                echo '</div>';
                echo '</div>';
                echo '<div id="num_afb">';
                echo '<div id="num_afb-1">';
                echo 'ผู้ขอซื้อ :' . $row['form_afb_people_name'];
                echo '</div>';
                echo '<div id="num_afb-1">';
                echo 'ผู้อนุมัติ :' . $row['form_afb_people_name_ok'];
                echo '</div>';
                echo '</div>';
                echo '<div id="num_afb-1">';
                echo 'ใช้งานกับ :' . $row['form_afb_detail_work_for'];
                echo '</div>';
                
            }
            while ($row = mysqli_fetch_array($query)) {
                echo '<table >';
                echo '<thead>';
                echo '<tr>';
                echo '<td style="width:6%">';
                echo $count_data;
                echo '</td>';
                echo '<td style="width:20%">';
                echo $row['name_ms_normal_name'];
                echo '</td>';
                echo '<td style="width:20%"> ';
                echo $row['name_ms_real_name'];
                echo '</td>';
                echo '<td style="width:20%">';
                echo $row['order_afb_value'];
                echo $row['unit_name'];
                echo '</td>';
                echo '<td style="width:20%">';
                echo $row['order_afb_note'];
                echo '</td>';
                echo '<tr>';
                echo '</table>';


                $count_data++;
            }
        }
        // Close the database connection
        $conn->close();
        ?>
        </div>
    </div>
</div>