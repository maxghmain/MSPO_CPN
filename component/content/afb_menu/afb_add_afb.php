<div class="container_title">
    <h5>เพิ่มใบขอซื้อ - Add Ask For Buy</h5>
</div>
<div id="set-con">
    <div class="add-pc-oder">
        <div class="infomation-add-afb" style="display: flex;">
            <div style="width: 33%;">
                <p style="text-align:left;">เลขที่ : <input type="number" id="num_afb" value="<?php echo $_SESSION['num_afb'] ?>" placeholder="กรุณากรอก.." required></p>
            </div>
            <div style="width: 33%;">
                <p style="text-align:left;">เล่มที่ : <input type="number" id="num_book_afb" value="<?php echo $_SESSION['num_book_afb'] ?>" placeholder="กรุณากรอก.." required></p>
            </div>
            <div style="width: 33%;">
                <p style="text-align:left;">วันที่ : <input type="date" id="create_afb_date" value="<?php echo $_SESSION['create_afb_date'] ?>" required />
            </div>
        </div>
        <div>
            <p style="text-align:left;">ใช้งานกับ</p>
        </div>
        <div>
            <textarea id="work_for" placeholder="หมายเหตุ...." style="height:50px;width:100%;"><?php echo $_SESSION['work_for'] ?></textarea>
        </div>
        <br>
        <div id="button-div">
            <div style="width: 50%;">
            <?php
            $sql = "SELECT MAX(order_afb_id) as order_afb_id_max  FROM order_afb_tbl;";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $row_add = $row['order_afb_id_max'] + 1;
            echo '<a href="mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . '" id="add_butt" >เพิ่ม / ลบ / แก้ไข รายการวัสดุ</a>'
            ?>
            </div>
            
            <div style="width: 50%;text-align:right;">
             <a id="save-data">ดำเนินการถัดไป
        </a>
    </div>
        </div>


    </div>
   <div style="display: flex;justify-content: center;height: 23%;margin-bottom:20px;">
   <div id="table_data_show_display" style="border:1px solid black;">
        <table>
            <thead>
            <tr>
                <td style="width: 2%;">
                    <p>ลำดับ</p>
                </td>
                <td style="width: 10%;">
                    <p>ชื่อรายการไม่เป็นทางการ</p>
                </td>
                <td style="width: 8%;">
                    <p>ชื่อรายการเป็นทางการ</p>
                </td>
                <td style="width: 7%;">
                    <p>จำนวน</p>
                </td>
                <td style="width: 20%;">
                    <p>หมายเหตุ</p>
                </td>
                <td style="width: 7%;">
                    <p><strong>แก้ไข</strong></p>
                </td>
                <td style="width: 7%;">
                    <p><strong>ลบ</strong></p>
                </td>
            </tr>
            </thead>
            <?php
            include 'function/selectShowOrderAFB.php';
            ?>
        </table>
    </div></div>
    
    
</div>
<!--POPUPยืนยันการลบข้อมูลรายการใบขอซื้อ-->
<div class="popup_background" style="display:none;">
    <div class="popup_block">
        <div class="popup_title">
        </div class=>
        <div class="popup_box">
        </div class="">
    </div>
</div>