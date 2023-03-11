<?php
session_start();
include 'php/connect_db.php';
?>
<script>
    $.confirm({
        boxWidth: '30%',
        useBootstrap: false,
        type: 'red',
        typeAnimated: true,
        title: 'ตรวจรับรายการสินค้าเข้าคลังวัสดุ',
        content: '' +
            '<form action="" class="formName">' +
            '<div class="control-box-al">' +
            '<div class="form-group">' +
            '<label>จำนวนวัสดุที่ตรวจรับ</label>' +
            '<input type="number" placeholder="จำนวน" class="form-control" id="input_value_check_in" required />' +
            '</div>' +
            '<div class="form-group">' +
            '<label>ประเภทวัสดุ</label>' +
            '<select id="type_material">' +
            '<option value="1">ประเภทซ่อมบำรุง</option>' +
            '<option value="2">ประเภทไฟฟ้า</option>' +
            '<option value="3">ประเภทสารเคมี</option>' +
            '<option value="4">ประเภทเครื่องทำความเย็น</option>' +
            '<option value="5">ประเภทงานประปา</option>' +
            '<option value="6">ประเภทเฉพาะงาน</option>' +
            '<option value="7">ประเภทงานทั่วไป</option>' +
            '<option value="8">ประเภทอื่นๆ</option></select>' +
            '</div>' +
            '<div class="form-group">' +
            '<label>ชั้นวาง</label>' +
            '<select id="class_shelf"><option value="1">ชั้นที่1</option><option value="2">ชั้นที่2</option><option value="3">ชั้นที่3</option></select>' +
            '</div>' +
            '</div>' +
            '</form>',
        buttons: {

            formSubmit: {

                text: 'ยืนยัน',
                btnClass: 'btn-blue',


                action: function() {
                    var type_material = this.$content.find('#type_material').val();
                    var class_shelf = this.$content.find('#class_shelf').val();
                    var input_value_check_in = this.$content.find('#input_value_check_in').val();
                    if (!input_value_check_in) {
                        $.alert('กรุณากรอกข้อมูลให้ถูกต้อง');
                        return false;
                    }

                    $.ajax({
                        type: "GET",
                        url: "../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?= $check_in ?>&state_excecut=check_in_list&input_value=alradyinput&order_id_input=<?= $order_id_input ?>&name_item_check_in=<?= $name_item_check_in ?>&input_value_check_in=<?= $input_value_check_in ?>&type_material=<?= $type_material ?>&class_shelf=<?= $class_shelf ?>&price_item_not_sum=<?= $price_item_not_sum ?>&pick_in=success",
                        data: {
                            input_value_check_in: input_value_check_in,
                            type_material: type_material,
                            class_shelf: class_shelf,
                        }

                    });
                    
                    window.location = '../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?= $check_in ?>&state_excecut=check_in_list';
                }
            },
            ยกเลิก: function() {
                window.location = '../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?= $check_in ?>&state_excecut=check_in_list';
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