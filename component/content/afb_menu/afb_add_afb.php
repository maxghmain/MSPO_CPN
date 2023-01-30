<div class="container_title">
    <h5>เพิ่มใบขอซื้อ - Add Ask For Buy</h5>
</div>
<div id="set-con">
    <div class="add-pc-oder">
        <table>
            <tr>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">เลขที่ : <input type="number" id="num_afb" value = "<?php echo $_SESSION['num_afb'] ?>" placeholder="กรุณากรอก.." required></p>
                </td>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">เล่มที่ : <input type="number" id="num_book_afb" value = "<?php echo $_SESSION['num_book_afb'] ?>" placeholder="กรุณากรอก.." required></p>
                </td>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">วันที่ : <input type="date" id="create_afb_date" value = "<?php echo $_SESSION['create_afb_date'] ?>" required />
                </td>
            </tr>
            <tr>
                <td style="border:none;">
                    <p style="text-align:left;">ใช้งานกับ</p>
                </td>
            </tr>
        </table>
        <tr>
            <td style="border:none;">
                <textarea id="work_for"  placeholder="หมายเหตุ...." style="height:50px;width:100%;"><?php echo $_SESSION['work_for'] ?></textarea>
            </td>
        </tr>
        <?php
        $sql = "SELECT MAX(order_afb_id) as order_afb_id_max  FROM order_afb_tbl;";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $row_add = $row['order_afb_id_max'] + 1;
        echo '<a href="mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . '" id="add_butt" >เพิ่ม / ลบ / แก้ไข รายการวัสดุ</a>'
        ?>

    </div>
    <div id="table-show-detail">
        <table>
            <tr>
                <td style="width: 7%;">
                    <p>ลำดับ</p>
                </td>
                <td style="width: 20%;">
                    <p>ชื่อรายการไม่เป็นทางการ</p>
                </td>
                <td style="width: 20%;">
                    <p>ชื่อรายการเป็นทางการ</p>
                </td>
                <td style="width: 7%;">
                    <p>จำนวน</p>
                </td>
                <td style="width: 7%;">
                    <p>หน่วยนับ</p>
                </td>
                <td style="width: 7%;">
                    <p>หมายเหตุ</p>
                </td>
                <td style="width: 7%;">
                    <p><strong>แก้ไข/ลบ</strong></p>
                </td>
            </tr>
            <?php
            include 'function/selectShowOrderAFB.php';
            ?>
        </table>
        <table style="margin-top:20px;">
            <tr>
                <td style="text-align: right;border:none;">
                    <input type="button" id="save-data" value="บันทึกข้อมูล">
                </td>
            </tr>
        </table>
    </div>
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