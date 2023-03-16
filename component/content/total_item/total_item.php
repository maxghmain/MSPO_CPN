<?php
session_start();
require_once 'php/connect_db.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet = $spreadsheet->createSheet();


// Set the print header rows to be repeated
$sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(5,6);


$sheet->setTitle('STORE');
$sheet->setCellValue('C1', 'From No. FPC05/PPC02');
$sheet->setCellValue('G1', 'พิมพ์ครั้งที่  1');
$sheet->setCellValue('C2', 'เรื่อง  ใบรายงานการตรวจนับสต๊อกประจำเดือน');
$sheet->setCellValue('G2', 'วันที่บังคับใช้  20/03/50');
$sheet->setCellValue('A3', 'ฝ่ายจัดซื้อ');
$sheet->setCellValue('C3', 'ผู้จัดทำ ดาวใจ  กาลานุสนธ์');
$sheet->setCellValue('E3', 'ผู้อนุมัติ ดาวใจ  กาลานุสนธ์');
$sheet->setCellValue('G3', 'หน้าที่');
$sheet->setCellValue('A4', 'ประจำเดือน');
$sheet->setCellValue('G4', 'วันที่');
$sheet->setCellValue('A5', 'ลำดับที่');
$sheet->setCellValue('B5', 'ยอดคงเหลือตามสต๊อกการ์ด');
$sheet->setCellValue('E5', 'ตรวจนับจริง');
$sheet->setCellValue('G5', 'หมายเหตุ');
$sheet->setCellValue('B6', 'รายการ');
$sheet->setCellValue('D6', 'จำนวน');
$sheet->setCellValue('E6', 'ถูกต้อง');
$sheet->setCellValue('F6', 'ไม่ถูกต้อง');
$sheet->setCellValue('A7', 'วัสดุ/อะไหล่ (ซ่อมบำรุง)');
$sheet->setCellValue('A8', 'ชั้นที่1');




/* MEGCELL*/
$sheet->mergeCells('C1:F1');
$sheet->mergeCells('G1:H1');
$sheet->mergeCells('G2:H2');
$sheet->mergeCells('G3:H3');
$sheet->mergeCells('C2:F2');
$sheet->mergeCells('A3:B3');
$sheet->mergeCells('C3:D3');
$sheet->mergeCells('E3:F3');
$sheet->mergeCells('A4:B4');
$sheet->mergeCells('G4:H4');
$sheet->mergeCells('A5:A6');
$sheet->mergeCells('B5:D5');
$sheet->mergeCells('E5:F5');
$sheet->mergeCells('G5:H6');
$sheet->mergeCells('B6:C6');
$sheet->mergeCells('C4:F4');
$sheet->mergeCells('A7:H7');
$sheet->mergeCells('A8:H8');

/* STYLE */
$sheet->getStyle('C1:F1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('G1:H1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('G2:H2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('G3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('C2:F2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A3:B3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('C3:D3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('E3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A5:A6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('B5:D5')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('E5:F5')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('G5:H6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('B6:C6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('E6:F6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('D6:E6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A7:H7')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getStyle('A8:H8')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->getColumnDimension('C')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(25);
$sheet->getColumnDimension('H')->setWidth(12);
$sheet->getColumnDimension('B')->setWidth(10);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getStyle('A3:B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('G4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A4:B4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B5:D5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('E5:F5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B6:C6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A5:A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('G5:H6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A7:H7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A8:H8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A7')->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A8')->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);

$sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name,a.material_class_shelf_id FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 1 AND a.material_class_shelf_id = 1";
$result1 = mysqli_query($conn, $sql);
$num_rows1 = mysqli_num_rows($result1);
$rowstart=9;
$row = 9;
$i_tem = 1;
if($num_rows1 >0){
    while ($row_data = mysqli_fetch_array($result1)) {
        $sheet->setCellValue('A' . $row, $i_tem);
        $sheet->setCellValue('B' . $row, $row_data['material_name']);
        $sheet->setCellValue('D' . $row, $row_data['material_value']);
        $sheet->getStyle('A'.$row.':H'.$row)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row.':H'.$row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row.':C'.$row);
        $sheet->getStyle('A'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row++;
        $i_tem++;
        $rowSection1 = $row;
    }
}else{
    $sheet->setCellValue('B' . $row,'ไม่มีข้อมูล');
    $row++;
    $i_tem++;
    $rowSection1 = $row;
}


$row2 = $rowSection1;
$sheet->setCellValue('A'.$row2,'ชั้นที่2');
$sheet->getStyle('A'.$row2)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row2.':H'.$row2)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row2.':H'.$row2);
$sheet->getStyle('A'.$row2.':H'.$row2)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection2 = $row2;
$sql2 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 1 AND a.material_class_shelf_id = 2";
$result2 = mysqli_query($conn, $sql2);
$num_rows2 = mysqli_num_rows($result2);

$row3 = $rowSection2+1;
$i_tem2 =1;

if($num_rows2 > 0){
    while($row_data2 = mysqli_fetch_array($result2)){
        $sheet->setCellValue('A' . $row3, $i_tem2);
        $sheet->setCellValue('B' . $row3, $row_data2['material_name']);
        $sheet->setCellValue('D' . $row3, $row_data2['material_value']);
        $sheet->getStyle('A'.$row3.':H'.$row3)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row3.':H'.$row3)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row3.':C'.$row3);
        $sheet->getStyle('A'.$row3)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row3)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row3++;
        $i_tem2++;
        $rowSection3 = $row3;
    }
}else{
    $sheet->setCellValue('B' . $row3,'ไม่มีข้อมูล');
    $row3++;
        $i_tem2++;
        $rowSection3 = $row3;
}



