<?php
include 'php/connect_db.php';
$form_afb_id = $_SESSION['form_afb_id'];
    $sql ="INSERT INTO form_afb_tbl VALUE form_afb_number = $num_afb,form_afb_book_number=$num_book_afb,form_afb_write_date=$create_afb_date,form_afb_detail_work_for='$work_for',state_id= 1 WHERE form_afb_id = $form_afb_id; ";
    mysqli_query($conn,$sql);
?>