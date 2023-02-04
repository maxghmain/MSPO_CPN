

<style>

    #body-afb-box-1{
        width: 400px;
        border: 1px solid black;
        margin: 10px;
        border-radius: 10px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }
    #body-afb-box-2{
 
        margin: 2.5px;
    }
    #title-afb{
        justify-content: center;
        align-items: center ;
        height: 50px;
        background: #006ebc;
        display: flex;
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
    }
   #info-afb-box-1{
    display: flex;
   }
   #info-afb-box-2{
    width: 100%;
   }
</style>





            <?php
            include 'php/connect_db.php';
            $limit = 3; // number of items to show per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page
            $offset = ($page - 1) * $limit;
            $sql = "SELECT * FROM form_afb_tbl WHERE state_id = 1 LIMIT $offset, $limit";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div id="body-afb-box-1">';
                echo '<div id="body-afb-box-2">';
                echo '<div id="title-afb">';
                echo 'ใบขอซื้อ';
                echo '</div>';
                echo '<br>';
                echo '<div id="info-afb-box-1">';
                echo '<div id="info-afb-box-2">';
                echo 'เล่มที่ :' . $row['form_afb_number'];
                echo '</div>';
                echo '<div id="info-afb-box-2">';
                echo 'เลขที่ :' . $row['form_afb_book_number'];
                echo '</div>';
                echo '</div>';

                echo '<div id="info-afb-box-1">';
                echo '<div id="info-afb-box-2">';
                echo 'วันที่เขียน :' . $row['form_afb_write_date'];
                echo '</div>';
                echo '<div id="info-afb-box-2">';
                echo 'วันที่เพิ่มลงระบบ :' . $row['form_afb_savesys_date'];
                echo '</div>';
                echo '</div>';

                echo '<div id="info-afb-box-1">';
                echo '<div id="info-afb-box-2">';
                echo 'ผู้ขอซื้อ :' . $row['form_afb_people_name'];
                echo '</div>';
                echo '<div id="info-afb-box-2">';
                echo 'ผู้อนุมัติ :' . $row['form_afb_people_name_ok'];
               
                echo '</div>';
                echo '</div>';
                echo 'ใช้งานกับ :' . $row['form_afb_detail_work_for'];
   
                $form_afb_id = $row['form_afb_id'];
                $sql = "SELECT order_afb_id,name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE form_afb_id = $form_afb_id ";
                $count_data = 1;
                $result1 = mysqli_query($conn, $sql);
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo '<table >';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td style="width:6%">';
                    echo $count_data;
                    echo '</td>';
                    echo '<td style="width:20%">';
                    echo $row1['name_ms_normal_name'];
                    echo '</td>';
                    echo '<td style="width:20%"> ';
                    echo $row1['name_ms_real_name'];
                    echo '</td>';
                    echo '<td style="width:20%">';
                    echo $row1['order_afb_value'];
                    echo $row1['unit_name'];
                    echo '</td>';
                    echo '<td style="width:20%">';
                    echo $row1['order_afb_note'];
                    echo '</td>';
                    echo '<tr>';
                    echo '</table>';


                    $count_data ++;
                }
                echo '<br/>';
                echo '</div>';
                echo '</div>';
            }
            $total_sql = "SELECT COUNT(*) as total FROM form_afb_tbl WHERE state_id = 1";
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
            $pagination .= "<a href=mspo_display.php?menu=state_afb&page=$i'>$i</a>";
        }
    }
}

// Close the database connection
$conn->close();
?>

<!-- Display the pagination links -->