$row4 = $rowSection3;
$sheet->setCellValue('A'.$row4,'ชั้นที่3');
$sheet->getStyle('A'.$row4)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row4.':H'.$row4)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row4.':H'.$row4);
$sheet->getStyle('A'.$row4.':H'.$row4)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection4 = $row4;

$sql3 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 1 AND a.material_class_shelf_id = 3";

$result3 = mysqli_query($conn, $sql3);
$num_rows3 = mysqli_num_rows($result3);
$row5 = $rowSection4+1;
$i_tem3 =1;

if($num_rows3 > 0){
    while($row_data3=mysqli_fetch_array($result3)){
        $sheet->setCellValue('A' . $row5, $i_tem3);
        $sheet->setCellValue('B' . $row5, $row_data3['material_name']);
        $sheet->setCellValue('D' . $row5, $row_data3['material_value']);
        $sheet->getStyle('A'.$row5.':H'.$row5)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row5.':H'.$row5)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row5.':C'.$row5);
        $sheet->getStyle('A'.$row5)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row5)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row5++;
        $i_tem3++;
        $rowSection5 = $row5;
    }
}else{
    $sheet->setCellValue('B' . $row5,'ไม่มีข้อมูล');
    $row5++;
    $i_tem3++;
    $rowSection5 = $row5;
}


$row6 = $rowSection5;
$sheet->setCellValue('A'.$row6,'วัสดุ/อะไหล่ (ไฟฟ้า)');
$sheet->getStyle('A'.$row6)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row6.':H'.$row6)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row6.':H'.$row6);
$sheet->getStyle('A'.$row6.':H'.$row6)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection6 = $row6;

$row7 = $rowSection6+1;
$sheet->setCellValue('A'.$row7,'ชั้นที่1');
$sheet->getStyle('A'.$row7)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row7.':H'.$row7)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row7.':H'.$row7);
$sheet->getStyle('A'.$row7.':H'.$row7)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection7 = $row7;

$row8 = $rowSection7 +1 ;
$sql4 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 2 AND a.material_class_shelf_id = 1";

$result4 = mysqli_query($conn, $sql4);
$num_rows4 = mysqli_num_rows($result4);
$i_tem4 =1;

if($num_rows4 > 0){
    while($row_data4=mysqli_fetch_array($result4)){
        $sheet->setCellValue('A' . $row8, $i_tem4);
        $sheet->setCellValue('B' . $row8, $row_data4['material_name']);
        $sheet->setCellValue('D' . $row8, $row_data4['material_value']);
        $sheet->getStyle('A'.$row8.':H'.$row8)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row8.':H'.$row8)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row8.':C'.$row8);
        $sheet->getStyle('A'.$row8)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row8)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row8++;
        $i_tem4++;
        $rowSection8 = $row8;
    }
}else{
    $sheet->setCellValue('B' . $row8,'ไม่มีข้อมูล');
    $row8++;
    $i_tem4++;
    $rowSection8 = $row8;
}


$row9 = $rowSection8;
$sheet->setCellValue('A'.$row9,'ชั้นที่2');
$sheet->getStyle('A'.$row9)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row9.':H'.$row9)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row9.':H'.$row9);
$sheet->getStyle('A'.$row9.':H'.$row9)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection9 = $row9;

$row10 = $rowSection9+1;
$sql5 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 2 AND a.material_class_shelf_id = 2";

$result5 = mysqli_query($conn, $sql5);
$num_rows5 = mysqli_num_rows($result5);
$i_tem5 =1;

if($num_rows5 > 0){
    while($row_data5=mysqli_fetch_array($result5)){
        $sheet->setCellValue('A' . $row10, $i_tem5);
        $sheet->setCellValue('B' . $row10, $row_data5['material_name']);
        $sheet->setCellValue('D' . $row10, $row_data5['material_value']);
        $sheet->getStyle('A'.$row10.':H'.$row10)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row10.':H'.$row10)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row10.':C'.$row10);
        $sheet->getStyle('A'.$row10)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row10)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row10++;
        $i_tem5++;
        $rowSection10 = $row10;
    }
}else{
    $sheet->setCellValue('B' . $row10,'ไม่มีข้อมูล');
    $row10++;
        $i_tem5++;
        $rowSection10 = $row10;
}


$row11 = $rowSection10;
$sheet->setCellValue('A'.$row11,'ชั้นที่3');
$sheet->getStyle('A'.$row11)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row11.':H'.$row11)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row11.':H'.$row11);
$sheet->getStyle('A'.$row11.':H'.$row11)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection11 = $row11;

$row12 = $rowSection11+1;
$sql6 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 2 AND a.material_class_shelf_id = 3";

