<?php
if ($_SESSION['userlvid'] == '1') {
    /* Dashboard สำหรับ admin_user */
?>
    <div class="container_title">
        <h5>กระดานสรุปข้อมูล - Dashboard</h5>
    </div>
<?php
}
if ($_SESSION['userlvid'] == '2') {
    /* Dashboard สำหรับ normal_user */
?>
    <div class="container_title">
        <h5>กระดานสรุปข้อมูล - Dashboard</h5>
    </div>
<?php
}
if ($_SESSION['userlvid'] == '3') {
    /* Dashboard สำหรับ purchase_user */

?>

    <div class="container_title">
        <h5>กระดานสรุปข้อมูล - Dashboard</h5>
    </div>
    <div class="container_box">
        <div class="container_box_h">
            <!--Box1-->
            <div class="box_content_1">
                <div class="title-box1">
                    <p>ประวัติ PO ที่ตรวจรับเสร็จสมบูรณ์แล้ว จบ PO สมบูรณ์แล้ว</p>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
        <!--Box2-->
        <div class="container_box_h">
            <div class="box_content_2">
                <div class="title-box1">
                    <p>รายการ PO ที่ตรวจรับแล้วแต่ยังไม่สมบูรณ์</p>
                </div>
            </div>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
        <!--Box3-->
        <div class="container_box_h">
            <div class="box_content_3">
                <div class="title-box1">
                    <p>รายการ PO ที่ยังไม่ได้ตรวจรับ</p>
                </div>
            </div>
            <?php
            session_start();
            include 'php/connect_db.php';
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
            FROM po_logs_tbl as a
            INNER JOIN po_tbl as b
            ON a.po_id = b.po_id
            INNER JOIN comp_contect_tbl as c
            ON b.comp_contect_id = c.comp_contect_id
            INNER JOIN order_tbl as d
            ON a.po_id = d.po_id
            WHERE a.state_id = 11 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result)){
            echo '<div class="box_content_3">';
            echo '  <div class="title-box2">';
            echo '     <p>เลขที่: '.$row['po_num'].' วันที่: '.$row['po_logs_date_record'].'</p>';
            echo '     <p>บริษัท]: '.$row['comp_contect_name'].'</p>';
            echo '     <p>จำนวน: '.$row['order_id'].' รายการ</p>';
            echo '     <button class="btn-po">';
            echo '         คลิกที่นี่เพื่อดูรายละเอียด PO นี้';
            echo '     </button>';
            echo ' </div>';
            echo '</div>';
             } ?>
              <div class="box_content_3">
                <div class="title-box2">
              <?php
            include 'php/connect_db.php';
            $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 11";
            $query = mysqli_query($conn, $sql2);
            $row2 = mysqli_num_rows($query);
            
           
              ?>
           
                    <p>รายการทั้งหมด</p>
                    <p> <?=$row2?> : รายการ</p>
                </div>
            </div>
        </div>
        <!--Box4-->
        <div class="container_box_h">
            <div class="box_content_4">
                <div class="title-box1">
                    <p>รวยการวัสดุที่ใกล้หมดสต๊อก</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
}
if ($_SESSION['userlvid'] == '4') {
    /* Dashboard สำหรับ store_user */
?>

     <div class="container_title">
        <h5>กระดานสรุปข้อมูล - Dashboard</h5>
    </div>
    <div class="container_box">
        <div class="container_box_h">
            <!--Box1-->
            <div class="box_content_1">
                <div class="title-box1">
                    <p>ประวัติ PO ที่ตรวจรับเสร็จสมบูรณ์แล้ว จบ PO สมบูรณ์แล้ว</p>
                </div>
            </div>
           
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
        <!--Box2-->
        <div class="container_box_h">
            <div class="box_content_2">
                <div class="title-box1">
                    <p>รายการ PO ที่ตรวจรับแล้วแต่ยังไม่สมบูรณ์</p>
                </div>
            </div>
            
            <div class="box_content_2">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
        <!--Box3-->
        <div class="container_box_h">
            <div class="box_content_3">
                <div class="title-box1">
                    <p>รายการ PO ที่ยังไม่ได้ตรวจรับ</p>
                </div>
            </div>
            <div class="box_content_3">
                <div class="title-box2">
                    <p>เลขที่: No data วันที่: No data</p>
                    <p>บริษัท]: No data</p>
                    <p>จำนวน: 0 รายการ</p>
                    <button class="btn-po">
                        คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                    </button>
                </div>
            </div>
            <div class="box_content_3">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
        <!--Box4-->
        <div class="container_box_h">
            <div class="box_content_4">
                <div class="title-box1">
                    <p>รวยการวัสดุที่ใกล้หมดสต๊อก</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>None</p>
                </div>
            </div>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p>None รายการ</p>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
}
?>
