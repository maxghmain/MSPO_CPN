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
        display: flex;
        align-items: center;
        justify-content: center;
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
</style>

<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
                    <div id="titel-name">
                        รายการใบขอซื้อ

                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <?php
                            include 'php/connect_db.php';
                            $limit = 3; // number of items to show per page
                            $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page
                            $offset = ($page - 1) * $limit;
                            $sql = "SELECT form_afb_id,form_afb_number,form_afb_book_number,form_afb_write_date, 
            form_afb_savesys_date,form_afb_people_name,form_afb_people_name_ok,a.state_id,state_name,
            form_afb_detail_work_for, b.group_name 
            FROM form_afb_tbl as a 
            INNER JOIN group_tbl as b 
            ON a.group_id = b.group_id
            INNER JOIN state_tbl as c
            ON c.state_id = a.state_id
            WHERE a.state_id = 1 ORDER BY form_afb_id DESC LIMIT $offset, $limit ";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                die('Error: ' . mysqli_error($conn));
                            }
                            while ($row = mysqli_fetch_array($result)) {

                                echo '<div id="body-afb-box-1">';
                                echo '<div id="body-afb-box-2">';
                                echo '<div id="title-afb">';
                                echo 'ใบขอซื้อ';
                                echo '</div>';
                                echo '<br>';
                                echo '<div id="info-afb-box-1">';
                                echo '<div id="info-afb-box-2">';
                                echo 'สถานะ :' . '<a id="state_name_wait">' . $row['state_name'] . "</a>";
                                echo '</div>';
                                echo '<div id="info-afb-box-2">';
                                echo 'Action : ' . '<a id="create_po_afb" href="mspo_display.php?menu=po_material&form_afb_id=' . $row['form_afb_id'] . '&state_excecut=select_afb">เลือกใบขอซื้อ</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<hr>';
                                echo '<div id="info-afb-box-1">';
                                echo '<div id="info-afb-box-2">';
                                echo 'เล่มที่ :' . $row['form_afb_number'];
                                echo '</div>';
                                echo '<div id="info-afb-box-2">';
                                echo 'เลขที่ :' . $row['form_afb_book_number'];
                                echo '</div>';
                                echo '</div>';
                                echo '<hr>';
                                echo '<div id="info-afb-box-1">';
                                echo '<div id="info-afb-box-2">';
                                echo 'วันที่เขียน :' . $row['form_afb_write_date'];
                                echo '</div>';
                                echo '<div id="info-afb-box-2">';
                                echo 'วันที่เพิ่มลงระบบ :' . $row['form_afb_savesys_date'];
                                echo '</div>';
                                echo '</div>';
                                echo '<hr>';
                                echo '<div id="info-afb-box-1">';
                                echo '<div id="info-afb-box-2">';
                                echo 'ผู้ขอซื้อ :' . $row['form_afb_people_name'];
                                echo '</div>';
                                echo '<div id="info-afb-box-2">';
                                echo 'ผู้อนุมัติ :' . $row['form_afb_people_name_ok'];
                                echo '</div>';
                                echo '</div>';
                                echo '<hr>';
                                echo '<div id="info-afb-box-1">';
                                echo '<div id="info-afb-box-2">';
                                echo 'ใช้งานกับ :' . $row['form_afb_detail_work_for'];
                                echo '</div>';
                                echo '<div id="info-afb-box-2">';
                                echo 'ฝ่าย :' . $row['group_name'];
                                echo '</div>';
                                echo '</div>';
                                echo '<hr>';


                                echo '<br>';
                                echo '<div id="item-log">';
                                $form_afb_id = $row['form_afb_id'];
                                $sql = "SELECT order_afb_id, name_ms_normal_name, name_ms_real_name, order_afb_value, unit_name, order_afb_note 
                FROM order_afb_tbl as a 
                INNER JOIN name_ms_tbl as b 
                ON a.name_ms_id = b.name_ms_id 
                INNER JOIN unit_tbl as c 
                ON a.unit_id = c.unit_id 
                WHERE form_afb_id = '$form_afb_id'";
                                $count_data = 1;
                                $result1 = mysqli_query($conn, $sql);
                                if (!$result1) {
                                    die('Error: ' . mysqli_error($conn));
                                }
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo '<div class="scoool">';
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
                                    echo '</div>';


                                    $count_data++;
                                }
                                echo '</div>';
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
                            $conn->close();
                            ?>

                        </div>
                        <br>
                        <div class="pagination">
                            <?php if ($total_pages > 1) : ?>
                                <div class="page-item">
                                    <a class="page-link" href="mspo_display.php?menu=history_afb&page=1">First</a>
                                </div>
                                <?php
                                $start_page = max(1, $page - 2);
                                $end_page = min($total_pages, $page + 2);
                                for ($i = $start_page; $i <= $end_page; $i++) :
                                ?>
                                    <div class="page-item">
                                        <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=history_afb&page=<?php echo $i; ?>">
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
                                        <a class="page-link" href="mspo_display.php?menu=history_afb&page=<?php echo $total_pages; ?>">Last</a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>