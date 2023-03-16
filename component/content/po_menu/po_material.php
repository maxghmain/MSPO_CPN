<?php
session_start();

require_once 'php/connect_db.php';
// include composer autoload
require 'vendor/autoload.php';

// import the PhpSpreadsheet Class
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Set value binder
\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder(new \PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder());
//\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

$spreadsheet = new Spreadsheet(); // สร้าง speadsheet object
$sheet = $spreadsheet->getActiveSheet(); // กำหนดการทำงานที่่แผ่นงานปัจจุบัน

// แสดงข้อมูลทั้งหมดของตาราง tbl_excel1
// Query the database
$sql = "SELECT DISTINCT po_people_afb_name FROM po_people_afb_tbl WHERE po_id = $po_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$sql = "SELECT DISTINCT  po_afb_num,po_afb_book_num FROM po_afb_tbl WHERE po_id = $po_id";
$result1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($result1);

$sql = "SELECT a.comp_contect_id, comp_contect_name, comp_contect_loca_num, comp_contect_loca_moo, comp_contect_loca_road, comp_contect_loca_s_district, comp_contect_loca_district, comp_contect_loca_prov, comp_contect_loca_codepost, comp_contect_tel, comp_contect_fex, comp_contect_people_name, comp_contect_people_note
                FROM po_tbl AS a
                INNER JOIN comp_contect_tbl as b
                ON a.comp_contect_id = b.comp_contect_id WHERE po_id = $po_id";
$result3 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_array($result3);



$sql = "SELECT  order_id,a.order_afb_id,order_detail,order_queantity,a.unit_id,unit_name,order_note,order_price,order_price_sum_all,d.form_afb_id,form_afb_detail_work_for
FROM order_tbl as a
INNER JOIN unit_tbl as b
ON a.unit_id = b.unit_id
INNER JOIN order_afb_tbl as d
ON a.order_afb_id = d.order_afb_id
INNER JOIN form_afb_tbl as c
ON d.form_afb_id = c.form_afb_id
WHERE po_id = $po_id";
$query = mysqli_query($conn, $sql);

// Set the column headers
$sheet = $spreadsheet->createSheet();
$sheet->setTitle('PO');
$sheet->setCellValue('A1', 'บริษัท เอ็น เอส โคลด์ สโตเรจ จำกัด (สาขาที่ 1)');
$sheet->setCellValue('A2', 'ที่อยู่ 150/2 หมู่.3 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000');
$sheet->setCellValue('A3', 'โทร 074-336990-1');
$sheet->setCellValue('A4', 'เลขประจำตัวผู้เสียภาษี 9095545002547');
$sheet->setCellValue('A5', 'ใบสั่งซื้อ');
$sheet->setCellValue('A6', 'บริษัท' . ' ' . $row2['comp_contect_name']);
$sheet->setCellValue('H6', 'เลขที่' . ' ' . 'PO' . $_SESSION['po_number']);
$sheet->setCellValue('A7', 'ที่อยู่' . ' ' . $row2['comp_contect_loca_num'] . $row2['comp_contect_loca_moo'] . $row['comp_contect_loca_road'] . $row2['comp_contect_loca_s_district'] . $row2['comp_contect_loca_district'] . $row2['comp_contect_loca_prov'] . $row2['comp_contect_loca_codepost']);
$sheet->setCellValue('H7', 'วันที่' . ' ' . date("d/m/y"));
$sheet->setCellValue('A8', 'โทรศัพท์' . ' ' . $row2['comp_contect_tel']);
$sheet->setCellValue('A9', 'ผู้ติดต่อ' . '' . $row2['comp_contect_people_name']);
$sheet->setCellValue('A10', 'Form No.  FPC05/PPC01');
$sheet->setCellValue('D10', 'ผู้ขอซื้อ' . ' ' . $row['po_people_afb_name']);
$sheet->mergeCells('D10:E10');
$sheet->setCellValue('H10', 'ใบขอซื้อเลขที่' . ' ' . $row1['po_afb_num'] . '/' . $row1['po_afb_book_num']);
$sheet->setCellValue('A11', 'ฝ่ายจัดซื้อ');
$sheet->setCellValue('C11', 'ผู้จัดทำ สารินี สว่างจิต');
$sheet->setCellValue('D11', 'ผู้อนุมัติ ดาวใจ มณีสว่างวงศ์');
$sheet->setCellValue('F11', 'วันที่บังคับใช้');
$sheet->setCellValue('G11', '23/09/64');
$sheet->setCellValue('H11', 'พิมพ์ครั้งที่  5');



