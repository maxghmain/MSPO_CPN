<!--Sticky Sidbar-->
<?php session_start() ?>

<div class="sidbar">
    <div class="box-pf">
        <div class="mm-sd">
            <div class="logo-pf">
                <img src="img/LogoEdit.png" width="70" heigth="auto" />
            </div>
        </div>
        <div style="position: sticky;">
            <div class="test-sd">
                <div class="test-sd1">
                    <img src="img/icon/1144760.png" style="width: 20px" height="20px" />
                    <h5>ชื่อผู้ใช้งาน</h5>
                </div>
            </div>
            <div class="test-sd">
                <div class="test-sd1">
                    <div class="p-text">
                        <p><?php echo $_SESSION['username']; ?></p>
                    </div>
                </div>
            </div>
            <div class="test-sd">
                <div class="test-sd1">
                    <img src="img/icon/1144760.png" style="width: 20px" height="20px" />
                    <h5>ชื่อ-สกุล</h5>
                </div>
            </div>
            <div class="test-sd">
                <div class="test-sd1">
                    <div class="p-text">
                        <p><?php echo $_SESSION['userdatafullname']; ?></p>
                    </div>
                </div>
            </div>
            <div class="test-sd">
                <div class="test-sd1">
                    <img src="img/icon/2984024.png" style="width: 20px" height="20px" />
                    <h5>ระดับผู้ใช้</h5>
                </div>
            </div>
            <div class="test-sd">
                <div class="test-sd1">
                    <div class="p-text">
                        <p style="font-size:12px;"><?php echo $_SESSION['rankname']; ?></p>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
    <div class="sidbar-manu">
        <?php
        if ($_SESSION['userlvid'] == '1') {
        ?>
            <!-- Sidebar ของ Admin -->
        <?php
        }
        if ($_SESSION['userlvid'] == '2') {
        ?>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?">หน้าแรก</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=afb_add_afb">เพิ่มใบขอซื้อ</a>
                </div>
            </div>

            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                    <a href="mif()spo_display.php?menu=history_afb">ประวัติใบขอซื้อ</a>
                </div>
            </div>
        <?php
        }
        if ($_SESSION['userlvid'] == '3') {
        ?>
            <!-- Sidebar ของ Purchase User -->
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/25694.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=dashboard">Dashboard</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="menu-item">
                    <div class="manu-text">
                        <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                        <a href="mspo_display.php?menu=afb_select_menu">ใบขอซื้อ</a>
                    </div>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=po_select_menu">สร้างและออก PO</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/709510.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=po_wait_conf">PO ที่รอการอนุมัติ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/709510.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=po_check_in">สถานะใบ PO</a>
                </div>
            </div>

            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/7387663.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=total_items">จำนวนวัสดุคงเหลือ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="">ประวัติรับเข้าและเบิกออกของวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=history_pick_in_out_in">รับเข้า</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=history_pick_in_out">เบิกออก</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=history_po_item">ประวัติ PO</a>
                </div>
            </div>
            
        <?php
        }
        if ($_SESSION['userlvid'] == '4') {
        ?>
            <!-- Sidebar ของ Store User -->
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/25694.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=dashboard">Dashboard</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/9177009.png" style="width: 20px" height="20px" />
                    <a>ตรวจรับวัสดุจาก PO</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=po_check_in">PO รอตรวจรับ</a>
                </div>
            </div>

            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=pick_in_out">เบิกออกวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/7387663.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=total_items">จำนวนวัสดุคงเหลือ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="">ประวัติรับเข้าและเบิกออกของวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=history_pick_in_out_in">รับเข้า</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=history_pick_in_out">เบิกออก</a>
                </div>
            </div>
        <?php
        }
        if ($_SESSION['userlvid'] == '5') { ?>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">หน้าแรก</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="mspo_display.php?menu=add_user">เพิ่มผู้ใช้ / ผู้ใช้ที่มีอยู่ในระบบ</a>
                </div>
            </div>
        <?php }
        ?>
        <br />
    </div>
</div>