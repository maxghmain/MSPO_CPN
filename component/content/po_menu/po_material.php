<?php
session_start();
include 'php/connect_db.php'
?>
<div class="container_title">
    <h5>สร้างและออกใบ PO - Create Oder PO / PO สำหรับวัสดุ</h5>
</div>
<style>
    #container-po-content {
        /* border : 1px solid red;*/
        width: 99.9%;
        height: auto;
    }

    #margin-po-container {
        border: 1px solid black;
        border-radius: 20px;
        margin: 10px;
    }

    #content-po {
        margin: 10px;
        display: flex;
    }

    #box-po {
        width: 50%;
        /*border: 1px solid red;*/
    }

    #butt-add-afb-po {
        padding: 5px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    #butt-add-afb-po:hover {
        padding: 5px;
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }
</style>
<!--Content-->
<div id="container-po-content">
    <div id="margin-po-container">
        <div id="content-po">
            <div id="box-po">
                <div id="box-po-1">
                    <p>เลขที่ออกใบ PO : PO <input type="number" id="po-number" placeholder="กรุณากรอก" /></p>
                </div>
                <div id="box-po-1">
                    <p>เลขที่ใบขอซื้อ : <strong>เลขที่</strong> <input type="text" id="po-number" placeholder="กรุณาเลือกใบขอซื้อ" readonly /> <strong>เล่มที่</strong> <input type="text" id="po-number" placeholder="กรุณาเลือกใบขอซื้อ" readonly /></p>
                </div>
                <div id="box-po-1">
                    <p>ผู้ขอซื้อ : <input type="text" id="po-afb" placeholder="กรุณากรอกชื่อผู้ขอซื้อ" readonly /> ผู้อนุมัติ : <input type="text" id="po-afb" placeholder="กรุณากรอกชื่อผู้ขอซื้อ" readonly /></p>
                </div>
            </div>
            <div id="box-po">
                <div id="box-po-1">
                    <p> บริษัทที่ติดต่อ : <a href="#" type="button" id="butt-add-afb-po">เพิ่มชื่อบริษัท</a></p>
                </div>

            </div>

        </div>
        <div>
        <a id="butt-add-afb-po">เพิ่มรายการวัสดุ</a>
        </div>
        
        <br>
        <div style="display: flex;justify-content: center;margin-bottom:20px;width:100%;">
            <div id="table_data_show_display" style="border:1px solid black;width:100%;">
                <table>
                    <thead>
                        <tr>
                            <td style="width: 2%;">
                                ลำดับ
                            </td>
                            <td style="width: 10%;">
                                ชื่อรายการไม่เป็นทางการ
                            </td>
                            <td style="width: 8%;">
                                ชื่อรายการเป็นทางการ
                            </td>
                            <td style="width: 7%;">
                                จำนวน
                            </td>
                            <td style="width: 20%;">
                                หมายเหตุ
                            </td>
                            <td style="width: 7%;">
                                <strong>แก้ไข</strong>
                            </td>
                            <td style="width: 7%;">
                                <strong>ลบ</strong>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'function/selectShowOrderAFB.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>