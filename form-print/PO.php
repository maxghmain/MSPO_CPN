<!DOCTYPE html>

  <link rel="stylesheet" href="A4.css" />



<!-- 
    วิธีใช้ Copy Code ด้านล่างไปวาง

    <button onclick="myFunction()">Try it</button>

  <script>
  function myFunction() {
    window.open("print.html"); <-- ในวงเล็บเปลี่ยนตามเส้นทาง
  }
  </script> 
-->
<style>
  #table-ph {
    display: flex;
    width: 100%;
    /* border: 1px solid red;*/
    text-align: left;
  }

  table {
    border-collapse: collapse;
  }

  .page p {
    height: 10px;
  }

  #table-ph table tr td p {
    height: 10px;
  }

  #table-a table tr td p {
    height: 10px;
  }

  .table-b table tr td p {
    height: 5px;
    display: flex;
    align-items: center;
  }
</style>

<body style="--bleeding: 0.5cm; --margin: 0.5cm" OnLoad="window.print();">

  <div class="page">
    <!-- Your content here -->
    <p style="font-size: 14px">
      บริษัท เอ็น เอส โคลด์ สโตเรจ จำกัด (สาขาที่ 1)
    </p>
    <p style="font-size: 12px">
      ที่อยู่ 150/2 หมู่.3 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000
    </p>
    <p style="font-size: 12px">โทร 074-336990-1</p>
    <p style="font-size: 12px">เลขประจำตัวผู้เสียภาษี 9095545002547</p>
    <p style="font-size: 14px"><strong>ใบสั่งซื้อ</strong></p>
    <div id="table-ph">
      <table>
        <tr>
          <td style="width: 150mm">
            <p style="font-size: 12px">บริษัท</p>
          </td>
          <td>
            <p style="font-size: 12px">เลขที่</p>
          </td>
        </tr>
        <tr>
          <td>
            <p style="font-size: 12px">ที่อยู่</p>
          </td>
          <td>
            <p style="font-size: 12px">วันที่</p>
          </td>
        </tr>

        <tr>
          <td>
            <p style="font-size: 12px">โทร</p>
          </td>
        </tr>
        <tr>
          <td>
            <p style="font-size: 12px">ผู้ติดต่อ</p>
          </td>
        </tr>
      </table>
    </div>
    <div id="table-a">
      <table>
        <tr>
          <td style="width: 70mm; text-align: left">
            <p style="font-size: 12px">Form No.</p>
          </td>
          <td style="width: 70mm; text-align: left">
            <p style="font-size: 12px">ผู้ขอซื้อ</p>
          </td>
          <td style="width: 70mm; text-align: right">
            <p style="font-size: 12px">ใบขอซื้อเลขที่</p>
          </td>
        </tr>
      </table>
    </div>
    <div class="table-b">
      <table>
        <tr>
          <td style="border: 1px solid black; width: 20mm;">
            <p style="font-size: 12px">ฝ่ายจัดซื้อ</p>
          </td>
          <td style="border: 1px solid black; width: 47.5mm; text-align: left">
            <p style="font-size: 12px">ผู้จัดทำ</p>
          </td>
          <td style="border: 1px solid black; width:  47.5mm; text-align: left">
            <p style="font-size: 12px">ผู้อนุมัติ</p>
          </td>
          <td style="border: 1px solid black; width:  47.5mm; text-align: left">
            <p style="font-size: 12px">วันที่บังคับใช้</p>
          </td>
          <td style="border: 1px solid black; width:  47.5mm; text-align: left">
            <p style="font-size: 12px">พิมพ์ครั้งที่</p>
          </td>
        </tr>
      </table>
    </div>
    <br />
    <div class="table-item">
      <table>
        <tr>
          <td style="border: 1px solid black; width: 10mm;">
            <p style="font-size: 10px;">ลำดับที่</p>
          </td>
          <td style="border: 1px solid black; width: 105mm">
            <p style="font-size: 10px;">รายการ</p>
          </td>
          <td style="border: 1px solid black; width: 30mm">
            <p style="font-size: 10px;">ปริมาณสั่ง</p>
          </td>
          <td style="border: 1px solid black; width: 30mm">
            <p style="font-size: 10px;">หน่วยนับ</p>
          </td>
          <td style="border: 1px solid black; width: 30mm">
            <p style="font-size: 10px;">ราคา</p>
          </td>
          <td style="border: 1px solid black; width: 30mm">
            <p style="font-size: 10px;">จำนวนเงิน</p>
          </td>
          <td style="border: 1px solid black; width: 30mm">
            <p style="font-size: 10px;">ปริมาณรับ</p>
          </td>
        </tr>
<!-- 1 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">1</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>


        <!-- 2 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">2</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 3 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">3</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 4 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">4</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 5 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">5</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 6 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">6</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 7 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">7</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

        <!-- 8 -->
        <tr>
          <td style="border: 1px solid black; width: 18.5mm">
            <p style="font-size: 10px;">8</p>
          </td>
          <td style="border: 1px solid black; width: 71mm;text-align: left;">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
          <td style="border: 1px solid black; width: 20mm">
            <p style="font-size: 10px;"></p>
          </td>
        </tr>

      </table>
    </div>
    <table>
      <tr>
        <td style="width: 104mm;text-align: left;">
          <p style="font-size: 10px;">
            หมายเหตุ
          </p>
        </td>
        <td style="border: 1px solid black;width: 42.5mm;">
          <p style="font-size: 10px;">
            มูลค่าสินค้า
          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
      </tr>
      <tr>
        <td style="width: 105.5mm;text-align: left;">
          <p style="font-size: 10px;">
            กำหนดส่งมอบ..................................................................
          </p>
        </td>
        <td style="border: 1px solid black;width: 42.5mm;">
          <p style="font-size: 10px;">
            ภาษีมูลค่าเพิ่ม 7%
          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
      </tr>
      <tr>
        <td style="width: 105.5mm;text-align: left;">
          <p style="font-size: 10px;">

          </p>
        </td>
        <td style="border: 1px solid black;width: 42.5mm;">
          <p style="font-size: 10px;">
            ยอดรวมทั้งสิ้น
          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
        <td style="border: 1px solid black;width: 22mm;">
          <p style="font-size: 10px;">

          </p>
        </td>
      </tr>
    </table>
    <br><br><br>
    <table>
      <tr>
        <td style="text-align: center;width: 70mm;">
          <p style="font-size: 10px;">
            ผู้จัดทำ.........................................................
          </p>
          <p style="font-size: 10px;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
        </td>


        <td style="text-align: center;width: 70mm;">
          <p style="font-size: 10px;">
            ผู้สั่งซื้อ.........................................................
          </p>
          <p style="font-size: 10px;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
        </td>


        <td style="text-align: center;width: 70mm;">
          <p style="font-size: 10px;">
            ผู้ตรวจสอบ.........................................................
          </p>
          <p style="font-size: 10px;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
        </td>
      </tr>
    </table>
    <br><br><br>
    <table>
      <tr>
        <td style="width: 105mm;">
          <p style="font-size: 10px;">
            ผู้รับสินค้า..............................................วันที่.........................
          </p>
        </td>
        <td style="width: 105mm;">

          <p style="font-size: 10px;">
            ผู้อนุมัติ.........................................................
          </p>

        </td>
      </tr>

    </table>
    <table>
      <tr>
        <td style="text-align: right;width: 160mm;">
          <p style="font-size: 10px;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
        </td>
      </tr>
    </table>
    <!-- End of your content -->
  </div>
</body>

</html>