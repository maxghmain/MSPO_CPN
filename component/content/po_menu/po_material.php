<?php
session_start();
include 'php/connect_db.php'
?>
<div class="container_title">
    <h5>สร้างและออกใบ PO - Create Oder PO / PO สำหรับวัสดุ</h5>
    <div class="hee" >
        <a href="mspo_display.php?menu=po_material&state_excecut=save_print_po">บันทึก(PO)</a>
    </div>
</div>
<style>
    .hee{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 70%;
    }
    .hee a{
        padding: 5px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .hee a:hover{
        padding: 5px;
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }
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

    #box-po-2 {
        display: flex;
    }

    #table_data_show_display {
        display: block;
        /* border: 1px solid red;*/
        width: 95%;
        overflow: auto;
        height: 100%;
    }

    #table_data_show_display table {
        border-collapse: collapse;
        table-layout: fixed;
        width: 100%;
    }

    #table_data_show_display table thead {
        position: sticky;
        top: 0;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 1px;
        border: 1px solid rgb(0, 0, 0);
        background-color: #ffffff;
    }

    #table_data_show_display table thead th {
        border: 0.5px solid rgb(0, 0, 0);
    }

    #table_data_show_display table tr td {
        width: 100;
        border: 0.5px solid rgb(0, 0, 0);
        word-wrap: break-word;
        margin: 5px;
        padding: 5px;
        text-align: center;
    }

    #fuck {
        height: 170px;
        overflow: auto;
    }

    #comp_box {
        display: flex;
    }

    #width_comp {
        width: 100px;
    }
    #tried{
        cursor: pointer;
        background: #006ebc;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }
    .submit-price{
        cursor: pointer;
        background: #006ebc;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.2s;
    }
    .submit-price:hover{
        cursor: pointer;
        background: #014474;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }
    #tried-1{
        cursor: pointer;
        background: #fd464a;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }
    .edit-item-price{
        cursor: pointer;
        background: #fd464a;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.2s;
    }
    .edit-item-price:hover{
        cursor: pointer;
        background:rgb(128, 39, 39);
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }
    
</style>
<?php
$sql = "SELECT order_afb_id, name_ms_normal_name, name_ms_real_name, order_afb_value,c.unit_id,unit_name, order_afb_note,form_afb_number,form_afb_book_number,a.state_id,form_afb_write_date,form_afb_people_name,d.group_id
FROM order_afb_tbl as a 
INNER JOIN name_ms_tbl as b 
ON a.name_ms_id = b.name_ms_id 
INNER JOIN unit_tbl as c 
ON a.unit_id = c.unit_id 
INNER JOIN form_afb_tbl as d 
ON a.form_afb_id = d.form_afb_id
INNER JOIN group_tbl as g
ON d.group_id = g.group_id
WHERE order_afb_id = $po_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$order_afb_value = $row['order_afb_value'];
$form_afb_people_name = $row['form_afb_people_name'];
$group_id = $row['group_id'];
$form_afb_number = $row['form_afb_number'];
$form_afb_book_number = $row['form_afb_book_number'];
$order_afb_note = $row['order_afb_note'];
$name_ms_real_name = $row['name_ms_real_name'];
$order_afb_value = $row['order_afb_value'];
$unit_id = $row['unit_id'];
?>
<div id="container-po-content">
    <div id="margin-po-container">
        <div id="content-po">
            <div id="box-po">
                <div id="box-po-1">
                <div>
        <a id="butt-add-afb-po" href="mspo_display.php?menu=po_material&add_item=already_selected">เพิ่มรายการวัสดุ</a>(เพิ่มก่อนทุกครั้ง)
    </div>
                    <div id="box-po-2">
                        <p>เลขที่ออกใบ PO : PO <input type="number" id="po_number" value="<?php echo $_SESSION['po_number']; ?>" placeholder="กรุณากรอก" /></p>
                    </div>

                </div>
                <div id="box-po-1">
                    <?php
                    $sql = "SELECT DISTINCT  po_afb_num,po_afb_book_num FROM po_afb_tbl WHERE po_id = $po_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo ' <p>เลขที่ใบขอซื้อ :<strong>เล่มที่</strong> <input type="text" id="po-number" value="' . $row['po_afb_book_num'] . '" placeholder="กรุณาเลือกใบขอซื้อ" readonly /> <strong>เลขที่</strong> <input type="text" id="po-number" value="' . $row['po_afb_num'] . '" placeholder="กรุณาเลือกใบขอซื้อ" readonly />  </p>';
                    }
                    ?>

                </div>
                <div id="box-po-1">
                    <?php
                    $sql = "SELECT DISTINCT po_people_afb_name FROM po_people_afb_tbl WHERE po_id = $po_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row2 = mysqli_fetch_array($result)) {
                        echo '  <p>ผู้ขอซื้อ : <input type="text" id="po-afb" value="' . $row2['po_people_afb_name'] . '" placeholder="กรุณากรอกชื่อผู้ขอซื้อ" readonly /> </p>';
                    }
                    ?>

                </div>
            </div>
            <div id="box-po">
                <div id="box-po-1">
                    <p> บริษัทที่ติดต่อ : <a href="mspo_display.php?menu=po_material&add_company=already_selected" type="button" id="butt-add-afb-po">ค้นหารายชื่อบริษัทที่ติดต่อ</a>
                    <a href="mspo_display.php?menu=po_material&add_company_new=already_selected" type="button" id="butt-add-afb-po">เพิ่มบริษัทที่ติดต่อ</a>
                </p>
                    
                </div>
                <?php
                $sql = "SELECT a.comp_contect_id, comp_contect_name, comp_contect_loca_num, comp_contect_loca_moo, comp_contect_loca_road, comp_contect_loca_s_district, comp_contect_loca_district, comp_contect_loca_prov, comp_contect_loca_codepost, comp_contect_tel, comp_contect_fex, comp_contect_people_name, comp_contect_people_note 
                FROM po_tbl AS a
                INNER JOIN comp_contect_tbl as b
                ON a.comp_contect_id = b.comp_contect_id WHERE po_id = $po_id";
                $result3 = mysqli_query($conn, $sql);
                while ($row3 = mysqli_fetch_array($result3)) { ?>
                    <div id="comp_box">
                        <div id="width_comp">
                            ชื่อบริษัท
                        </div>
                        <div>
                            : <?= $row3['comp_contect_name'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                            ที่อยู่
                        </div>
                        <div>
                            : เลขที่ <?= $row3['comp_contect_loca_num'] ?> หมู่ <?= $row3['comp_contect_loca_moo'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                        </div>
                        <div>
                            : ถนน <?= $row3['comp_contect_loca_road'] ?> ตำบล <?= $row3['comp_contect_loca_s_district'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                        </div>
                        <div>
                            : อำเถอ <?= $row3['comp_contect_loca_district'] ?> จังหวัด <?= $row3['comp_contect_loca_prov'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                        </div>
                        <div>
                            : รหัสไปรษณี <?= $row3['comp_contect_loca_codepost'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                            ช่องทางติดต่อ
                        </div>
                        <div>
                            : เบอร์โทร <?= $row3['comp_contect_tel'] ?> FEX : <?= $row3['comp_contect_fex'] ?>
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                            ผู้ติดต่อ
                        </div>
                        <div>
                            : <input type="text" id="name_comp_con" value="<?php echo $_SESSION['name_comp_con']; ?>" placeholder="กรุณากรอก..." />
                        </div>
                    </div>
                    <div id="comp_box">
                        <div id="width_comp">
                            หมายเหตุ
                        </div>
                        <div>
                            : <input type="text" id="note_comp_con" value="<?php echo $_SESSION['note_comp_con']; ?>" placeholder="กรุณากรอก..." />
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>

    </div>
   


    <div style="display: flex;justify-content: center;margin-bottom:20px;width:100%;margin-top:10px">
        <div id="table_data_show_display" style="border:1px solid black;width:100%;">
            <div id="fuck">
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
                            <td style="width: 7%;">
                                <strong>ราคารวม</strong>
                            </td>
                            <td style="width: 20%;">
                                หมายเหตุ
                            </td>
                            <td style="width: 10%;">
                                เพิ่ม/แก้ไข ราคาสินค้า
                            </td>


                        </tr>

                    </thead>
                    <form action="component/content/po_menu/function/sum_price_item.php" method="GET">
                        <tbody>
                            <?php
                            $sql = "SELECT  order_id,order_detail,order_queantity,a.unit_id,unit_name,order_note,order_price,order_price_sum_all
 FROM order_tbl as a
 INNER JOIN unit_tbl as b
 ON a.unit_id = b.unit_id
 WHERE po_id = $po_id";
                            $query = mysqli_query($conn, $sql);
                            $count_data = 1;

                            while ($row8 = mysqli_fetch_array($query)) {


                                echo ' <tr>';

                                echo '   <td>';
                                echo $count_data;
                                echo '    </td>';
                                echo '    <td>';
                                echo     $row8['order_detail'];;
                                echo '   </td>';
                                echo '   <td>';
                                echo    $row8['order_detail'];
                                echo '    </td>';
                                echo '   <td>';
                                echo      $row8['order_queantity'];
                                echo '   </td>';
                                echo '    <td>';
                                echo       $row8['unit_name'];
                                echo '    </td>';
                                echo '    <td>';
                                echo '        <input type="number" id="item_price_'.$row8['order_id'].'" class="item-price" style="width:80px" value="'.$row8['order_price'].'" />';
                                echo '    </td>';
                                echo '    <td>';
                                echo      number_format($row8['order_price_sum_all']);
                                echo '    </td>';
                                echo '    <td>';
                                echo      $row8['order_note'];
                                echo '    </td>';
                                echo '    <td>';
                                echo '        <a href="#" class="submit-price" data-order-id="'.$row8['order_id'].'">เพิ่มราคา</a>';
                                echo '        <a href="#" class="edit-item-price" data-order-id="'.$row8['order_id'].'">แก้ไขราคา</a>';
                                echo '    </td>';
                                echo '  </tr>';



                                $count_data++;
                            }
                            $count_data = 1; ?>
                        </tbody>

                    </form>

                </table>

            </div>

        </div>

    </div>
    <div>
        <?php
        // connect to the database
        
        // query to get the total sum of order_price_sum_all
        $sql = "SELECT SUM(order_price_sum_all) AS total_price_sum FROM order_tbl WHERE po_id = $po_id";
        $result = mysqli_query($conn, $sql);
        
        // get the result as an array and retrieve the total price sum
        $row10 = mysqli_fetch_assoc($result);
        $totalPriceSum = $row10['total_price_sum'];
        $vat = $totalPriceSum * 7 / 100;
        $price_vat = $vat + $totalPriceSum ;
        ?>      
       
       <table style="width:25%;">
        <tr >
            <td style="text-align:left;width:45%;border:none;">
            มูลค่าสินค้า  
            </td>
             <td style="text-align:left;border:none;">
            : <?=number_format($totalPriceSum, 2)?>
            </td>
             <td style="text-align:left;border:none;">
            บาท
            </td>
        </tr>
        <tr>
             <td style="text-align:left;border:none;">
            ภาษีมูลค่าเพิ่ม 7%
            </td>
             <td style="text-align:left;border:none;">
            : <?= number_format($vat, 2)?>
            </td>
             <td style="text-align:left;border:none;">
            บาท
            </td>
        </tr>
        <tr>
             <td style="text-align:left;border:none;">
            รวมยอดทั้งสิ้น
            </td>
             <td style="text-align:left;border:none;">
            : <?= number_format($price_vat, 2)?>
            </td>
             <td style="text-align:left;border:none;">
            บาท
            </td>
        </tr>
       </table>
       
    </div>
</div>
<script>
   // JavaScript code
   var editButtons = document.querySelectorAll('.edit-item-price');
editButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var orderId = this.getAttribute('data-order-id');
        var inputField = document.getElementById('item_price_'+orderId);
        inputField.disabled = false;
        inputField.style.color = '#006ebc';
        inputField.focus();
        var submitButton = document.querySelector('.submit-price[data-order-id="'+orderId+'"]');
        submitButton.disabled = false;
    });
});

var submitButtons = document.querySelectorAll('.submit-price');
submitButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var orderId = this.getAttribute('data-order-id');
        var itemPrice = document.getElementById('item_price_'+orderId).value;
        submit_price(orderId, itemPrice);
        var inputField = document.getElementById('item_price_'+orderId);
        inputField.disabled = true;
        inputField.style.color = 'gray';
        var editButton = document.querySelector('.edit-item-price[data-order-id="'+orderId+'"]');
        editButton.disabled = false;
    });
});
function submit_price(orderId, itemPrice) {
    var xhr = new XMLHttpRequest();
    var url = 'mspo_display.php?menu=po_material&state_excecut=save_price_item';
    var params = 'order_id=' + encodeURIComponent(orderId) + '&item_price=' + encodeURIComponent(itemPrice);
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // handle the response from the server
            callback();
        }
    };
    xhr.send(params);
    window.location = '../../mspo_cpn/mspo_display.php?menu=po_material';
}
</script>
<?php mysqli_close($conn); ?>