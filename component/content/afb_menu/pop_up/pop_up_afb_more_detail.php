<?php
include 'php/connect_db.php';
?>
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<style>
    #showDetails_afb {
        /*display: none;*/
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        backdrop-filter: blur(2px);
    }

    #showDetails_afb_box {
        width: 99.9%;
        height: 99%;
        border: 1px solid red;
        display: flex;
        justify-content: center;


    }

    #box-detail-1 {
        margin-top: 100px;
        width: 30%;
        height: 500px;
        /*border: 1px solid red;*/
    }

    #header-detail {
        text-align: center;
        background: #006ebc;
        font-size: 24px;
        color: white;
    }

    #container-close {
        text-align: right;
        border: 1px solid red;
    }

    #close-header {
        width: 50px;
        text-decoration: none;
        color: #006ebc;
        background: white;
    }

    #box_butt_close {
        display: flex;
        justify-content: right;
        background-color: #006EBC;
        padding-top: 10px;
    }

    #box_butt_close a {
        margin-right: 10px;
        border-radius: 40px;
        border: none;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        color: #006EBC;
        background-color: white;
        font-weight: bold;
        transition-duration: 0.2s;
    }

    #box_butt_close a:hover {
        cursor: pointer;
        background: #014474;
        color: white;
    }
    #info-detail{
        border: 1px solid #006ebc;
        width: 99.6%;
        background: white;
    }
    #number-detail{
        display: flex;
    }
    #number-detail-1{
        width: 100%;
    }
</style>

<div class="background_popup" id="showDetails_afb" style="display: none;">
    <div id="showDetails_afb_box">
        <div id="box-detail-1">
            <div id="box_butt_close">
                <div id="close_edit_order_afb_butt">
                    <a href="mspo_display.php?menu=item_wait_for_use&page=<?php echo $_SESSION['page'] ?>">X</a>
                </div>
            </div>
            <div id="header-detail">

                <div id="text-header">รายระเอียดรายการขอซื้อ</div>
                <br>
            </div>
            <?php
            $item_Number = $_GET['item_Number'];
            $sql = "SELECT order_afb_id,order_afb_value,a.name_ms_id,name_ms_normal_name,name_ms_real_name,a.unit_id,unit_name,order_afb_note,a.form_afb_id,form_afb_number,form_afb_book_number,form_afb_write_date,form_afb_savesys_date,form_afb_people_name,form_afb_people_name_ok,form_afb_detail_work_for,d.group_id,group_name
            FROM order_afb_tbl as a 
            INNER JOIN name_ms_tbl as b
            ON a.name_ms_id = b.name_ms_id
            INNER JOIN unit_tbl as c
            ON c.unit_id = a.unit_id
            INNER JOIN form_afb_tbl as d
            ON d.form_afb_id = a.form_afb_id
            INNER JOIN group_tbl as g
            ON g.group_id = d.group_id
            WHERE order_afb_id = $item_Number";
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                die('Error: ' . mysqli_error($conn));
            }
            $count_data = 1;
            while ($row = mysqli_fetch_array($query)) {
                
                echo '<div id="info-detail">';
                echo '<br>';
                echo '<div style="margin:5px">';
                echo '<div id="number-detail">';
                echo '<div id="number-detail-1">';
                echo 'เลขที่ :'.' '.$row['form_afb_number'];
                echo '</div>';
                echo '<div id="number-detail-1">';
                echo 'เล่มที่ :'.' '.$row['form_afb_book_number'];
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div id="number-detail">';
                echo '<div id="number-detail-1">';
                echo 'วันที่เขียน :'.' '.$row['form_afb_write_date'];
                echo '</div>';
                echo '<div id="number-detail-1">';
                echo 'วันที่เพิ่มสู่ระบบ :'.' '.$row['form_afb_savesys_date'];
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div id="number-detail">';
                echo '<div id="number-detail-1">';
                echo 'ผู้ขอซื้อ :'.' '.$row['form_afb_people_name'];
                echo '</div>';
                echo '<div id="number-detail-1">';
                echo 'ผู้อนุมัติ :'.' '.$row['form_afb_people_name_ok'];
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div id="number-detail">';
                echo '<div id="number-detail-1">';
                echo 'ใช้งานกับ :'.' '.$row['form_afb_detail_work_for'];
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div id="number-detail">';
                echo '<div id="number-detail-1">';
                echo 'ฝ่าย :'.' '.$row['group_name'];
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '</div>';
                echo '<div style="display:flex;">';
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
                echo '</div>';
                echo '<br>';
                echo '</div>';
                $count_data ++;
            }
            ?>
        </div>

    </div>
</div>

<?php
mysqli_close($conn)
?>