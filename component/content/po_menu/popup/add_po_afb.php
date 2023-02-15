<?php
include 'php/connect_db.php'; ?>
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<style>
    #add_afb_po {
        /*display: none;*/
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        backdrop-filter: blur(5px);

    }

    #box_add_afb_po {

        width: 90%;
        height: 70%;
        /*  border: 1px solid red;*/
    }

    #box_add_afb_po-1 {
        /*  border: 1px solid red;*/
        margin: 5px;
        display: flex;
        justify-content: center;


        /*height: 100%;*/
    }

    #box_add_afb_po-2 {
        /* border: 1px solid red;*/
        margin: 5px;
        width: 100%;

    }

    #titel-name {
        /* border: 1px solid red;*/
        width: 100%;
        text-align: center;
        font-size: 24px;
        background: #006ebc;
        color: white;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #content-po-box {
        height: 450px;
        background: white;
        border: 1px solid #006ebc;
    }

    #afb_content_xxx {
        margin: 10px;
        height: 95%;
        /* border: 1px solid red;*/

    }

    #body-afb-box-1 {
        width: 400px;
        border: 1px solid black;
        margin: 10px;
        border-radius: 10px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    #body-afb-box-2 {

        margin: 2.5px;
    }

    #title-afb {
        justify-content: center;
        align-items: center;
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

    #info-afb-box-1 {
        display: flex;
    }

    #info-afb-box-2 {
        width: 100%;
    }

    #cancel-afb-state {
        padding: 5px;
        margin: 5px;
        border-radius: 50px;
        background: #cd5c5c;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
        cursor: pointer;
    }

    #cancel-afb-state:hover {
        padding: 5px;
        margin: 5px;
        border-radius: 50px;
        background: #cc353f;
        color: white;
        text-decoration: none;
        cursor: pointer;
    }

    #create_po_afb {
        padding: 5px;
        margin: 5px;
        border-radius: 50px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
        cursor: pointer;
    }

    #create_po_afb:hover {
        padding: 5px;
        margin: 5px;
        border-radius: 50px;
        background: #014474;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
        cursor: pointer;
    }

    #state_name_wait {
        padding: 5px;
        border-radius: 30px;
        background: #7bae6a;
        color: white;
        margin: 5px;
    }

    #item-log {
        height: 55px;
        overflow: auto;
    }

    #action_afb {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #crop-box {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    #box_butt_close {
        display: flex;
        justify-content: right;
        background-color: #006EBC;
        padding-top: 10px;
    }

    #box_butt_close a {
        margin: 5px;
        border-radius: 40px;
        border: none;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        color: #006EBC;
        background-color: white;
        font-weight: bold;
        transition-duration: 0.2s;
    }

    #box_butt_close a:hover {
        cursor: pointer;
        background: #014474;
        color: white;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 10px;
    }

    .pagination .page-link {
        color: #333;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-link:hover,
    .pagination .page-link:focus {
        background-color: #f2f2f2;
        outline: none;
    }

    .pagination .page-link.active {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .containner_item {
        border-radius: 10px;
        margin: 10px;
        height: auto;
        display: flex;
        justify-content: left;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .box-item-show-1 {
        /* border: 1px solid red;*/
        display: block;
        width: 100%;
        margin: 5px;
    }

    .button_more_afb {
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

    .button_more_afb:hover {
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

    #open_afb_more_detail {
        text-decoration: none;
    }

    #showdetail_butt {
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

    #showdetail_butt:hover {
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

<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
                    <div id="titel-name">
                        รายการขอซื้อที่รอใช้งาน

                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <?php
                            session_start();
                            $limit = 4; // number of items to show per page
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
WHERE a.state_id = 3 ORDER BY order_afb_id DESC  LIMIT $offset, $limit";

$row['form_afb_book_number'] = $form_afb_book_number;
$row['form_afb_number']= $form_afb_number;
                            $counst = ($offset + 1);
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                die('Error: ' . mysqli_error($conn));
                            }
                            while ($row = mysqli_fetch_array($query)) {
                                echo '<div class="containner_item">';
                                echo '<div class="box-item-show-1">';
                                echo 'รายการที่ : ' . $counst;
                                echo '<br>';
                                echo ' เล่มที่ ' . $row['form_afb_book_number'] . ' เลขที่ ' . $row['form_afb_number'] . ' | ' . ' วันที่ :' . $row['form_afb_write_date'] . '<br>';
                                echo 'ชื่อไม่เป็นทางการ : ' . $row['name_ms_normal_name'] . '|';
                                echo 'ชื่อเป็นทางการ : ' . $row['name_ms_real_name'] . '|';
                                echo 'จำนวน : ' . $row['order_afb_value'] . ' ' . $row['unit_name'] . '|';
                                echo 'หมายเหตุ : ' . $row['order_afb_note'];
                                echo '</div>';
                                echo '<a id="showdetail_butt" href="mspo_display.php?menu=po_material&item_Number_select=' . $row['order_afb_id'] . '&state_excecut=select_item" >เลือกรายการขอซื้อ';
                                echo '</a>';
                                echo '</div>';
                                $counst++;
                            }
                            $total_sql = "SELECT COUNT(*) as total FROM order_afb_tbl WHERE state_id = 3";
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
                            

                        </div>
                        <div class="pagination">
                                <?php if ($total_pages > 1) : ?>
                                    <div class="page-item">
                                        <a class="page-link" href="mspo_display.php?menu=po_material&add_item=already_selected&page=1">First</a>
                                    </div>
                                    <?php
                                    $start_page = max(1, $page - 2);
                                    $end_page = min($total_pages, $page + 2);
                                    for ($i = $start_page; $i <= $end_page; $i++) :
                                    ?>
                                        <div class="page-item">
                                            <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=po_material&add_item=already_selected&page=<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </div>
                                    <?php endfor; ?>
                                    <?php if ($page < $total_pages - 2) : ?>
                                        <div class="page-item">
                                            <span class="page-link">&hellip;</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($page < $total_pages - 1) : ?>
                                        <div class="page-item">
                                            <a class="page-link" href="mspo_display.php?menu=po_material&add_item=already_selected&page=<?php echo $total_pages; ?>">Last</a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>