$result6 = mysqli_query($conn, $sql6);
$num_rows6 = mysqli_num_rows($result6);
$i_tem6 =1;
if($num_rows6 > 0){
    while($row_data6=mysqli_fetch_array($result6)){
        $sheet->setCellValue('A' . $row12, $i_tem6);
        $sheet->setCellValue('B' . $row12, $row_data6['material_name']);
        $sheet->setCellValue('D' . $row12, $row_data6['material_value']);
        $sheet->getStyle('A'.$row12.':H'.$row12)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row12.':H'.$row12)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row12.':C'.$row12);
        $sheet->getStyle('A'.$row12)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row12)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row12++;
        $i_tem6++;
        $rowSection12 = $row12;
    } 
}else{
    $sheet->setCellValue('B' . $row12,'ไม่มีข้อมูล');
    $row12++;
    $i_tem6++;
    $rowSection12 = $row12;
}

$row13 = $rowSection12;
$sheet->setCellValue('A'.$row13,'สารเคมี');
$sheet->getStyle('A'.$row13)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row13.':H'.$row13)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row13.':H'.$row13);
$sheet->getStyle('A'.$row13.':H'.$row13)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection13 = $row13;

$row14 = $rowSection13+1;
$sheet->setCellValue('A'.$row14,'ชั้นที่1');
$sheet->getStyle('A'.$row14)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row14.':H'.$row14)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row14.':H'.$row14);
$sheet->getStyle('A'.$row14.':H'.$row14)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection14 = $row14;

$row15 = $rowSection14+1;
$sql7 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 3 AND a.material_class_shelf_id = 1";

$result7 = mysqli_query($conn, $sql7);
$num_rows7 = mysqli_num_rows($result7);
$i_tem7 =1;
if($num_rows7 > 0){
    while($row_data7=mysqli_fetch_array($result7)){
        $sheet->setCellValue('A' . $row15, $i_tem7);
        $sheet->setCellValue('B' . $row15, $row_data7['material_name']);
        $sheet->setCellValue('D' . $row15, $row_data7['material_value']);
        $sheet->getStyle('A'.$row15.':H'.$row15)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row15.':H'.$row15)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row15.':C'.$row15);
        $sheet->getStyle('A'.$row15)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row15)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row15++;
        $i_tem7++;
        $rowSection15 = $row15;
    }
}else{
    $sheet->setCellValue('B' . $row15,'ไม่มีข้อมูล');
    $row15++;
    $i_tem7++;
    $rowSection15 = $row15;
}


$row16 = $rowSection15;
$sheet->setCellValue('A'.$row16,'ชั้นที่2');
$sheet->getStyle('A'.$row16)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row16.':H'.$row16)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row16.':H'.$row16);
$sheet->getStyle('A'.$row16.':H'.$row16)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection16 = $row16;

$row17 = $rowSection16+1;
$sql8 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 3 AND a.material_class_shelf_id = 2";

$result8 = mysqli_query($conn, $sql8);
$num_rows8 = mysqli_num_rows($result8);
$i_tem8 =1;
if($num_rows8 > 0){
    while($row_data8=mysqli_fetch_array($result8)){
        $sheet->setCellValue('A' . $row17, $i_tem8);
        $sheet->setCellValue('B' . $row17, $row_data8['material_name']);
        $sheet->setCellValue('D' . $row17, $row_data8['material_value']);
        $sheet->getStyle('A'.$row17.':H'.$row17)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row17.':H'.$row17)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row17.':C'.$row17);
        $sheet->getStyle('A'.$row17)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row17)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row17++;
        $i_tem8++;
        $rowSection17 = $row17;
    }
}else{
    $sheet->setCellValue('B' . $row17,'ไม่มีข้อมูล');
    $row17++;
    $i_tem8++;
    $rowSection17 = $row17;
}


$row18 = $rowSection17;
$sheet->setCellValue('A'.$row18,'ชั้นที่3');
$sheet->getStyle('A'.$row18)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row18.':H'.$row18)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row18.':H'.$row18);
$sheet->getStyle('A'.$row18.':H'.$row18)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection18 = $row18;

$row19 = $rowSection18+1;
$sql9 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 3 AND a.material_class_shelf_id = 3";

$result9 = mysqli_query($conn, $sql9);
$num_rows9 = mysqli_num_rows($result9);
$i_tem9 =1;
if($num_rows9 > 0){
    while($row_data9=mysqli_fetch_array($result9)){
        $sheet->setCellValue('A' . $row19, $i_tem9);
        $sheet->setCellValue('B' . $row19, $row_data9['material_name']);
        $sheet->setCellValue('D' . $row19, $row_data9['material_value']);
        $sheet->getStyle('A'.$row19.':H'.$row19)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row19.':H'.$row19)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row19.':C'.$row19);
        $sheet->getStyle('A'.$row19)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row19)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row19++;
        $i_tem9++;
        $rowSection19 = $row19;
    }
}else{
    $sheet->setCellValue('B' . $row19,'ไม่มีข้อมูล');
    $row19++;
    $i_tem9++;
    $rowSection19 = $row19;
}


$row20 = $rowSection19;
$sheet->setCellValue('A'.$row20,'วัสดุ/อะไหล่ (ช่างเครื่องทำความเย็น)');
$sheet->getStyle('A'.$row20)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row20.':H'.$row20)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row20.':H'.$row20);
$sheet->getStyle('A'.$row20.':H'.$row20)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection20 = $row20;

$row21 = $rowSection20+1;
$sheet->setCellValue('A'.$row21,'ชั้นที่1');
$sheet->getStyle('A'.$row21)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row21.':H'.$row21)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row21.':H'.$row21);
$sheet->getStyle('A'.$row21.':H'.$row21)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection21 = $row21;

