<?php
session_start();
include 'php/connect_db.php';
?>
<style>
    .textarea-pick {
        resize: none;
        height: 25px;
        width: 100%;
    }

    .value_item_pick {
        width: 100%;
    }

    .select_box {
        width: 90%;
    }
</style>

<script>
    $.confirm({
        boxWidth: '30%',
        useBootstrap: false,
        type: 'red',
        typeAnimated: true,
        title: 'เบิกออกวัสดุจากคลัง',
        theme: 'light',
        content: '' +
            '<form action="" class="formName">' +
            '<table>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'ชื่อวัสดุ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<?= $name_item_pick ?>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'จำนวนคงเหลือ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<?= $value_total ?>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'จำนวนเบิก ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<input type="number" placeholder="จำนวน" class="value_item_pick" id="value_item_pick" required />' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'ใช้งานกับ ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<textarea class="textarea-pick" id="textarea_pick"></textarea>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'ผู้ขอเบิก ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<input type="text" placeholder="ผู้ขอเบิก" class="value_item_pick" id="name_of_pel" required />' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td style="text-align:left;border:none;">' +
            'แผนก ' +
            '</td>' +
            '<td style="text-align:left;border:none;">' +
            '<select title="pleaseSelect" id="afb_group_id_pick" style="width:250px">' +
            '<option value="2">บัญชีและการเงิน (AC)</option>' +
            '<option value="3">ทรัพยากรณ์มนุษย์ (HRM)</option>' +
            '<option value="4">ข้อมูล (MIS)</option>' +
            ' <option value="5">การตลาด (MK)</option>' +
            ' <option value="6"> จัดซื้อทัั่วไป (PC) </option>' +
            '<option value="7">วิศวกรรม (EN)</option>' +
            '<option value="8">ส่งเสริมการบริการ (QM)</option>' +
            '<option value="9">คลังสินค้า (WH)</option>' +
            '<option value="10">คลังวัสดุ (Store)</option>' +
            ' <option value="11">โรงงาน </option>' +
            '</select>' +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</form>',
        buttons: {

            formSubmit: {

                text: 'ยืนยัน',
                btnClass: 'btn-blue',

                action: function() {
                    var value_item_pick = this.$content.find('#value_item_pick').val();
                    var textarea_pick = this.$content.find('#textarea_pick').val();
                    var name_of_pel = this.$content.find('#name_of_pel').val();
                    var afb_group_id_pick = this.$content.find('#afb_group_id_pick').val();
                    if (!value_item_pick) {
                        $.alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                        return false;
                    }
                    if (!textarea_pick) {
                        $.alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                        return false;
                    }
                    if (!name_of_pel) {
                        $.alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                        return false;
                    }
                    if (!afb_group_id_pick) {
                        $.alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                        return false;
                    }


                    $.ajax({
                        type: "GET",
                        url: "../../mspo_cpn/mspo_display.php?menu=pick_in_out&pick_out=select_item&item_id_pick=<?=$item_id_pick?>&name_item_pick=<?=$name_item_pick?>&value_total=<?=$value_total?>",
                        data: {
                            value_item_pick: value_item_pick,
                            textarea_pick: textarea_pick,
                            name_of_pel: name_of_pel,
                            afb_group_id_pick:afb_group_id_pick,
                        }

                    });
                    window.location = '../../mspo_cpn/mspo_display.php?menu=pick_in_out';
                }
            },
            ยกเลิก: function() {
                window.location = '../../mspo_cpn/mspo_display.php?menu=pick_in_out';
            },
        },
        onContentReady: function() {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function(e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
</script>

<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y/m/d h:i:sa");
$sql = "INSERT INTO pick_in_out_logs_tbl(pick_in_out_val,pick_in_out_pel,pick_in_out_sumval,pick_in_out_comment,pick_in_out_date,material_id,depart_id,state_id) VALUES ('$value_item_pick','$name_of_pel','$value_item_pick','$textarea_pick','$date','$item_id_pick','$afb_group_id_pick',18)";
mysqli_query($conn,$sql);

$sql = "UPDATE material_tbl SET material_value = material_value-$value_item_pick WHERE material_id = $item_id_pick";
mysqli_query($conn,$sql);
?>