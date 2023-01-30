<?php
include 'php/connect_db.php';
/* ชื่อแสดงหน้า POPUP */
$sql = "SELECT MAX(order_afb_id) as order_afb_id_max  FROM order_afb_tbl;";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$row_add = $row['order_afb_id_max'] + 1;
$addData_last_id = $row_add + 1;

$title_pop = "เพิ่มรายการใบขอซื้อ";
/* title input */
$title_input =
    [
        /*1*/
        'ชื่อไม่เป็นทางการ',
        /*2*/
        'ชื่อเป็นทางการ',
        /*3*/
        'จำนวน',
        /*4*/
        'หน่วยนับ',
        /*5*/
        'หมายเหตุ(หากมี)'
    ]

?>
<div class="background_popup" id="bg_pop">
    <div class="block_item" id="bl_item">
        <a href="mspo_display.php?menu=afb_add_afb">
            <div id="butt_close_pop">
                ย้อนกลับ / ยกเลิกการเพิ่มรายการ
            </div>
        </a>
        <div id="title_group">
            <div class="title_popup" id="title_pop">
                <p id="title1">
                    <?php echo $title_pop ?>
                </p>
            </div>
            <div class="title_popup" id="title_pop">
                <p id="titlecen">
                    &nbsp;
                </p>
            </div>
            <div class="title_popup" id="title_pop">
                <p id="title2">
                    รายการใบขอซื้อที่เพิ่มแล้ว
                </p>
            </div>
        </div>
        <div class="box_item_group" id="b_item_group">
            <div class="box_item" id="b_item1">
                <div id="item_form_group">
                    <div id="item_form">
                        <?php
                        $countData = 0;
                        while ($title_input[$countData] != "") {
                            echo '<div id="text">';
                            echo $title_input[$countData];
                            echo '</div>';
                            $countData++;
                        }
                        $countData = 0;
                        ?>
                    </div>
                    <div id="item_form">
                        <?php
                        $countData = 0;
                        while ($title_input[$countData] != "") {
                            echo '<div id="colon">';
                            echo ':';
                            echo '</div>';
                            $countData++;
                        }
                        $countData = 0;
                        ?>
                    </div>
                    <div id="item_form">
                        <div id="input_form">
                            <input type="text" value="<?php echo $_SESSION['name_not_order_afb'] ?>" id="name_not_order_afb">
                        </div>
                        <div id="input_form">
                            <input type="text" value="<?php echo $_SESSION['name_yes_order_afb'] ?>" id="name_yes_order_afb">
                        </div>
                        <div id="input_form">
                            <input type="number" value="<?php echo $_SESSION['value_order_afb'] ?>" id="value_order_afb">
                        </div>
                        <div id="input_form">
                            <select title="pleaseSelect" value="" id="unit_order_afb">
                                <option value="ก้อน">
                                    ก้อน
                                </option>
                                
                            </select>
                        </div>
                        <div id="input_form">
                            <textarea id="subject_order" cols="30" rows="3  "><?php echo $_SESSION['subject_order'] ?></textarea>
                        </div>
                        <div id="input_form">
                            <a id="add_order_afb_butt" onclick="reloads()">
                                <div id="butt_add_order">
                                    เพิ่มรายการ
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_center" id="b_itemcen">
                <p>
                    &nbsp;
                </p>
            </div>
            <div class="box_item2" id="b_item2">
                <div id="table_data_show">
                    <table>
                        <thead>
                            <th style="width: 4%;">
                                ลำดับ
                            </th>
                            <th style="width: 10%;">
                                ชื่อรายการ <br /> ไม่เป็นทางการ
                            </th>
                            <th style="width: 10%;">
                                ชื่อรายการ <br /> เป็นทางการ
                            </th>
                            <th style="width: 10%;">
                                จำนวน
                            </th>
                            <th style="width: 10%;">
                                หมายเหตุ
                            </th>
                            <th style="width: 8%;">
                                แก้ไข
                            </th>
                            <th style="width: 8%;">
                                ลบ
                            </th>
                        </thead>
                        <?php
                            include 'component/content/afb_menu/function/selectShowOrderAFB.php';
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function reloads() {
        var name_not_order_afb = $("#name_not_order_afb").val();
        var name_yes_order_afb = $("#name_yes_order_afb").val();
        var value_order_afb = $("#value_order_afb").val();
        var unit_order_afb = $("#unit_order_afb").val();
        var subject_order = $("#subject_order").val();
        if (name_not_order_afb == "") {
            $("#bg_pop_alert_succ").hide();
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#name_not_order_afb").focus();
            return;
        }
        if (value_order_afb == "") {
            $("#bg_pop_alert_succ").hide();
            $("#bg_pop_alert").show();
            setTimeout(hide_pop_wrong_alert, 3000);
            $("#value_order_afb").focus();
            return;
        }
        $.ajax({
            type: "GET",
            url: "component/content/afb_menu/function/add_order_afb_to_db_func.php",
            data: {
                name_not_order_afb: name_not_order_afb,
                name_yes_order_afb: name_yes_order_afb,
                value_order_afb: value_order_afb,
                unit_order_afb: unit_order_afb,
                subject_order: subject_order,
            } 
              
        });
        $("#bg_pop_alert").hide();
        $("#bg_pop_alert_succ").show();
        setTimeout(hide_pop_succ_alert,3000);
    }
    function hide_pop_wrong_alert() {
        $("#bg_pop_alert").hide();
    }

    function hide_pop_succ_alert() {
        $("#bg_pop_alert_succ").hide();
    }
</script>