<?php
session_start();
include 'php/connect_db.php';
$po_number = $_SESSION['po_number'];
$user_id = $_SESSION['userid'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y/m/d h:i:sa");

    if($po_number == "" || $price_vat == 0){?>
        <script>
        alert("กรุณากรอกข้อมูลให้ครับถ้วน");
        window.location = '../../mspo_cpn/mspo_display.php?menu=po_material';
        </script>      
   <?php }else{ ?>
    <script>
        <?php $sql = "UPDATE po_tbl SET po_num = $po_number,po_price_not_vat = $totalPriceSum,po_price_vat=$vat,po_price_sum_vat=$price_vat,state_id= 11 WHERE po_id = $po_id ";
    mysqli_query($conn, $sql);

    $sql = "UPDATE order_tbl SET state_id = 12 WHERE po_id = $po_id ";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO po_logs_tbl (po_logs_date_record,po_id,user_id,state_id)
    VALUES ('$date',$po_id,$user_id,11)";
     mysqli_query($conn, $sql); ?>

         alert("บันทึกข้อมูลเสร็จสิ้น");
        window.location = '../../mspo_cpn/mspo_display.php?menu=po_wait_conf';
    </script>
   <?php }

    

    
mysqli_close($conn);
?>