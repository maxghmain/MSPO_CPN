<style>
    .containner_item{
        border-radius: 10px;
        margin: 10px;
        height: auto;
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
    .button_more_afb{
        border: 0px solid red;
        border-radius: 20px;
        margin: 10px;
        height: 40px;
        display: flex;
        justify-content: left;
        align-items: center;
        background: #006ebc;
        color: white;
        font-family: Noto sans Thai;
        cursor: pointer;
        transition-duration: 0.3s;
        width: 150px;
        padding: 10px;

    }
    .button_more_afb:hover{
        border: 0px solid red;
        border-radius: 20px;
        margin: 10px;
        height: 40px;
        display: flex;
        justify-content: left;
        align-items: center;
        background: #5d8d75;
        color: white;
        font-family: Noto sans Thai;
        cursor: pointer;
        
    }
    #open_afb_more_detail{
        text-decoration: none;
    }
    #showdetail_butt{
        justify-content: center;
        align-items: center;
        display: flex;
        height: 35px;
        width: 170px;
        margin: 5px;
        background: #006ebc;
        text-decoration: none;
        border-radius: 30px;
        padding: 5px;
        color: white;
        font-size: 14px;
        transition-duration: 0.3s;
    }
    #showdetail_butt:hover{
        justify-content: center;
        align-items: center;
        display: flex;
        height: 35px;
        width: 170px;
        margin: 5px;
        background: #014474;
        text-decoration: none;
        border-radius: 30px;
        padding: 5px;
        color: white;
        font-size: 14px;
    }
</style>
<?php
session_start();
 $limit = 5; // number of items to show per page
 $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page
 $offset = ($page - 1) * $limit;
$sql = "SELECT order_afb_id, name_ms_normal_name, name_ms_real_name, order_afb_value, unit_name, order_afb_note,form_afb_number,form_afb_book_number,a.state_id,form_afb_write_date
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b 
ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c 
ON a.unit_id = c.unit_id 
INNER JOIN form_afb_tbl as d 
ON a.form_afb_id = d.form_afb_id
WHERE a.state_id = 3 OR a.state_id = 10 LIMIT $offset, $limit";
$counst = ($offset + 1);
$query = mysqli_query($conn, $sql);
if (!$query) {
    die('Error: ' . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($query)) {
    echo '<div class="containner_item">';
    echo '<div class="box-item-show-1">';
    echo 'รายการที่ : '.$counst; 
    echo '<br>';
    echo ' เล่มที่ '.$row['form_afb_book_number'].' เลขที่ '.$row['form_afb_number'].' | '.' วันที่ :'.$row['form_afb_write_date'].'<br>';
    echo 'ชื่อไม่เป็นทางการ : '.$row['name_ms_normal_name'].'|'; 
    echo 'ชื่อเป็นทางการ : '.$row['name_ms_real_name'].'|';
    echo 'จำนวน : '.$row['order_afb_value'].' '.$row['unit_name'].'|';
    echo 'หมายเหตุ : '.$row['order_afb_note'].'<br>';
    if($row['state_id'] == 10){
        echo '<li style="color:red;">รายการขอซื้อกำลังใช้งาน</li>';
    }
    if($row['state_id'] == 3){
        echo '<li style="color:green;">รายการขอซื้อรอใช้งาน</li>';
    }
    echo '</div>';
   
    echo '<a id="showdetail_butt" href="mspo_display.php?menu=item_wait_for_use&page='.$_SESSION['page'].'&item_Number='.$row['order_afb_id'].'" >รายละเอียดรายการขอซื้อ';
    echo '</a>';
    
    echo '</div>';
   
    $counst++;
}
$total_sql = "SELECT COUNT(*) as total FROM order_afb_tbl WHERE a.state_id = 3 OR a.state_id = 10";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_array($total_result);
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $limit);

// Create the pagination links
$pagination = "";
if ($total_pages > 1) {
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $pagination .= "<strong>$i</strong>";
        } else {
            $pagination .= "<a href=mspo_display.php?menu=item_wait_for_use&page=$i'>$i</a>";
        }
    }
}
$conn->close();
?>
