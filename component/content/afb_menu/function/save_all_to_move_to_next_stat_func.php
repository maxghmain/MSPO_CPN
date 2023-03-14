<?php
include 'php/connect_db.php';
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y/m/d h:i:sa");
$form_afb_id = $_SESSION['form_afb_id']; 
$sql = "UPDATE form_afb_tbl SET form_afb_number=$num_afb,form_afb_book_number=$num_book_afb,form_afb_write_date='$create_afb_date',form_afb_savesys_date='$date',form_afb_people_name='$name_afb_ark',form_afb_people_name_ok='$name_afb_ark_conf',form_afb_detail_work_for='$work_for',state_id=1,group_id=$afb_group_id
WHERE form_afb_id = $form_afb_id";
mysqli_query($conn,$sql);

$sql = "UPDATE order_afb_tbl SET state_id=3 WHERE form_afb_id = $form_afb_id";
mysqli_query($conn,$sql);
?>
<?php mysqli_close($conn); ?>