/* SET COLUM */
$sheet->getColumnDimension('B')->setWidth(1);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(13);
$sheet->getRowDimension('12')->setRowHeight(5);

/* mergeCell */
$sheet->mergeCells('A13:B13');
$sheet->mergeCells('A1:I1');
$sheet->mergeCells('H11:I11');
$sheet->mergeCells('A2:I2');
$sheet->mergeCells('A5:I5');
$sheet->mergeCells('A4:I4');
$sheet->mergeCells('A3:I3');
$sheet->mergeCells('A6:C6');
$sheet->mergeCells('H6:I6');
$sheet->mergeCells('A7:F7');
$sheet->mergeCells('H7:I7');
$sheet->mergeCells('A8:C8');
$sheet->mergeCells('A9:C9');
$sheet->mergeCells('A10:C10');
$sheet->mergeCells('A11:B11');
$sheet->mergeCells('D11:E11');
$sheet->mergeCells('C13:D13');


/*STYLE CELL*/
$sheet->getStyle('A5:I5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A3:I3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:I2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A4:I4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A11:B11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A11:B11')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('H11:I11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('H11:I11')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('G11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('D11:E11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('F11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('C11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$sheet->getStyle('A13:B13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A13:B13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('C13:D13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('C13:D13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('F13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('F13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('G13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('G13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('E13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('E13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('H13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('H13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('I13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('I13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1')->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A2')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A3')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A4')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A5')->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A6:I6')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A7:I7')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A8:I8')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A9:I9')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A10:I10')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A11:I11')->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A13:I13')->getFont()->setSize(14)->setName('AngsanaUPC');


/* HEADER NUM */
$sheet->setCellValue('A13', 'ลำดับที่');
$sheet->setCellValue('C13', 'รายการ');
$sheet->setCellValue('E13', 'ปริมาณสั่ง');
$sheet->setCellValue('F13', 'หน่วยนับ');
$sheet->setCellValue('G13', 'ราคา');
$sheet->setCellValue('H13', 'จำนวนเงิน');
$sheet->setCellValue('I13', 'ปริมาณรับ');

$row = 14;
$i_tem = 1;
while ($row_data = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $row, $i_tem);
    $sheet->getStyle('A' . $row . ':B' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->mergeCells('A' . $row . ':B' . $row);
    $sheet->setCellValue('C' . $row, $row_data['order_detail']);
    $sheet->getStyle('C' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('C' . $row . ':D' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('C' . $row . ':D' . $row);
    $sheet->setCellValue('E' . $row, $row_data['order_queantity']);
    $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('E' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('E' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->setCellValue('F' . $row, $row_data['unit_name']);
    $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('F' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('F' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->setCellValue('G' . $row, ($row_data['order_price']));
    $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('G' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('G' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->setCellValue('H' . $row, '=G' . $row . '*' . 'E' . $row);
    $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('H' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('H' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('I' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('I' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $row++;
    $row_section1 = $row;
    $i_tem++;
    $work_for = $row_data['form_afb_detail_work_for'];
}

$sql1 = "SELECT  order_id,a.order_afb_id,order_detail,order_queantity,a.unit_id,unit_name,order_note,order_price,order_price_sum_all,d.form_afb_id,form_afb_detail_work_for
FROM order_tbl as a
INNER JOIN unit_tbl as b
ON a.unit_id = b.unit_id
INNER JOIN order_afb_tbl as d
ON a.order_afb_id = d.order_afb_id
INNER JOIN form_afb_tbl as c
ON d.form_afb_id = c.form_afb_id
WHERE po_id = $po_id";
$query1 = mysqli_query($conn, $sql1);
$priceSum = 0;
while ($row5 = mysqli_fetch_array($query1)) {
    $priceSum += $row5['order_price_sum_all'];

}

$sheet->setCellValue('A' . $row, 'หมายเหตุ' . ' ' . $work_for);

$sheet->setCellValue('F' . $row, 'มูลค่าสินค้า');
$sheet->getStyle('F' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('F' . $row . ':G' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('F' . $row . ':G' . $row);

$sheet->setCellValue('H' . $row, $priceSum);
$sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('H' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('H' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('I' . $row)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('I' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$row2 = $row_section1 + 1;
$sheet->setCellValue('A' . $row2, 'กำหนดส่งมอบ.............................................');
$sheet->setCellValue('F' . $row2, 'ภาษีมูลค่าเพิ่ม 7%');
$sheet->getStyle('F' . $row2)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('F' . $row2 . ':G' . $row2)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);



$sheet->mergeCells('F' . $row2 . ':G' . $row2);

$sheet->setCellValue('H' . $row2,'=H'.$row.'*0.07');
$sheet->getStyle('H' . $row2)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('H' . $row2)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('H' . $row2)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$sheet->getStyle('I' . $row2)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('I' . $row2)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('I' . $row2)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$row_section2 = $row2;


$row3 = $row_section2 + 1;
$sheet->setCellValue('F' . $row3, 'ยอดรวมทั้งสิ้น');
$sheet->getStyle('F' . $row3)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('F' . $row3 . ':G' . $row3)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$sheet->mergeCells('F' . $row3 . ':G' . $row3);

$sheet->setCellValue('H' . $row3,'=SUM(H'.$row.':H'.$row2.')');
$sheet->getStyle('H' . $row3)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('H' . $row3)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('H' . $row3)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$sheet->getStyle('I' . $row3)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('I' . $row3)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('I' . $row3)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$row_section3 = $row3;




$row4 = $row_section3 +3;

$sheet->setCellValue('A' . $row4, 'ผู้จัดทำ……………………………………');
$sheet->getStyle('A' . $row4)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('A' . $row4 . ':C' . $row4);

$sheet->setCellValue('D' . $row4, 'ผู้สั่งซื้อ……………………………………');
$sheet->getStyle('D' . $row4)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('D' . $row4 . ':F' . $row4);

$sheet->setCellValue('G' . $row4, 'ผู้ตรวจสอบ……………………………………');
$sheet->getStyle('G' . $row4)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('G' . $row4 . ':I' . $row4);

$row_section4 = $row4;


$row5 =$row_section4 +1;
$sheet->setCellValue('A' . $row5, '(ภัสราพร  คงนิเวช)');
$sheet->getStyle('A' . $row5)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->getStyle('A' . $row5)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A' . $row5 . ':C' . $row5);

$sheet->setCellValue('D' . $row5, '             ( สารินี  สว่างจิต )');
$sheet->getStyle('D' . $row5)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('D' . $row5 . ':F' . $row5);

$sheet->setCellValue('G' . $row5, '             ( ดาวใจ  มณีสว่างวงศ์ )');
$sheet->getStyle('G' . $row5)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('G' . $row5 . ':I' . $row5);

$row_section5 = $row5;

$row6 = $row_section5 +3;

$sheet->setCellValue('A' . $row6, 'ผู้รับสินค้า………………………………วันที่………………………');
$sheet->getStyle('A' . $row6)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('A' . $row6 . ':D' . $row6);

$sheet->setCellValue('G' . $row6, 'ผู้อนุมัติ…………………………………………………………');
$sheet->getStyle('G' . $row6)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('G' . $row6 . ':I' . $row6);

$row_section6 = $row6;

$row7 =$row_section6+1;
$sheet->setCellValue('G' . $row7, '              ( คุณณัฐวิช  ศรีพิทักษ์ )');
$sheet->getStyle('G' . $row7)->getFont()->setSize(14)->setName('AngsanaUPC');
$sheet->mergeCells('G' . $row7 . ':I' . $row7);



// Fill in the data to the sheet
$writer = new Xlsx($spreadsheet);
$output_file = "PO-" . date("dmY") . ".xlsx";
$writer->save($output_file);



?>
<div class="container_title">
    <h5>สร้างและออกใบ PO - Create Oder PO / PO สำหรับวัสดุ</h5>
    <div class="hee">
        
        <?php
        if (file_exists($output_file)) {
    echo '<a href="#" onclick="saveAs(\'' . $output_file . '\');">บันทึกใบPO(EXCEL)</a>';
    
}

    ?>


    </div>

</div>

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
    <div id="margin-po-container" class="noprint">
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
                            : <?php if ($row3['comp_contect_people_name'] != "") {
                                    echo $row3['comp_contect_people_name'];
                                } else {
                                    echo $_SESSION['name_comp_con'];
                                } ?>
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
                                echo '        <input type="number" id="item_price_' . $row8['order_id'] . '" class="item-price" style="width:80px" value="' . $row8['order_price'] . '" />';
                                echo '    </td>';
                                echo '    <td>';
                                echo      number_format($row8['order_price_sum_all'], 2);
                                echo '    </td>';
                                echo '    <td>';
                                echo      $row8['order_note'];
                                echo '    </td>';
                                echo '    <td>';
                                echo '        <a href="#" class="submit-price" data-order-id="' . $row8['order_id'] . '">เพิ่มราคา</a>';
                                echo '        <a href="#" class="edit-item-price" data-order-id="' . $row8['order_id'] . '">แก้ไขราคา</a>';
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
        $price_vat = $vat + $totalPriceSum;
        ?>

        <table style="width:25%;">
            <tr>
                <td style="text-align:left;width:45%;border:none;">
                    มูลค่าสินค้า
                </td>
                <td style="text-align:left;border:none;">
                    : <?= number_format($totalPriceSum, 2) ?>
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
                    : <?= number_format($vat, 2) ?>
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
                    : <?= number_format($price_vat, 2) ?>
                </td>
                <td style="text-align:left;border:none;">
                    บาท
                </td>
            </tr>
        </table>

    </div>
    <div>
    </div>
</div>
<script>
    // JavaScript code
    var editButtons = document.querySelectorAll('.edit-item-price');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var orderId = this.getAttribute('data-order-id');
            var inputField = document.getElementById('item_price_' + orderId);
            inputField.disabled = false;
            inputField.style.color = '#006ebc';
            inputField.focus();
            var submitButton = document.querySelector('.submit-price[data-order-id="' + orderId + '"]');
            submitButton.disabled = false;
        });
    });

    var submitButtons = document.querySelectorAll('.submit-price');
    submitButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var orderId = this.getAttribute('data-order-id');
            var itemPrice = document.getElementById('item_price_' + orderId).value;
            submit_price(orderId, itemPrice);
            var inputField = document.getElementById('item_price_' + orderId);
            inputField.disabled = true;
            inputField.style.color = 'gray';
            var editButton = document.querySelector('.edit-item-price[data-order-id="' + orderId + '"]');
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

    function saveAs(file) {
        var link = document.createElement('a');
        link.href = file;
        link.download = file;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        window.location = "mspo_display.php?menu=po_material&state_excecut=save_print_po";
    }
</script>
<style>
    .hee {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 70%;
    }

    .hee a {
        padding: 5px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .hee a:hover {
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

    #tried {
        cursor: pointer;
        background: #006ebc;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }

    .submit-price {
        cursor: pointer;
        background: #006ebc;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.2s;
    }

    .submit-price:hover {
        cursor: pointer;
        background: #014474;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }

    #tried-1 {
        cursor: pointer;
        background: #fd464a;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }

    .edit-item-price {
        cursor: pointer;
        background: #fd464a;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.2s;
    }

    .edit-item-price:hover {
        cursor: pointer;
        background: rgb(128, 39, 39);
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }

    @media print {
        @media print {
            .noprint {
                visibility: hidden;
            }

        }
    }

    @media screen {
        .printOption {
            display: none;
        }
    }
</style>
<?php mysqli_close($conn); ?>