$row22 =$rowSection21+1;
$sql10 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 4 AND a.material_class_shelf_id = 1";

$result10 = mysqli_query($conn, $sql10);
$num_rows10 = mysqli_num_rows($result);
$i_tem10 =1;
if ($num_rows10 > 0) {
    while($row_data10=mysqli_fetch_array($result10)){
        $sheet->setCellValue('A' . $row22, $i_tem10);
        $sheet->setCellValue('B' . $row22, $row_data10['material_name']);
        $sheet->setCellValue('D' . $row22, $row_data10['material_value']);
        $sheet->getStyle('A'.$row22.':H'.$row22)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row22.':H'.$row22)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row22.':C'.$row22);
        $sheet->getStyle('A'.$row22)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row22)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row22++;
    $i_tem10++;
    $rowSection22 = $row22;
    }
   
}else{
    $sheet->setCellValue('A' . $row22, $i_tem10);
    $sheet->setCellValue('B' . $row22,'ไม่มีข้อมูล');
    $row22++;
    $i_tem10++;
    $rowSection22 = $row22;
}



$row23 = $rowSection22;
$sheet->setCellValue('A'.$row23,'ชั้นที่2');
$sheet->getStyle('A'.$row23)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row23.':H'.$row23)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row23.':H'.$row23);
$sheet->getStyle('A'.$row23.':H'.$row23)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection23 = $row23;

$row24 = $rowSection23+1;
$sql11 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 4 AND a.material_class_shelf_id = 2";

$result11 = mysqli_query($conn, $sql11);
$num_rows11 = mysqli_num_rows($result11);
$i_tem11 =1;
if ($num_rows11 > 0) {
    while($row_data11=mysqli_fetch_array($result11)){
        $sheet->setCellValue('A' . $row24, $i_tem11);
        $sheet->setCellValue('B' . $row24, $row_data11['material_name']);
        $sheet->setCellValue('D' . $row24, $row_data11['material_value']);
        $sheet->getStyle('A'.$row24.':H'.$row24)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row24.':H'.$row24)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row24.':C'.$row24);
        $sheet->getStyle('A'.$row24)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row24)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row24++;
    $i_tem11++;
    $rowSection24 = $row24;
    }
   
}else{
    $sheet->setCellValue('A' . $row24, $i_tem11);
    $sheet->setCellValue('B' . $row24,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row24.':H'.$row24)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row24.':H'.$row24);
$sheet->getStyle('A'.$row24.':H'.$row24)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row24++;
    $i_tem11++;
    $rowSection24 = $row24;
}
$row25 = $rowSection24;
$sheet->setCellValue('A'.$row25,'ชั้นที่3');
$sheet->getStyle('A'.$row25)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row25.':H'.$row25)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row25.':H'.$row25);
$sheet->getStyle('A'.$row25.':H'.$row25)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection25 = $row25;

$row26 = $rowSection25+1;
$sql12 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 4 AND a.material_class_shelf_id = 3";

$result12 = mysqli_query($conn, $sql12);
$num_rows12 = mysqli_num_rows($result12);
$i_tem12 =1;
if ($num_rows12 > 0) {
    while($row_data12=mysqli_fetch_array($result12)){
        $sheet->setCellValue('A' . $row26, $i_tem12);
        $sheet->setCellValue('B' . $row26, $row_data12['material_name']);
        $sheet->setCellValue('D' . $row26, $row_data12['material_value']);
        $sheet->getStyle('A'.$row26.':H'.$row26)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row26.':H'.$row26)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row26.':C'.$row26);
        $sheet->getStyle('A'.$row26)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row26)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row26++;
    $i_tem12++;
    $rowSection26 = $row26;
    }
   
}else{
    $sheet->setCellValue('A' . $row26, $i_tem12);
    $sheet->setCellValue('B' . $row26,'ไม่มีข้อมูล');
    $row26++;
    $i_tem12++;
    $rowSection26 = $row26;
}

$row27 = $rowSection26;
$sheet->setCellValue('A'.$row27,'วัสดุ/อะไหล่ (งานประปา)');
$sheet->getStyle('A'.$row27)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row27.':H'.$row27)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row27.':H'.$row27);
$sheet->getStyle('A'.$row27.':H'.$row27)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection27 = $row27;

$row28 = $rowSection27+1;
$sheet->setCellValue('A'.$row28,'ชั้นที่1');
$sheet->getStyle('A'.$row28.':H'.$row28)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row28.':H'.$row28);
$sheet->getStyle('A'.$row28.':H'.$row28)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection28 = $row28;

$row29 = $rowSection28 +1;
$sql13 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 5 AND a.material_class_shelf_id = 1";

$result13 = mysqli_query($conn, $sql13);
$num_rows13 = mysqli_num_rows($result13);
$i_tem13 =1;
if ($num_rows13 > 0) {
    while($row_data13=mysqli_fetch_array($result13)){
        $sheet->setCellValue('A' . $row29, $i_tem13);
        $sheet->setCellValue('B' . $row29, $row_data13['material_name']);
        $sheet->setCellValue('D' . $row29, $row_data13['material_value']);
        $sheet->getStyle('A'.$row29.':H'.$row29)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row29.':H'.$row29)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row29.':C'.$row29);
        $sheet->getStyle('A'.$row29)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row29)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row29++;
    $i_tem13++;
    $rowSection29 = $row29;
    }
   
}else{
    $sheet->setCellValue('A' . $row29, $i_tem13);
    $sheet->setCellValue('B' . $row29,'ไม่มีข้อมูล');
    $row29++;
    $i_tem13++;
    $rowSection29 = $row29;
}

