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
                    <p>รายการ PO ที่ยังไม่ได้ตรวจรับ</p>
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
if ($_SESSION['userlvid'] == '4') {
    /* Dashboard สำหรับ store_user */
?>
    <div class="container_title">
        <h5>กระดานสรุปข้อมูล - Dashboard</h5>
    </div>
<?php
}
?>