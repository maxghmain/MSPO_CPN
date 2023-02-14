<!--Sticky Sidbar-->

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
            <!-- Sidebar ของ Normal User -->
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
                    <a href="#">PO ที่รอตรวจ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/709510.png" style="width: 20px" height="20px" />
                    <a href="#">PO ที่ตรวจรับแล้วแต่ยังไม่สมบูรณ์</a>
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
                    <a href="#">ประวัติรับเข้าและเบิกออกของวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">ประวัติ PO</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">PO วัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">PO บริการ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">สร้างรายงาน / ออกรายงาน (Report)</a>
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
                    <a href="../Store/index.php">Dashboard</a>
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
                    <a href="../Store/po-wait.php">PO รอตรวจรับ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text" style="margin-left: 40px">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">PO ตรวจรับยังไม่สมบูรณ์</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="../Store/pick-u-material.php">เบิกออกวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/7387663.png" style="width: 20px" height="20px" />
                    <a href="../Store/วัสดุคงเหลือ.php">จำนวนวัสดุคงเหลือ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="../Store/history.php">ประวัติรับเข้าและเบิกออกของวัสดุ</a>
                </div>
            </div>
            <div class="manu-list">
                <div class="manu-text">
                    <img src="img/icon/951971.png" style="width: 20px" height="20px" />
                    <a href="#">สร้างรายงาน / ออกรายงาน (Report)</a>
                </div>
            </div>
        <?php
        }
        ?>
        <br />
    </div>
</div>