$row30 = $rowSection29;
$sheet->setCellValue('A'.$row30,'ชั้นที่2');
$sheet->getStyle('A'.$row30)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row30.':H'.$row30)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row30.':H'.$row30);
$sheet->getStyle('A'.$row30.':H'.$row30)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection30 = $row30;

$row31 = $rowSection30+1;
$sql14 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 5 AND a.material_class_shelf_id = 2";

$result14 = mysqli_query($conn, $sql14);
$num_rows14 = mysqli_num_rows($result14);
$i_tem14 =1;
if ($num_rows14 > 0) {
    while($row_data14=mysqli_fetch_array($result14)){
        $sheet->setCellValue('A' . $row31, $i_tem14);
        $sheet->setCellValue('B' . $row31, $row_data14['material_name']);
        $sheet->setCellValue('D' . $row31, $row_data14['material_value']);
        $sheet->getStyle('A'.$row31.':H'.$row31)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row31.':H'.$row31)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row31.':C'.$row31);
        $sheet->getStyle('A'.$row31)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row31)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row31++;
    $i_tem14++;
    $rowSection31 = $row31;
    }
   
}else{
    $sheet->setCellValue('A' . $row31, $i_tem14);
    $sheet->setCellValue('B' . $row31,'ไม่มีข้อมูล');
    
    $row31++;
    $i_tem14++;
    $rowSection31 = $row31;
}

$row32 = $rowSection31;
$sheet->setCellValue('A'.$row32,'ชั้นที่3');
$sheet->getStyle('A'.$row32)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row32.':H'.$row32)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row32.':H'.$row32);
$sheet->getStyle('A'.$row32.':H'.$row32)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection32 = $row32;

$row33 = $rowSection32 +1;
$sql15 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 5 AND a.material_class_shelf_id = 3";

$result15 = mysqli_query($conn, $sql15);
$num_rows15 = mysqli_num_rows($result15);
$i_tem15 =1;
if ($num_rows15 > 0) {
    while($row_data15=mysqli_fetch_array($result15)){
        $sheet->setCellValue('A' . $row33, $i_tem15);
        $sheet->setCellValue('B' . $row33, $row_data15['material_name']);
        $sheet->setCellValue('D' . $row33, $row_data15['material_value']);
        $sheet->getStyle('A'.$row33.':H'.$row33)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row33.':H'.$row33)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row33.':C'.$row33);
        $sheet->getStyle('A'.$row33)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row33)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row33++;
    $i_tem15++;
    $rowSection33 = $row33;
    }
   
}else{
    $sheet->setCellValue('A' . $row33, $i_tem15);
    $sheet->setCellValue('B' . $row33,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row33.':H'.$row33)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row33.':H'.$row33)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row33.':C'.$row33);
    $sheet->getStyle('A'.$row33)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row33)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row33++;
    $row33++;
    $i_tem15++;
    $rowSection33 = $row33;
}

$row34 = $rowSection33;
$sheet->setCellValue('A'.$row34,'วัสดุ/อะไหล่ (เฉพาะงาน)');
$sheet->getStyle('A'.$row34)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row34.':H'.$row34)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row34.':H'.$row34);
$sheet->getStyle('A'.$row34.':H'.$row34)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection34 = $row34;

$row35 = $rowSection34+1;
$sheet->setCellValue('A'.$row35,'ชั้นที่1');
$sheet->getStyle('A'.$row35)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row35.':H'.$row35)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row35.':H'.$row35);
$sheet->getStyle('A'.$row35.':H'.$row35)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection35 = $row35;

$row36 = $rowSection35+1;
$sql16 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 6 AND a.material_class_shelf_id = 1";

$result16 = mysqli_query($conn, $sql16);
$num_rows16 = mysqli_num_rows($result16);
$i_tem16 =1;
if ($num_rows16 > 0) {
    while($row_data16=mysqli_fetch_array($result16)){
        $sheet->setCellValue('A' . $row36, $i_tem16);
        $sheet->setCellValue('B' . $row36, $row_data16['material_name']);
        $sheet->setCellValue('D' . $row36, $row_data16['material_value']);
        $sheet->getStyle('A'.$row36.':H'.$row36)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row36.':H'.$row36)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row36.':C'.$row36);
        $sheet->getStyle('A'.$row36)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row36)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row36++;
    $i_tem16++;
    $rowSection36 = $row36;
    }
   
}else{
    $sheet->setCellValue('A' . $row36, $i_tem16);
    $sheet->setCellValue('B' . $row36,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row36.':H'.$row36)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row36.':H'.$row36)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row36.':C'.$row36);
    $sheet->getStyle('A'.$row36)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row36)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row36++;
    $i_tem16++;
    $rowSection36 = $row36;
}

$row37 = $rowSection36;
$sheet->setCellValue('A'.$row37,'ชั้นที่2');
$sheet->getStyle('A'.$row37)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row37.':H'.$row37)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row37.':H'.$row37);
$sheet->getStyle('A'.$row37.':H'.$row37)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection37 = $row37;

