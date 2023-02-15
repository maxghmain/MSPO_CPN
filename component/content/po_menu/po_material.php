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
    #box-po-2{
        display: flex;
    }
</style>
<?php
$sql = "SELECT order_afb_id, name_ms_normal_name, name_ms_real_name, order_afb_value,c.unit_id,unit_name, order_afb_note,form_afb_number,form_afb_book_number,a.state_id,form_afb_write_date,form_afb_people_name
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b 
ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c 
ON a.unit_id = c.unit_id 
INNER JOIN form_afb_tbl as d 
ON a.form_afb_id = d.form_afb_id
WHERE order_afb_id = $item_Number_select";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$name_ms_real_name = $row['name_ms_real_name'];
$order_afb_value = $row['order_afb_value'];
$unit_id = $row['unit_id'];
?>
<div id="container-po-content">
    <div id="margin-po-container">
        <div id="content-po">
            <div id="box-po">
                <div id="box-po-1">
                    <div id="box-po-2">
                    <p>เลขที่ออกใบ PO : PO <input type="number" id="po-number" placeholder="กรุณากรอก" /></p>
                    </div>
                    
                </div>
                <div id="box-po-1">
                    <p>เลขที่ใบขอซื้อ : <strong>เลขที่</strong> <input type="text" id="po-number" value="<?php echo $row['form_afb_number'] ?>" placeholder="กรุณาเลือกใบขอซื้อ" readonly /> <strong>เล่มที่</strong> <input type="text" id="po-number" value="<?php echo $row['form_afb_book_number'] ?>" placeholder="กรุณาเลือกใบขอซื้อ" readonly /></p>
                </div>
                <div id="box-po-1">
                    <p>ผู้ขอซื้อ : <input type="text" id="po-afb" value="<?php echo $row['form_afb_people_name'] ?>" placeholder="กรุณากรอกชื่อผู้ขอซื้อ" readonly /> </p>
                </div>
            </div>
            <div id="box-po">
                <div id="box-po-1">
                    <p> บริษัทที่ติดต่อ : <a href="#" type="button" id="butt-add-afb-po">เพิ่มชื่อบริษัท</a></p>
                </div>

            </div>

        </div>
        <div>
        <a id="butt-add-afb-po" href="mspo_display.php?menu=po_material&add_item=already_selected">เพิ่มรายการวัสดุ</a>
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
                                <strong>ปริมาณสั่ง</strong>
                            </td>
                            <td style="width: 7%;">
                                <strong>หน่วยนับ</strong>
                            </td>
                            <td style="width: 7%;">
                                <strong>ราคา</strong>
                            </td>
                            <td style="width: 20%;">
                                หมายเหตุ
                            </td>
                           

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'function/selectShowOrderAFBpo.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>