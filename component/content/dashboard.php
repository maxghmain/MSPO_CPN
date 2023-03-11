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
            <?php
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
           FROM po_logs_tbl as a
           INNER JOIN po_tbl as b
           ON a.po_id = b.po_id
           INNER JOIN comp_contect_tbl as c
           ON b.comp_contect_id = c.comp_contect_id
           INNER JOIN order_tbl as d
           ON a.po_id = d.po_id
           WHERE a.state_id = 16 ORDER BY po_logs_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while ($row4 = mysqli_fetch_array($result)) {
            ?>
                <div class="box_content_1">
                    <div class="title-box2">
                        <p>เลขที่: <?= $row4['po_num'] ?> วันที่: <?= $row4['po_logs_date_record'] ?></p>
                        <p>บริษัท]: <?= $row4['comp_contect_name'] ?></p>
                        <p>จำนวน: <?= $row4['order_queantity'] ?> รายการ</p>
                        <button class="btn-po">
                            คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                        </button>
                    </div>
                </div>
            <?php } ?>
            <?php
            include 'php/connect_db.php';
            $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 16";
            $query = mysqli_query($conn, $sql2);
            $row5 = mysqli_num_rows($query);


            ?>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row5 ?> รายการ</p>
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
            <?php
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
           FROM po_logs_tbl as a
           INNER JOIN po_tbl as b
           ON a.po_id = b.po_id
           INNER JOIN comp_contect_tbl as c
           ON b.comp_contect_id = c.comp_contect_id
           INNER JOIN order_tbl as d
           ON a.po_id = d.po_id
           WHERE a.state_id = 15 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);
            while ($row2 = mysqli_fetch_array($result)) {
            ?>
                <div class="box_content_2">
                    <div class="title-box2">
                        <p>เลขที่: <?= $row2['po_num'] ?> วันที่: <?= $row2['po_logs_date_record'] ?></p>
                        <p>บริษัท: <?= $row2['comp_contect_name'] ?></p>
                        <p>จำนวน: <?= $row2['order_queantity'] ?> รายการ</p>
                        <button class="btn-po">
                            คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                        </button>
                    </div>
                </div>
            <?php } ?>
            <?php
            include 'php/connect_db.php';
            $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 15";
            $query = mysqli_query($conn, $sql2);
            $row3 = mysqli_num_rows($query);


            ?>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row3 ?> รายการ</p>
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
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
            FROM po_logs_tbl as a
            INNER JOIN po_tbl as b
            ON a.po_id = b.po_id
            INNER JOIN comp_contect_tbl as c
            ON b.comp_contect_id = c.comp_contect_id
            INNER JOIN order_tbl as d
            ON a.po_id = d.po_id
            WHERE a.state_id = 13 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="box_content_3">';
                echo '  <div class="title-box2">';
                echo '     <p>เลขที่: PO ' . $row['po_num'] . ' วันที่: ' . $row['po_logs_date_record'] . '</p>';
                echo '     <p>บริษัท]: ' . $row['comp_contect_name'] . '</p>';
                echo '     <p>จำนวน: ' . $row['order_id'] . ' รายการ</p>';
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
                    $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 13";
                    $query = mysqli_query($conn, $sql2);
                    $row2 = mysqli_num_rows($query);


                    ?>

                    <p>รายการทั้งหมด</p>
                    <p> <?= $row2 ?> : รายการ</p>
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
            <?php
            $sql = "SELECT * FROM material_tbl WHERE material_value < 5 LIMIT 6";
            $result = mysqli_query($conn, $sql);
            while ($row6 = mysqli_fetch_array($result)) {



            ?>
                <div class="box_content_4">
                    <div class="title-box2">
                        <p><?= $row6['material_name'] ?> จำนวนคงเหลือ : <?= $row6['material_value'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php
            $sql = "SELECT * FROM material_tbl WHERE material_value < 5";
            $result = mysqli_query($conn, $sql);
            $row7 = mysqli_num_rows($result);
            ?>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row7 ?> รายการ</p>
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
            <?php
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
           FROM po_logs_tbl as a
           INNER JOIN po_tbl as b
           ON a.po_id = b.po_id
           INNER JOIN comp_contect_tbl as c
           ON b.comp_contect_id = c.comp_contect_id
           INNER JOIN order_tbl as d
           ON a.po_id = d.po_id
           WHERE a.state_id = 16 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);
            while ($row4 = mysqli_fetch_array($result)) {
            ?>
                <div class="box_content_1">
                    <div class="title-box2">
                        <p>เลขที่: <?= $row4['po_num'] ?> วันที่: <?= $row4['po_logs_date_record'] ?></p>
                        <p>บริษัท: <?= $row4['comp_contect_name'] ?></p>
                        <p>จำนวน: <?= $row4['order_queantity'] ?> รายการ</p>
                        <button class="btn-po">
                            คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                        </button>
                    </div>
                </div>
            <?php } ?>
            <?php
            include 'php/connect_db.php';
            $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 16";
            $query = mysqli_query($conn, $sql2);
            $row5 = mysqli_num_rows($query);


            ?>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row5 ?> รายการ</p>
                </div>
            </div>





            <div class="box_content_1">
                <div class="title-box1">
                    <p>ประวัติรับเข้าและเบิกออกวัสดุ</p>
                </div>
            </div>
            <?php
            $sql = "SELECT pick_in_out_logs_id, pick_in_out_val, pick_in_out_pel, pick_in_out_price, pick_in_out_sumval, pick_in_out_comment, pick_in_out_date, pick_in_out_note, pick_in_name, material_id,a.depart_id,depart_name,state_id 
            FROM pick_in_out_logs_tbl as a
            INNER JOIN depart_tbl as b
            ON a.depart_id = b.depart_id ORDER BY pick_in_out_logs_id DESC LIMIT 1
            ";
            $result = mysqli_query($conn, $sql);
            while ($row15 = mysqli_fetch_array($result)) {


            ?>
                <div class="box_content_1">
                    <div class="title-box2">
                         <?php if ($row15['state_id'] == 17) { ?>
                            <p style="color:green;">รับเข้า
                            <?php } ?>
                            <?php if ($row15['state_id'] == 18) { ?>
                                <p style="color:red;">เบิกออก
                            <?php } ?>
                         
                        วันที่: <?= $row15['pick_in_out_date'] ?></p>
                        <p>ชื่อรายการ: <?= $row15['pick_in_name'] ?> จำนวน: <?= $row15['pick_in_out_val'] ?></p>
                        <p>แผนก: <?= $row15['depart_name'] ?></p>
                        <p>ผู้ทำรายการ: <?= $row15['pick_in_out_pel'] ?></p>
                        <button class="btn-po">
                            คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                        </button>
                    </div>
                </div>
            <?php } ?>

            <?php 
            $sql = "SELECT * FROM pick_in_out_logs_tbl";
            $result = mysqli_query($conn, $sql);
            $row16 = mysqli_num_rows($result);
            ?>
            <div class="box_content_1">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row16 ?> รายการ</p>
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
            <?php
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
           FROM po_logs_tbl as a
           INNER JOIN po_tbl as b
           ON a.po_id = b.po_id
           INNER JOIN comp_contect_tbl as c
           ON b.comp_contect_id = c.comp_contect_id
           INNER JOIN order_tbl as d
           ON a.po_id = d.po_id
           WHERE a.state_id = 15 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);
            while ($row2 = mysqli_fetch_array($result)) {
            ?>
                <div class="box_content_2">
                    <div class="title-box2">
                        <p>เลขที่: <?= $row2['po_num'] ?> วันที่: <?= $row2['po_logs_date_record'] ?></p>
                        <p>บริษัท: <?= $row2['comp_contect_name'] ?></p>
                        <p>จำนวน: <?= $row2['order_queantity'] ?> รายการ</p>
                        <button class="btn-po">
                            คลิกที่นี่เพื่อดูรายละเอียด PO นี้
                        </button>
                    </div>
                </div>
            <?php } ?>
            <?php
            include 'php/connect_db.php';
            $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 15";
            $query = mysqli_query($conn, $sql2);
            $row3 = mysqli_num_rows($query);


            ?>
            <div class="box_content_2">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row3 ?> รายการ</p>
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
            $sql = "SELECT a.state_id,po_logs_date_record,a.po_id,po_num,b.comp_contect_id,comp_contect_name,d.order_id,order_queantity 
            FROM po_logs_tbl as a
            INNER JOIN po_tbl as b
            ON a.po_id = b.po_id
            INNER JOIN comp_contect_tbl as c
            ON b.comp_contect_id = c.comp_contect_id
            INNER JOIN order_tbl as d
            ON a.po_id = d.po_id
            WHERE a.state_id = 13 ORDER BY po_logs_id DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="box_content_3">';
                echo '  <div class="title-box2">';
                echo '     <p>เลขที่: PO ' . $row['po_num'] . ' วันที่: ' . $row['po_logs_date_record'] . '</p>';
                echo '     <p>บริษัท]: ' . $row['comp_contect_name'] . '</p>';
                echo '     <p>จำนวน: ' . $row['order_id'] . ' รายการ</p>';
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
                    $sql2 = "SELECT * FROM po_logs_tbl WHERE state_id = 13";
                    $query = mysqli_query($conn, $sql2);
                    $row2 = mysqli_num_rows($query);


                    ?>

                    <p>รายการทั้งหมด</p>
                    <p> <?= $row2 ?> : รายการ</p>
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
            <?php
            $sql = "SELECT * FROM material_tbl WHERE material_value < 5 LIMIT 6";
            $result = mysqli_query($conn, $sql);
            while ($row6 = mysqli_fetch_array($result)) {



            ?>
                <div class="box_content_4">
                    <div class="title-box2">
                        <p><?= $row6['material_name'] ?> จำนวนคงเหลือ : <?= $row6['material_value'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php
            $sql = "SELECT * FROM material_tbl WHERE material_value < 5";
            $result = mysqli_query($conn, $sql);
            $row7 = mysqli_num_rows($result);
            ?>
            <div class="box_content_4">
                <div class="title-box2">
                    <p>รายการทั้งหมด</p>
                    <p><?= $row7 ?> รายการ</p>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
}
?>