$row38 = $rowSection37+1;
$sql17 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 6 AND a.material_class_shelf_id = 2";

$result17 = mysqli_query($conn, $sql17);
$num_rows17 = mysqli_num_rows($result17);
$i_tem17 =1;
if ($num_rows17 > 0) {
    while($row_data17=mysqli_fetch_array($result17)){
        $sheet->setCellValue('A' . $row38, $i_tem17);
        $sheet->setCellValue('B' . $row38, $row_data17['material_name']);
        $sheet->setCellValue('D' . $row38, $row_data17['material_value']);
        $sheet->getStyle('A'.$row38.':H'.$row38)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row38.':H'.$row38)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row38.':C'.$row38);
        $sheet->getStyle('A'.$row38)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row38)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row38++;
    $i_tem17++;
    $rowSection38 = $row38;
    }
   
}else{
    $sheet->setCellValue('A' . $row38, $i_tem17);
    $sheet->setCellValue('B' . $row38,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row38.':H'.$row38)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row38.':H'.$row38)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row38.':C'.$row38);
        $sheet->getStyle('A'.$row38)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row38)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row38++;
    $i_tem17++;
    $rowSection38 = $row38;
}

$row39 = $rowSection38;
$sheet->setCellValue('A'.$row39,'ชั้นที่3');
$sheet->getStyle('A'.$row39)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row39.':H'.$row39)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row39.':H'.$row39);
$sheet->getStyle('A'.$row39.':H'.$row39)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection39 = $row39;

$row40 = $rowSection39+1;
$sql18 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 6 AND a.material_class_shelf_id = 3";

$result18 = mysqli_query($conn, $sql18);
$num_rows18 = mysqli_num_rows($result18);
$i_tem18 =1;
if ($num_rows18 > 0) {
    while($row_data18=mysqli_fetch_array($result18)){
        $sheet->setCellValue('A' . $row40, $i_tem18);
        $sheet->setCellValue('B' . $row40, $row_data18['material_name']);
        $sheet->setCellValue('D' . $row40, $row_data18['material_value']);
        $sheet->getStyle('A'.$row40.':H'.$row40)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row40.':H'.$row40)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row40.':C'.$row40);
        $sheet->getStyle('A'.$row40)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row40)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row40++;
    $i_tem18++;
    $rowSection40 = $row40;
    }
   
}else{
    $sheet->setCellValue('A' . $row40, $i_tem18);
    $sheet->setCellValue('B' . $row40,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row40.':H'.$row40)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row40.':H'.$row40)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row40.':C'.$row40);
    $sheet->getStyle('A'.$row40)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row40)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row40++;
    $i_tem18++;
    $rowSection40 = $row40;
}

$row41 = $rowSection40;
$sheet->setCellValue('A'.$row41,'งานทั่วไป');
$sheet->getStyle('A'.$row41)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row41.':H'.$row41)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row41.':H'.$row41);
$sheet->getStyle('A'.$row41.':H'.$row41)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection41 = $row41;


$row42 = $rowSection41+1;
$sheet->setCellValue('A'.$row42,'ชั้นที่1');
$sheet->getStyle('A'.$row42)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row42.':H'.$row42)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row42.':H'.$row42);
$sheet->getStyle('A'.$row42.':H'.$row42)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection42 = $row42;

$row43 = $rowSection42+1;
$sql19 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 7 AND a.material_class_shelf_id = 1";

$result19 = mysqli_query($conn, $sql19);
$num_rows19 = mysqli_num_rows($result19);
$i_tem19 =1;
if ($num_rows19 > 0) {
    while($row_data19=mysqli_fetch_array($result19)){
        $sheet->setCellValue('A' . $row43, $i_tem19);
        $sheet->setCellValue('B' . $row43, $row_data19['material_name']);
        $sheet->setCellValue('D' . $row43, $row_data19['material_value']);
        $sheet->getStyle('A'.$row43.':H'.$row43)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row43.':H'.$row43)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row43.':C'.$row43);
        $sheet->getStyle('A'.$row43)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row43)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row43++;
    $i_tem19++;
    $rowSection43 = $row43;
    }
   
}else{
    $sheet->setCellValue('A' . $row43, $i_tem19);
    $sheet->setCellValue('B' . $row43,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row43.':H'.$row43)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row43.':H'.$row43)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row43.':C'.$row43);
    $sheet->getStyle('A'.$row43)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row43)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row43++;
    $i_tem19++;
    $rowSection43 = $row43;
}

$row44 = $rowSection43;
$sheet->setCellValue('A'.$row44,'ชั้นที่2');
$sheet->getStyle('A'.$row44)->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row44.':H'.$row44)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row44.':H'.$row44);
$sheet->getStyle('A'.$row44.':H'.$row44)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection44 = $row44;

$row45 = $rowSection44+1;
$sql20 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 7 AND a.material_class_shelf_id = 2";

