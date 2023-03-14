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
        title: 'เพิ่มผู้ใช้ใหม่',
        content: '' +
            '<form action="" class="formName">' +
            '<div class="control-box-al">' +
            '<div class="form-group">' +
            '<label>UserName</label>' +
            '<input type="text" placeholder="UserName" class="form-control" id="input_value_check_in" required />' +
            '</div>' +
            '<div class="form-group">' +
            '<label>Password</label>' +
            '<input type="text" placeholder="Password" class="form-control" id="input_value_check_in" required />' +
            '</div>' +
            '<div class="form-group">' +
            '<label>คำนำหน้าชื่อ</label>' +
            '<select id="prefix_name"><option value="1">นาย</option><option value="2">นาง</option><option value="3">นางสาว</option></select>'+
            '</div>' +
            '<div class="form-group">' +
            '<label>ชื่อจริง - นามสกุล</label>' +
            '<input type="text" placeholder="ชื่อนามสกุล" class="form-control" id="input_value_check_in" required />' +
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
                        url: "../../mspo_cpn/mspo_display.php?menu=add_user",
                        data: {
                            input_value_check_in: input_value_check_in,
                            type_material: type_material,
                            class_shelf: class_shelf,
                        }

                    });
                    
                    window.location = '../../mspo_cpn/mspo_display.php?menu=add_user';
                }
            },
            ยกเลิก: function() {
                window.location = '../../mspo_cpn/mspo_display.php?menu=add_user';
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