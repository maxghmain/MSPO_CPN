<style>
    .containner_item{
        border-radius: 10px;
        margin: 10px;
        height: 60px;
        display: flex;
        justify-content: left;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .box-item-show-1{
       /* border: 1px solid red;*/
        display: block;
        width: 100%;
        margin: 5px;
    }
</style>

<?php

$sql = "SELECT order_afb_id, name_ms_normal_name, name_ms_real_name, order_afb_value, unit_name, order_afb_note 
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b 
ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c 
ON a.unit_id = c.unit_id 
WHERE state_id = 3";
$counst = 1;
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    echo '<div class="containner_item">';
    echo '<div class="box-item-show-1">';
    echo 'รายการที่ : '.$counst;
    echo '<br>';
    echo 'ชื่อไม่เป็นทางการ : '.$row['name_ms_normal_name'].'|'; 
    echo 'ชื่อเป็นทางการ : '.$row['name_ms_real_name'].'|';
    echo 'จำนวน : '.$row['order_afb_value'].' '.$row['unit_name'].'|';
    echo 'หมายเหตุ : '.$row['order_afb_note'];
    echo '</div>';
    echo '</div>';
    $counst++;
}