$result20 = mysqli_query($conn, $sql20);
$num_rows20 = mysqli_num_rows($result20);
$i_tem20 =1;
if ($num_rows20 > 0) {
    while($row_data20=mysqli_fetch_array($result20)){
        $sheet->setCellValue('A' . $row45, $i_tem20);
        $sheet->setCellValue('B' . $row45, $row_data20['material_name']);
        $sheet->setCellValue('D' . $row45, $row_data20['material_value']);
        $sheet->getStyle('A'.$row45.':H'.$row45)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row45.':H'.$row45)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row45.':C'.$row45);
        $sheet->getStyle('A'.$row45)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row45)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row45++;
    $i_tem20++;
    $rowSection45 = $row45;
    }
   
}else{
    $sheet->setCellValue('A' . $row45, $i_tem20);
    $sheet->setCellValue('B' . $row45,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row45.':H'.$row45)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row45.':H'.$row45)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row45.':C'.$row45);
    $sheet->getStyle('A'.$row45)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row45)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row45++;
    $i_tem20++;
    $rowSection45 = $row45;
}

$row46 = $rowSection45;
$sheet->setCellValue('A'.$row46 ,'ชั้นที่3');
$sheet->getStyle('A'.$row46 )->getFont()->setSize(14)->setName('AngsanaUPC')->setBold(true);
$sheet->getStyle('A'.$row46 .':H'.$row46 )->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$sheet->mergeCells('A'.$row46 .':H'.$row46 );
$sheet->getStyle('A'.$row46 .':H'.$row46 )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection46 = $row46 ;

$row47 = $rowSection46+1;
$sql21 = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
    INNER JOIN material_type_tbl as b
    ON a.material_type_id = b.material_type_id
    INNER JOIN unit_tbl as c
    ON a.unit_id = c.unit_id 
    INNER JOIN material_class_shelf_tbl as d
    ON a.material_class_shelf_id = d.material_class_shelf_id WHERE a.material_type_id = 7 AND a.material_class_shelf_id = 3";

$result21 = mysqli_query($conn, $sql21);
$num_rows21 = mysqli_num_rows($result21);
$i_tem21 =1;
if ($num_rows21 > 0) {
    while($row_data21=mysqli_fetch_array($result21)){
        $sheet->setCellValue('A' . $row47, $i_tem21);
        $sheet->setCellValue('B' . $row47, $row_data21['material_name']);
        $sheet->setCellValue('D' . $row47, $row_data21['material_value']);
        $sheet->getStyle('A'.$row47.':H'.$row47)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('A'.$row47.':H'.$row47)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->mergeCells('B'.$row47.':C'.$row47);
        $sheet->getStyle('A'.$row47)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D'.$row47)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row47++;
    $i_tem21++;
    $rowSection47 = $row47;
    }
   
}else{
    $sheet->setCellValue('A' . $row47, $i_tem21);
    $sheet->setCellValue('B' . $row47,'ไม่มีข้อมูล');
    $sheet->getStyle('A'.$row47.':H'.$row47)->getFont()->setSize(14)->setName('AngsanaUPC');
    $sheet->getStyle('A'.$row47.':H'.$row47)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->mergeCells('B'.$row47.':C'.$row47);
    $sheet->getStyle('A'.$row47)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D'.$row47)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row47++;
    $i_tem21++;
    $rowSection47 = $row47;
}

$row48 = $rowSection47;
$sheet->setCellValue('D' . $row48,'=SUM(D'.$rowstart.':D'.$row47.')');
$sheet->getStyle('D'.$row48)->getFont()->setSize(14)->setName('AngsanaUPC');
        $sheet->getStyle('D'.$row48)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('D'.$row48)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    
$rowSection49 = $row48;

$row50 = $rowSection49+3;
$sheet->setCellValue('A' . $row50,'……………………………………');
$sheet->mergeCells('A'.$row50.':B'.$row50);
$sheet->getStyle('A'.$row50)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('C' . $row50,'……………………………………');
$sheet->mergeCells('C'.$row50.':E'.$row50);
$sheet->getStyle('C'.$row50)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('F' . $row50,'……………………………………');
$sheet->mergeCells('F'.$row50.':H'.$row50);
$sheet->getStyle('F'.$row50)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$rowSection50 = $row50;

$row51 = $rowSection50+1;
$sheet->setCellValue('A' . $row51,'เจ้าหน้าที่สโตร์');
$sheet->mergeCells('A'.$row51.':B'.$row51);
$sheet->getStyle('A'.$row51)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('C' . $row51,'เจ้าหน้าที่สโตร์');
$sheet->mergeCells('C'.$row51.':E'.$row51);
$sheet->getStyle('C'.$row51)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);





$sheet->setCellValue('F' . $row51,'ผจก.ฝ่ายบัญชีและการเงิน');
$sheet->mergeCells('F'.$row51.':H'.$row51);
$sheet->getStyle('F'.$row51)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$rowSection51 = $row51;

$row52 = $rowSection51+1;
$sheet->setCellValue('A' . $row52,'ผู้ตรวจนับ');
$sheet->mergeCells('A'.$row52.':B'.$row52);
$sheet->getStyle('A'.$row52)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('C' . $row52,'ผู้ตรวจนับ');
$sheet->mergeCells('C'.$row52.':E'.$row52);
$sheet->getStyle('C'.$row52)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('F' . $row52,'ผู้อนุมัติ');
$sheet->mergeCells('F'.$row52.':H'.$row52);
$sheet->getStyle('F'.$row52)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);









$writer = new Xlsx($spreadsheet);
$filename = "PO-" . date("dmY") . ".xlsx";
$writer->save($filename);

?>
<div class="container_title">
    <h5>จำนวนวัสดุคงเหลือ - Total Items</h5>
    <div class="hee">
        
        <?php
       if (file_exists($filename)) {
        echo '<a href="' . $filename . '">ออกรายงานวัสดุคงเหลือ</a>';
    }

    ?>


    </div>
