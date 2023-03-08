<?php
session_start();
include 'php/connect_db.php';
?>
    <script>
      
$.confirm({
    boxWidth: '30%',
    useBootstrap: false,
    title: 'แจ้งเตือน',
    content: '' +
    '<form action="" class="formName">' +
    '<div class="control-box-al">'+
    '<div class="form-group">' +
    '<label>จำนวนวัสดุที่ตรวจรับ</label>' +
    '<input type="number" placeholder="จำนวน" class="form-control" id="input_value_check_in" required />' +
    '</div>' +
    '</div>'+
    '</form>',
    buttons: {
        
        formSubmit: {
            
            text: 'ยืนยัน',
            btnClass: 'btn-blue',
            
            action: function () {
                var input_value_check_in = this.$content.find('#input_value_check_in').val();
                if(!input_value_check_in){
                    $.alert('กรุณากรอกข้อมูลให้ถูกต้อง');
                    return false;
                }
                
                $.alert('ตรวจรับสันค้า จำนวน ' + input_value_check_in + 'รายการ' + 'เสร็จสิ้น');
                $.ajax({
                    type: "GET",
                    url: "../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?=$check_in?>&state_excecut=check_in_list&input_value=alradyinput&order_id_input=<?=$order_id_input?>",
                    data: {
                        input_value_check_in:input_value_check_in,
                    }
                   
                });
                window.location = '../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?=$check_in?>&state_excecut=check_in_list';
            }
        },
        ยกเลิก: function () {
            window.location = '../../mspo_cpn/mspo_display.php?menu=po_check_in&check_in=<?=$check_in?>&state_excecut=check_in_list';
        },
    },
    onContentReady: function () {
        // bind to events
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
        });
    }
});
</script>

<?php

$sql = "UPDATE order_tbl SET order_queantity = order_queantity-$input_value_check_in,state_id = 15  WHERE order_id = $order_id_input";
mysqli_query($conn,$sql);

$sql = "UPDATE po_tbl SET state_id = 15 WHERE po_id = $check_in";
mysqli_query($conn,$sql);

$sql = "UPDATE po_logs_tbl SET state_id = 15 WHERE po_id = $check_in";
mysqli_query($conn,$sql);


?>