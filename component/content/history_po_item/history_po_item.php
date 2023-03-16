<?php
session_start();
include 'php/connect_db.php';

?>
<style>
    .display-butt {
        display: flex;
        justify-content: center;

    }

    .butt-conf-po {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-conf-po:hover {
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }

    .butt-conf-po a {
        text-decoration: none;
        color: white;
    }

    .butt-edit-po {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #fbd741;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-edit-po:hover {
        width: 60px;
        border-radius: 20px;
        background: #fda003;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-edit-po a {
        color: black;
        text-decoration: none;
    }

    .butt-cancle {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #be2623;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-cancle:hover {
        width: 60px;
        border-radius: 20px;
        background: #930a00;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-cancle a {
        color: white;
        text-decoration: none;
    }

    .butt-more-detail-po {
        margin: 5px;
        width: 100px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-more-detail-po:hover {
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }

    .butt-more-detail-po a {
        color: white;
        text-decoration: none;
    }
    .search-po{
        cursor: pointer;
        height: 25px;
        width: 100px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .search-po:hover{
        width: 100px;
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
</style>
<div class="container_title">
    <h5>ประวัติใบ PO ประเภทวัสดุ</h5>
</div>
    <div class="container_box">
        <div class="container_box_h1">
            <div id="table-function">
                <table>
                    <form action="" method="POST">
                        <tr>
                            <td style="border:none;">
                            ประวัติใบ PO
                            </td>
                            <td style="border:none;">
                                ค้นหา <input type="search" id="name-po" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" />
                            </td>
                            <td style="border:none;">
                                จากวันที่ <input type="date" name="date_form" />
                            </td>
                            <td style="border:none;">
                                ถึงวันที่ <input type="date" name="date_to" />
                            </td>
                            <td style="border:none;display:flex;">
                                สถานะใบ PO <select style="width:150px;" name="status_po">
                                <option value="">ทั้งหมด</option>
                                    <option value="11">รออนุมัติ</option>
                                    <option value="13">รอตรวจรับ</option>
                                    <option value="15">ตรวจรับแล้วแต่ไม่สมบูรณ์</option>
                                    <option value="16">ตรวจรับสมบูรณ์แล้ว</option>
                                </select>
                            </td>
                            <td style="border:none;">
                                <button class="search-po" id="search-po-butt" name="search">ค้นหา</button>
                            </td>
                        </tr>
                    </form>
                </table>
   

                <div style="display: flex;justify-content: center;margin-bottom:20px;width:100%;margin-top:10px">
                    <div id="table_data_show_display" style="border:1px solid black;width:100%;">
                        <div id="fuck">
                            <table>
                                <thead>
                                    <tr>
                                        <td style="width: 5%;">
                                            เลขที่ PO
                                        </td>
                                        <td style="width: 10%;">
                                            บริษัทที่ติดต่อ
                                        </td>
                                        <td style="width: 10%;">
                                            ชื่อผู้อนุมัติใบ PO
                                        </td>
                                        <td style="width: 7%;">
                                            <strong>ราคา</strong>
                                        </td>
                                        <td style="width: 10%;">
                                            สถานะ
                                        </td>

                                        <td style="width: 7%;">
                                            ประเภท PO
                                        </td>
                                        <td style="width: 10%;">
                                            ACTION
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     if (isset($_POST['search'])) {
                                        $keyword = $_POST['keyword'];
                                        $status_po = $_POST['status_po'];
                                        $date_form = $_POST['date_form'];
                                        $date_to = $_POST['date_to'];
                                        
                                        $where = [];
                                        if (!empty($keyword)) {
                                            $where[] = "po_num LIKE '%$keyword%'";
                                        }
                                        if (!empty($status_po)) {
                                            $where[] = "a.state_id LIKE '%$status_po%'";
                                        }
                                        if (!empty($date_form) && !empty($date_to)) {
                                            $where[] = "po_logs_date_record BETWEEN  '%$date_form%' AND '%$date_to%'";
                                        }
                                        
                                        $where_clause = '';
                                        if (!empty($where)) {
                                            $where_clause = ' WHERE ' . implode(' AND ', $where);
                                        }
                                        
                                        $sql = "SELECT a.po_id,po_num,a.comp_contect_id,comp_contect_name,a.state_id,po_price_sum_vat,po_logs_id,po_logs_date_record,c.user_id,d.userdata_id,userdata_fname,userdata_lname,e.prefix_id,prefix_name,a.type_po_id,type_po_name 
                                                FROM po_tbl as a 
                                                INNER JOIN comp_contect_tbl as b ON a.comp_contect_id = b.comp_contect_id 
                                                INNER JOIN po_logs_tbl as c ON a.po_id = c.po_id 
                                                INNER JOIN user_tbl as d ON c.user_id = d.user_id 
                                                INNER JOIN userdata_tbl as e ON d.userdata_id = e.userdata_id
                                                INNER JOIN prefix_tbl as f on e.prefix_id = f.prefix_id
                                                INNER JOIN type_po_tbl as g ON a.type_po_id = g.type_po_id" . $where_clause . " ORDER BY po_id DESC";
                                        
                                        $result = mysqli_query($conn, $sql);
                                    
                                    } else {
                                        $sql = "SELECT a.po_id,po_num,a.comp_contect_id,comp_contect_name,a.state_id,po_price_sum_vat,po_logs_id,po_logs_date_record,c.user_id,d.userdata_id,userdata_fname,userdata_lname,e.prefix_id,prefix_name,a.type_po_id,type_po_name FROM po_tbl as a 
                                            INNER JOIN comp_contect_tbl as b 
                                            ON a.comp_contect_id = b.comp_contect_id 
                                            INNER JOIN po_logs_tbl as c ON a.po_id = c.po_id 
                                            INNER JOIN user_tbl as d ON c.user_id = d.user_id 
                                            INNER JOIN userdata_tbl as e ON d.userdata_id = e.userdata_id
                                            INNER JOIN prefix_tbl as f on e.prefix_id = f.prefix_id
                                            INNER JOIN type_po_tbl as g
                                            ON a.type_po_id = g.type_po_id
                                            
                                            ORDER BY po_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                    while ($search = mysqli_fetch_array($result)) {

                                    ?>

                                        <tr>
                                            <td style="width: 5%;">
                                                PO<?= $search['po_num']; ?>
                                            </td>
                                            <td style="width: 10%;">
                                                <?= $search['comp_contect_name'] ?>
                                            </td>
                                            <td style="width: 10%;">
                                                <?= $search['prefix_name'] . ' ' . $search['userdata_fname'] . ' ' . $search['userdata_lname'] ?>
                                            </td>
                                            <td style="width: 7%;">
                                                <?= $search['po_price_sum_vat'] ?>
                                            </td>
                                            <td style="width: 10%;">
                                                <?php if ($search['state_id'] == 11) { ?>
                                                    <strong>
                                                        <li style="color:red;">รอการอนุมัติ</li>
                                                    </strong>
                                                <?php } ?>
                                                <?php if ($search['state_id'] == 13) { ?>
                                                    <strong>
                                                        <li style="color:red;">รอตรวจรับ</li>
                                                    </strong>
                                                <?php } ?>
                                                <?php if ($search['state_id'] == 15) { ?>
                                                    <strong>
                                                        <li style="color:#f7d07a;">ตรวจรับแล้วแต่ยังไม่สมบูรณ์</li>
                                                    </strong>
                                                <?php } ?>
                                                <?php if ($search['state_id'] == 16) { ?>
                                                    <strong>
                                                        <li style="color:green;">ตรวจรับสมบูรณ์แล้ว</li>
                                                    </strong>
                                                <?php } ?>
                                                <?php if ($search['state_id'] == 19) { ?>
                                                <strong>
                                                    <li style="color:red;">PO โดนยกเลิก</li>
                                                </strong>
                                            <?php } ?>
                                            </td>

                                            <td style="width: 7%;">
                                                <?= $search['type_po_name'] ?>
                                            </td>
                                            <td style="width: 10%;">
                                            <?php 
                                             if ($_SESSION['userlvid'] == '3'){?>
                                            
                                                        <div class="display-butt">
                                                            <div class="butt-conf-po"><a href="mspo_display.php?menu=po_check_in&check_in=<?= $search['po_id'] ?>&state_excecut=check_in_list">เพิ่มเติม</a></div>
                                                        </div>
                                                    <?php 
                                                } ?>
                                                <?php if ($_SESSION['userlvid'] == '4'){



                                                if ($search['state_id'] == 13) { ?>
                                                        <div class="display-butt">
                                                            <div class="butt-conf-po"><a href="mspo_display.php?menu=po_check_in&check_in=<?= $search['po_id'] ?>&state_excecut=check_in_list">ตรวจรับ</a></div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($search['state_id'] == 15) { ?>
                                                        <div class="display-butt">
                                                            <div class="butt-conf-po"><a href="mspo_display.php?menu=po_check_in&check_in=<?= $search['po_id'] ?>&state_excecut=check_in_list">ตรวจรับ</a></div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($search['state_id'] == 16) { ?>
                                                        <div class="display-butt">
                                                            <div class="butt-conf-po"><a href="mspo_display.php?menu=po_check_in&check_in=<?= $search['po_id'] ?>&state_excecut=check_in_list">INFO</a></div>
                                                        </div>
                                                    <?php }
                                                    } ?>
                                            </td>
                                        </tr>



                                    <?php  }  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
