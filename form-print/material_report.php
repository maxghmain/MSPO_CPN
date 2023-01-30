<?php 
include ('../php/connect_db.php');
session_start();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ออกรายงานคลังวัสดุ</title>
    <link rel="stylesheet" href="./A4.css" />
  </head>

  <button id="hid" onclick="window.print()">Print this page</button>
  <body style="--bleeding: 0.5cm; --margin: 0.5cm">
    <div class="page">
      <div class="container">
        <div class="logo">
          <img src="./images/LogoEdit.png" style="width: 90px" />
        </div>
        <div class="header-info">
          <div class="grid-container">
            <div class="grid-item" style="text-align: left">
              <p>&nbsp;Form No.</p>
            </div>
            <div class="grid-item1" style="text-align: left">
              <p>&nbsp;พิมพ์ครั้งที่</p>
            </div>
          </div>
          <div class="grid-container">
            <div class="grid-item" style="text-align: left">
              <p>&nbsp;เรื่อง ใบรายงานการตรวจนับสต๊อกประจำเดือน</p>
            </div>
            <div class="grid-item1" style="text-align: left">
              <p>&nbsp;บั่งคับใช้</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="grid-item2" style="text-align: center">
          <?php 
          if ($_SESSION['userlvid'] == '3'){
            echo '<p>ฝ่ายจัดซื้อ</p>';
          }
          ?>
          
        </div>
        <div class="grid-item1-1-1" style="text-align: left">
          <p>&nbsp;ผู้จัดทำ</p>
        </div>
        <div class="grid-item1-1-1" style="text-align: left">
          <p>&nbsp;ผู้อนุมัติ</p>
        </div>
        <div class="grid-item1-1" style="text-align: left">
          <p>&nbsp;หน้าที่</p>
        </div>
      </div>
      <div class="container">
        <div class="grid-item3">
          <p style="width: 140mm; text-align: left">&nbsp;ประจำเดือน</p>
          <p style="width: 48mm; text-align: center">วันที่</p>
        </div>
      </div>
      <div class="container">
        <div class="logo-te">ลำดับที่</div>
        <div class="header-info">
          <div class="grid-container-1">
            <div class="grid-item4" style="text-align: center">
              <p>ยอดคงเหลือตามสต๊อกการ์ด</p>
            </div>
            <div class="grid-item4-1" style="text-align: center">
              <p>ตรวจนับจริง</p>
            </div>
          </div>
          <div class="container">
            <div class="grid-item2-1" style="text-align: center">
              <p>รายการ</p>
            </div>
            <div class="grid-item6" style="text-align: center">
              <p>จำนวน</p>
            </div>
            <div class="grid-item6-1" style="text-align: center">
              <p>ถูกต้อง</p>
            </div>
            <div class="grid-item6-1" style="text-align: center">
              <p>ไม่ถูกต้อง</p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="logo">หมายเหตุ</div>
        </div>
      </div>

      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>วัสดุ/อะไหล่ (ซ่อมบำรุง)</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>วัสดุ/อะไหล่ (ไฟฟ้า)</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>สารเคมี</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>สารเคมี</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>วัสดุ/อะไหล่ (ช่างเครื่องทำความเย็น)</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>วัสดุ/อะไหล่ (งานประปา)</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>วัสดุ/อะไหล่ (เฉพาะงาน)</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 17.9mm; border: 1px solid black"><p></p></div>
        <div class="titel-item" style="font-size: 18px">
          <strong>งานทั่วไป</strong>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่1</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่2</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
      <div class="container">
        <div style="width: 15mm; border: 1px solid black"><p></p></div>
        <div style="font-size: 18px; width: 60mm; border: 1px solid black">
          <strong>ชั้นที่3</strong>
        </div>
        <div class="grid-item6" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item6-1" style="text-align: center">
          <p></p>
        </div>
        <div class="grid-item1" style="text-align: center">
          <p>&nbsp;</p>
        </div>
      </div>
    </div>
    <style>
    @media print {
      .print_text {
        font-size: 14px;
        font-family: "Angsana New";
      }
      #hid {
        display: none;
      }
    }
    body {
      font-family: "Angsana New";
    }
    .titel-item {
      align-items: center;
      justify-content: center;
      display: flex;
      border: 1px solid black;
      width: 210mm;
      height: 35px;
    }
    .container {
      display: flex;
      height: auto;
      /*border: 1px solid red;*/
    }

    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
      /* border: 1px solid red;*/
      height: 50%;
      width: 130mm;
    }
    .grid-container-1 {
      display: grid;
      grid-template-columns: auto auto auto;
      /* border: 1px solid red;*/
      height: 50%;
      width: 125mm;
    }
    .grid-item {
      height: 35px;
      width: 110mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }

    .grid-item1 {
      height: 35px;
      width: 40mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item1-1 {
      height: 35px;
      width: 40mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item1-1-1 {
      height: 35px;
      width: 55mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item2 {
      height: 35px;
      width: 40mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item2-1 {
      height: 35px;
      width: 60mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item3 {
      display: flex;
      height: 35px;
      width: 210mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item4 {
      height: 35px;
      width: 80mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item4-1 {
      height: 35px;
      width: 55mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item5 {
      height: 35px;
      width: 45mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item6 {
      height: 35px;
      width: 20mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .grid-item6-1 {
      height: 35px;
      width: 27.5mm;
      border: 1px solid rgba(0, 0, 0, 0.8);
      font-size: 14px;
    }
    .logo {
      justify-content: center;
      align-items: center;
      display: flex;
      width: 40mm;
      height: 70px;
      border: 1px solid black;
    }
    .logo-te {
      justify-content: center;
      align-items: center;
      display: flex;
      width: 15mm;
      height: 70px;
      border: 1px solid black;
    }
  </style>
  </body>
</html>
