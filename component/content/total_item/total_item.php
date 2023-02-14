<?php
session_start();
include 'php/connect_db.php'
?>
<div class="container_title">
    <h5>จำนวนวัสดุคงเหลือ - Total Items</h5>
</div>
<?php

session_start();
include '../connect.php';
if (!$_SESSION['username']) {
    header("Location: index.php");
} else {


    function page_navi($before_p, $plus_p, $total, $total_p, $chk_page)
    {
        global $urlquery_str;
        $pPrev = $chk_page - 1;
        $pPrev = ($pPrev >= 0) ? $pPrev : 0;
        $pNext = $chk_page + 1;
        $pNext = ($pNext >= $total_p) ? $total_p - 1 : $pNext;

        $lt_page = $total_p - 4;
        if ($chk_page > 0) {
            echo "<a  href='$urlquery_str" . "pages=" . intval($pPrev + 1) . "' class='naviPN'>ย้อนกลับ</a>";
        }
        if ($total_p >= 11) {
            if ($chk_page >= 4) {
                echo "<a href='$urlquery_str" . "pages=1'>1</a><a class='SpaceC'>. . .</a>";
            }
            if ($chk_page < 4) {
                for ($i = 0; $i < $total_p; $i++) {
                    $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
                    if ($i <= 4) {
                        echo "<a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                    }
                    if ($i == $total_p - 1) {
                        echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                    }
                }
            }
            if ($chk_page >= 4 && $chk_page < $lt_page) {
                $st_page = $chk_page - 3;
                for ($i = 1; $i <= 5; $i++) {
                    $nClass = ($chk_page == ($st_page + $i)) ? "class='selectPage'" : "";
                    echo "<a $nClass href='$urlquery_str" . "pages=" . intval($st_page + $i + 1) . "'>" . intval($st_page + $i + 1) . "</a> ";
                }
                for ($i = 0; $i < $total_p; $i++) {
                    if ($i == $total_p - 1) {
                        $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
                        echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                    }
                }
            }
            if ($chk_page >= $lt_page) {
                for ($i = 0; $i <= 4; $i++) {
                    $nClass = ($chk_page == ($lt_page + $i - 1)) ? "class='selectPage'" : "";
                    echo "<a $nClass href='$urlquery_str" . "pages=" . intval($lt_page + $i) . "'>" . intval($lt_page + $i) . "</a> ";
                }
            }
        } else {
            for ($i = 0; $i < $total_p; $i++) {
                $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
                echo "<a href='$urlquery_str" . "pages=" . intval($i + 1) . "' $nClass  >" . intval($i + 1) . "</a> ";
            }
        }
        if ($chk_page < $total_p - 1) {
            echo "<a href='$urlquery_str" . "pages=" . intval($pNext + 1) . "'  class='naviPN'>ถัดไป</a>";
        }
    }

?>
    <div class="container_box1">
        <div class="container_box_h1">
            <div class="bg-item">
                <div class="tbl_item">
                    <div style="margin:auto;text-align:left;width:100%;">
                        <!--ส่วนสร้างฟอร์ม สำหรับค้นหา -->
                        <form id="form_search" name="form_search" method="get" action="">
                            <input stype="margin:10px;" type="text" name="keyword" id="keyword" autofocus="autofocus" />
                            <input type="submit" class="myBtn" name="button" id="button" value="ค้นหา" />
                        </form>
                        <table style="border:none;">
                            <tr>
                                <td align="left" style="border:none;">
                                    <table width="100%" border="1" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อวัสดุ</th>
                                            <th>จำนวน</th>
                                            <th>หน่วยนับ</th>
                                            <th>ประเภท</th>
                                            <th>เก็บไว้ชั้นที่</th>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        $q = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,material_type_name,material_class_shelf_name FROM material_tbl as a
                            INNER JOIN material_type_tbl as b
                            ON a.material_type_id = b.material_type_id
                            INNER JOIN unit_tbl as c
                            ON a.unit_id = c.unit_id 
                            INNER JOIN material_class_shelf_tbl as d
                            ON a.material_class_shelf_id = d.material_class_shelf_id";
                                        // เงื่อนไขการค้นหา ถ้ามีการส่งค่า ตัวแปร $_GET['keyword'] 
                                        if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
                                            // ต่อคำสั่ง sql 
                                            $q .= " AND material_name LIKE '%" . trim($_GET['keyword']) . "%' ";
                                        }
                                        $qr = @mysqli_query($conn, $q);

                                        $total = @mysqli_num_rows($qr);
                                        $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                                        if (!isset($_GET['pages'])) {
                                            $_GET['pages'] = 0;
                                        } else {
                                            $_GET['pages'] = $_GET['pages'] - 1;
                                            if ($_GET['pages'] < 0) {
                                                $_GET['pages'] = 0;
                                            }
                                            $chk_page = $_GET['pages'];
                                            $_GET['pages'] = $_GET['pages'] * $e_page;
                                        }
                                        $q .= " ORDER BY material_id DESC  LIMIT " . $_GET['pages'] . ",$e_page";

                                        $qr = @mysqli_query($conn, $q);
                                        if (@mysqli_num_rows($qr) >= 1) {
                                            $plus_p = ($chk_page * $e_page) + @mysqli_num_rows($qr);
                                        } else {
                                            $plus_p = ($chk_page * $e_page);
                                        }
                                        $total_p = ceil($total / $e_page);
                                        $before_p = ($chk_page * $e_page) + 1;
                                        /// END PAGE NAVI ZONE          
                                        while ($rs = @mysqli_fetch_array($qr)) {
                                        ?>
                                            <tr>
                                                <td width="60" height="20" align="center"><?= (($e_page * $chk_page) + $i) ?></td>
                                                <td height="20">&nbsp;<?= $rs['material_name'] ?></td>
                                                <td height="20">&nbsp;<?= $rs['material_value'] ?></td>
                                                <td height="20">&nbsp;<?= $rs['unit_name'] ?></td>
                                                <td height="20">&nbsp;<?= $rs['material_type_name'] ?></td>
                                                <td height="20">&nbsp;<?= $rs['material_class_shelf_name'] ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>

                                    </table>

                                    <br />

                                </td>
                            </tr>



                            <tr>
                                <td align="left" style="border:none;">


                                    <div style="margin:auto;width:100%;">
                                        <?php if ($total > 10) { ?>
                                            <div class="browse_page">
                                                <?php
                                                if (count($_GET) <= 1) {
                                                    $urlquery_str = "?";
                                                } else {
                                                    $para_get = "";
                                                    foreach ($_GET as $key => $value) {
                                                        if ($key != "pages") {
                                                            $para_get .= $key . "=" . $value . "&";
                                                        }
                                                    }
                                                    $urlquery_str = "?$para_get";
                                                }
                                                // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า      
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </td>
                            </tr>
                            </thead>
                            <div class="total_list" style="text-aling:center;"><span>จำนวนรายการทั้งหมด : <strong> <?php echo $total ?> </strong>รายการ</span></div>
                            <tfoot>

                                <tr>
                                    <td align="left" style="border:none;">

                                        <div style="margin:auto;width:100%;">
                                            <?php if ($total > 10) { ?>
                                                <div class="browse_page">
                                                    <?php
                                                    // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า      
                                                    page_navi($before_p, $plus_p, $total, $total_p, $chk_page);
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } ?>