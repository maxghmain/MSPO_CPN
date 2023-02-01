<?php
include 'php/connect_db.php';
?>
<div id="popup_background_order_afb_edit" style="display: none;">
    <div id="popup_edit_order_afb">
        <div id="box_butt_close">
            <div id="close_edit_order_afb_butt">
                <?php
                if ($_SESSION['addData_id'] != "") {
                    $pageAddata_Session = $_SESSION['addData_id'];
                ?>
                    <a href="mspo_display.php?menu=afb_add_afb&addData_id=<?php echo $pageAddata_Session ?>">X</a>
                <?php
                } else {
                ?>
                    <a href="mspo_display.php?menu=afb_add_afb" style="text-decoration: none;">X</a>
                <?php
                }
                ?>

            </div>
        </div>
        <div id="tilte_popup">
            แก้ไขรายการใบขอซื้อ</div>
        <br>
        <div id="box_content">
            <div id="block_area_title_inp">
                <div id="block_laout">
                    <label for="inp_edit_name_not">ชื่อรายการไม่เป็นทางการ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">ชื่อรายการเป็นทางการ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">จำนวน</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">หน่วยนับ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">หมายเหตุ</label>
                </div>
            </div>
            <div id="block_area_colon">
                <div id="block_laout">
                    <div>
                        <label>:</label>
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <label>:</label>
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <label>:</label>
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <label>:</label>
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <label>:</label>
                    </div>
                </div>
            </div>
            <?php
            $id_data = $_SESSION['editData_id'];
            $sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE a.order_afb_id = '$id_data' ";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query)
            ?>
            <div id="block_area_inp">
                <div id="block_laout">
                    <div>
                        <input type="text" value="<?php echo $row['name_ms_normal_name']; ?>" id="inp_name_not_edit">
                        <!-- <input type="text" value="<?php /* echo $row['name_ms_normal_name']; */ ?>" id="inp_name_not_edit"> -->
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <input type="text" value="<?php echo $row['name_ms_real_name']; ?>" id="inp_name_yes_edit">
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <input type="text" value="<?php echo $row['order_afb_value']; ?>" id="inp_value_edit">
                    </div>
                </div>
                <div id="block_laout">
                    <div>
                        <input type="text" value="<?php echo $row['unit_name']; ?>" id="inp_unit_edit">
                    </div>
                </div>
                <div id="block_laout">
                    <textarea id="subject_order_edit" name="subject" placeholder="หมายเหตุ...."><?php echo $row['order_afb_note']; ?></textarea>
                </div>
            </div>
        </div>
        <a id="butt_edit_submit" onclick="check_and_send_data_for_edit()">
        <div id="box_butt_enter">
            <div id="block_butt_enter">
                บันทึกข้อมูล
            </div>
        </div>
        </a>
    </div>
</div>

<?php
mysqli_close($conn)
?>
<script>
    function check_and_send_data_for_edit() {
        var name_not_order_afb = $("#inp_name_not_edit").val();
        var name_yes_order_afb = $("#inp_name_yes_edit").val();
        var value_order_afb = $("#inp_value_edit").val();
        var unit_order_afb = $("#inp_unit_edit").val();
        var subject_order = $("#subject_order_edit").val();
        if (name_not_order_afb == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#name_not_order_afb").focus();
            return;
        }
        if (value_order_afb == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#value_order_afb").focus();
            return;
        }
        if (unit_order_afb == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#unit_order_afb").focus();
        }
        if (subject_order == "") {
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#subject_order").focus();
        }
        if (name_not_order_afb != "" && value_order_afb != "" && unit_order_afb != "" && subject_order != "") {
            $.ajax({
                type: "GET",
                url: "../../mspo_cpn/mspo_display.php?menu=afb_add_afb&editData_id=<?php echo $id_data ?>&state_excecut=editData",
                data: {
                    name_not_order_afb: name_not_order_afb,
                    name_yes_order_afb: name_yes_order_afb,
                    value_order_afb: value_order_afb,
                    unit_order_afb: unit_order_afb,
                    subject_order: subject_order,
                }
            });
            window.location = '../../mspo_cpn/mspo_display.php?menu=afb_add_afb&editData_id=<?php echo $id_data ?>&state_excecut=editData';
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