</div>
<div class="container_box1">
    <div class="container_box_h1">
        <div class="bg-item">
            <div class="tbl_item">
                <div style="margin:auto;text-align:left;width:100%;">
                    <!--ส่วนสร้างฟอร์ม สำหรับค้นหา -->
                    <table>
                        <form action="" method="POST">
                            <tr>
                                <td style="border:none;">
                                    รายการวัสดุในคลัง (STORE)
                                </td>
                                <td style="border:none;">
                                    ค้นหา <input type="search" id="name-po" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" />
                                </td>

                                <td style="border:none;display:flex;">
                                    ประเภทวัสดุ <select style="width:150px;" name="type_material">
                                        <option value="">ทุกประเภท</option>
                                        <option value="1">ประเภทซ่อมบำรุง</option>
                                        <option value="2">ประเภทไฟฟ้า</option>
                                        <option value="3">ประเภทสารเคมี</option>
                                        <option value="4">ประเภทเครื่องทำความเย็น</option>
                                        <option value="5">ประเภทงานประปา</option>
                                        <option value="6">ประเภทเฉพาะงาน</option>
                                        <option value="7">ประเภทงานทั่วไป</option>
                                        <option value="8">ประเภทอื่นๆ</option>
                                    </select>
                                </td>

                                <td style="border:none;">
                                    <button class="myBtn" id="search-po-butt" name="search">ค้นหา</button>
                                </td>
                            </tr>
                        </form>
                    </table>
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
                                    $limit = 10; // number of items to show per page
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page
                                    $offset = ($page - 1) * $limit;
                                    $counst = ($offset + 1);
                                    if (isset($_POST['search'])) {
                                        $keyword = $_POST['keyword'];
                                        $type_material = $_POST['type_material'];

                                        $where = [];
                                        if (!empty($keyword)) {
                                            $where[] = "material_name LIKE '%$keyword%'";
                                        }
                                        if (!empty($type_material)) {
                                            $where[] = "material_type_name LIKE '%$type_material%'";
                                        }


                                        $where_clause = '';
                                        if (!empty($where)) {
                                            $where_clause = ' WHERE ' . implode(' AND ', $where);
                                        }

                                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id" . $where_clause . " LIMIT  $offset, $limit";

                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id LIMIT  $offset, $limit";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                    while ($search = mysqli_fetch_array($result)) {


                                    ?>
                                        <tr>
                                            <td height="20">&nbsp;<?= $counst ?></td>
                                            <td height="20">&nbsp;<?= $search['material_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_value'] ?></td>
                                            <td height="20">&nbsp;<?= $search['unit_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_type_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_class_shelf_name'] ?></td>
                                        </tr>
                                    <?php
                                        $counst++;
                                    }
                                    $total_sql = "SELECT COUNT(*) as total FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id";
                                    $total_result = mysqli_query($conn, $total_sql);
                                    $total_row = mysqli_fetch_array($total_result);
                                    $total_items = $total_row['total'];
                                    $total_pages = ceil($total_items / $limit);

                                    // Create the pagination links
                                    $pagination = "";
                                    if ($total_pages > 1) {
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $page) {
                                                $pagination .= "<strong>$i</strong>";
                                            } else {
                                                $pagination .= "<a href=mspo_display.php?menu=total_items&page=$i'>$i</a>";
                                            }
                                        }
                                    }
                                    ?>

                                </table>
                                <div class="pagination">
                                    <?php if ($total_pages > 1) : ?>
                                        <div class="page-item">
                                            <a class="page-link" href="mspo_display.php?menu=total_items&page=1">First</a>
                                        </div>
                                        <?php
                                        $start_page = max(1, $page - 2);
                                        $end_page = min($total_pages, $page + 2);
                                        for ($i = $start_page; $i <= $end_page; $i++) :
                                        ?>
                                            <div class="page-item">
                                                <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=total_items&page=<?php echo $i; ?>">
                                                    <?php echo $i; ?>
                                                </a>
                                            </div>
                                        <?php endfor; ?>
                                        <?php if ($page < $total_pages - 2) : ?>
                                            <div class="page-item">
                                                <span class="page-link">&hellip;</span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($page < $total_pages - 1) : ?>
                                            <div class="page-item">
                                                <a class="page-link" href="mspo_display.php?menu=total_items&page=<?php echo $total_pages; ?>">Last</a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <br />

                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="border:none;">



                            </td>
                        </tr>
                        </thead>
                        <br>
                        <?php
                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                        INNER JOIN material_type_tbl as b
                        ON a.material_type_id = b.material_type_id
                        INNER JOIN unit_tbl as c
                        ON a.unit_id = c.unit_id 
                        INNER JOIN material_class_shelf_tbl as d
                        ON a.material_class_shelf_id = d.material_class_shelf_id";
                        $result = mysqli_query($conn, $sql);
                        $row55 = mysqli_num_rows($result); ?>
                        <div><span>จำนวนรายการทั้งหมด : <strong> <?php echo $row55 ?> </strong>รายการ</span></div>
                        <tfoot>


                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 10px;
    }

    .pagination .page-link {
        color: #333;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-link:hover,
    .pagination .page-link:focus {
        background-color: #f2f2f2;
        outline: none;
    }

    .pagination .page-link.active {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
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
</style>