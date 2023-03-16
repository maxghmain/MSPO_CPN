<?php
session_start();
include 'php/connect_db.php';
$sql ="SELECT * FROM po_tbl WHERE po_id = $po_id_select";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
?>
<script>
    $.confirm({
    title: 'ต้องการยกเลิก PO นี้หรือไม่?',
    content: 'PO เลขที่'+' : '+'PO<?=$row['po_num']?>',
    buttons: {
        ตกลง: function () {
            window.location ="mspo_display.php?menu=po_wait_conf&comfirm_po=alrady_cancel&po_id_select=<?=$po_id_select?>&cancle=succ";
        },
        ปิด: function () {
            window.location = "mspo_display.php?menu=po_wait_conf";
        },
       
    }
});
</script>