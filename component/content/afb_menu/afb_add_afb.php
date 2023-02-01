<div class="container_title">
    <h5>เพิ่มใบขอซื้อ - Add Ask For Buy</h5>
</div>
<div id="set-con">
    <div class="add-pc-oder">
        <div class="infomation-add-afb" style="display: flex;">
            <div style="width: 33%;">
                <p style="text-align:left;">เลขที่ : <input type="number" id="num_afb" value="<?php echo $_SESSION['num_afb']; ?>" placeholder="กรุณากรอก.." required></p>
            </div>
            <div style="width: 33%;">
                <p style="text-align:left;">เล่มที่ : <input type="number" id="num_book_afb" value="<?php echo $_SESSION['num_book_afb']; ?>" placeholder="กรุณากรอก.." required></p>
            </div>
            <div style="width: 33%;">
                <p style="text-align:left;">วันที่ : <input type="date" id="create_afb_date" value="<?php echo $_SESSION['create_afb_date']; ?>" required />
            </div>
        </div>
        <div>
            <p style="text-align:left;">ใช้งานกับ</p>
        </div>
        <div>
            <textarea id="work_for" placeholder="หมายเหตุ...." style="height:50px;width:100%;"><?php echo $_SESSION['work_for']; ?></textarea>
        </div>
        <br>
        <div id="button-div">
            <div style="width: 50%;">
                <?php
                $sql = "SELECT MAX(order_afb_id) as order_afb_id_max  FROM order_afb_tbl;";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $row_add = $row['order_afb_id_max'] + 1;
                echo '<a href="mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . '" id="add_butt" >เพิ่ม / ลบ / แก้ไข รายการวัสดุ</a>';
                ?>
            </div>

            <div style="width: 50%;text-align:right;">
                <a id="save-data" onclick="check_info_and_save()">ดำเนินการถัดไป
                </a>
            </div>
        </div>
    </div>

    <div style="display: flex;justify-content: center;height: 35%;margin-bottom:20px;">
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
                <tbody>
                <?php
                include 'function/selectShowOrderAFB.php';
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function check_info_and_save() {
        var num_afb = $("#num_afb").val();
        var num_book_afb = $("#num_book_afb").val();
        var create_afb_date = $("#create_afb_date").val();
        var work_for = $("#work_for").val();
        if (num_afb == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#name_not_order_afb").focus();
            return;
        }
        if (num_book_afb == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#value_order_afb").focus();
            return;
        }
        if (create_afb_date == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#unit_order_afb").focus();
        }
        if (work_for == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#subject_order").focus();
        }
        if (num_book_afb != "" && num_book_afb != "" && create_afb_date != "" && work_for != "") {
            $.ajax({
                type: "GET",
                url: "../../mspo_cpn/mspo_display.php?menu=state_afb=&form_afb_id=<?php echo $form_afb_id?>",
                data: {
                    num_afb: num_afb,
                    num_book_afb: num_book_afb,
                    create_afb_date: create_afb_date,
                    create_afb_date: create_afb_date,
                    work_for: work_for,
                }
            });
            window.location = '../../mspo_cpn/mspo_display.php?menu=state_afb&form_afb_id=<?php echo $form_afb_id?>';
        }
    }

    function loading_hide() {
        $("#bg_loading").hide();
    }
    function hide_pop_wrong_alert() {
        $("#bg_pop_alert").hide();
    }

    function hide_pop_succ_alert() {
        $("#bg_pop_alert_succ").hide();
    }
</script>