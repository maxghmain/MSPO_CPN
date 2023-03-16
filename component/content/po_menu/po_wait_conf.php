<?php


?>
<style>
    .display-butt{
       display: flex;
       justify-content: center;

    }
    .butt-conf-po{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-conf-po:hover{
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }
    .butt-conf-po a{
       text-decoration: none;
       color: white;
    }
    .butt-edit-po{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #fbd741;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-edit-po:hover{
        width: 60px;
        border-radius: 20px;
        background: #fda003;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-edit-po a{
        color: black;
        text-decoration: none;
    }
    .butt-cancle{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #be2623;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-cancle:hover{
        width: 60px;
        border-radius: 20px;
        background: #930a00;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-cancle a{
        color: white;
        text-decoration: none;
    }
</style>
<div class="container_title">
    <h5>PO ที่รอตรวจรับ - PO WAIT</h5>

</div>
<div class="container_box">
    <div class="container_box_h1">
        <div id="table-function">
            <table>
                <tr>
                    <td style="border:none;">
                        รายการ PO ที่รอตรวจรับ
                    </td>
                    <td style="border:none;">
                        ค้นหา <input type="search" id="name-po" />
                    </td>
                    <td style="border:none;">
                        จากวันที่ <input type="date" id="date-start" />
                    </td>
                    <td style="border:none;">
                        ถึงวันที่ <input type="date" id="date-start" />
                    </td>
                </tr>
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
                                        ชื่อผู้เพิ่มใบ PO
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
                                        อณุมัติ / แก้ไข / ยกเลิก ใบPO
                                    </td>


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                session_start();
                                include 'php/connect_db.php';
                                $sql = "SELECT a.po_id,po_num,a.comp_contect_id,comp_contect_name,a.state_id,po_price_sum_vat,po_logs_id,po_logs_date_record,c.user_id,d.userdata_id,userdata_fname,userdata_lname,e.prefix_id,prefix_name,a.type_po_id,type_po_name FROM po_tbl as a 
                                INNER JOIN comp_contect_tbl as b 
                                ON a.comp_contect_id = b.comp_contect_id 
                                INNER JOIN po_logs_tbl as c ON a.po_id = c.po_id 
                                INNER JOIN user_tbl as d ON c.user_id = d.user_id 
                                INNER JOIN userdata_tbl as e ON d.userdata_id = e.userdata_id
                                INNER JOIN prefix_tbl as f on e.prefix_id = f.prefix_id
                                INNER JOIN type_po_tbl as g
                                ON a.type_po_id = g. type_po_id
                                WHERE a.state_id = 11 ORDER BY po_id DESC";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['state_id'] == 11) {
                                ?>
                                    <tr>
                                        <td style="width: 5%;">
                                            PO <?= $row['po_num']; ?>
                                        </td>
                                        <td style="width: 10%;">
                                            <?= $row['comp_contect_name']; ?>
                                        </td>

                                        <td style="width: 10%;">
                                               <?=$row['prefix_name'].' '.$row['userdata_fname'].' '.$row['userdata_lname']?>
                                               </td>

                                        <td style="width: 7%;">
                                            <?= $row['po_price_sum_vat']; ?>
                                        </td>
                                        
                                            <td style="width: 10%;">
                                               <strong><li style="color:red;">รอการอนุมัติ</li></strong>
                                               </td>
                                               <td style="width: 7%;">
                                            <?=$row['type_po_name']?>
                                            </td>  
                                            <td style="width: 10%;">

                                            <div class="display-butt"><div class="butt-conf-po"><a href="mspo_display.php?menu=po_wait_conf&comfirm_po=alrady_comfirm&po_id_select=<?=$row['po_id']?>">อนุมัติ</a></div>
                                            <div class="butt-cancle"><a href="mspo_display.php?menu=po_wait_conf&comfirm_po=alrady_cancel&po_id_select=<?=$row['po_id']?>">ยกเลิก</a></div></div>
                                            </td>
                                            <?php  } ?>



                                    </tr>



                                <?php  }

                                ?>
                            </tbody>

                            </form>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>