<div class="container_title">
    <h5>เพิ่มใบขอซื้อ - Add Ask For Buy</h5>
</div>
<div id="set-con">
    <div class="add-pc-oder">
        <table>
            <tr>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">เลขที่ : <input type="number" placeholder="กรุณากรอก.." required></p>
                </td>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">เล่มที่ : <input type="number" placeholder="กรุณากรอก.." required></p>
                </td>
                <td style="width:20%;border:none;">
                    <p style="text-align:left;">วันที่ : <input type="date" id="than" name="than" required /></p>
                </td>
            </tr>
            <tr>
                <td style="border:none;">
                    <p style="text-align:left;">ใช้งานกับ</p>
                </td>
            </tr>
        </table>
        <tr>
            <td style="border:none;">
                <textarea id="subject" name="subject" placeholder="หมายเหตุ...." style="height:50px;width:100%;"></textarea>
            </td>
        </tr>
        <input type="button" id="my-button" value="เพิ่ม / ลบ / แก้ไข รายการวัสดุ"></input>
    </div>
    <div id="table-show-detail">
        <table>
            <tr>
                <td style="width: 7%;">
                    <p>ลำดับ</p>
                </td>
                <td style="width: 20%;">
                    <p>ชื่อรายการไม่เป็นทางการ</p>
                </td>
                <td style="width: 20%;">
                    <p>ชื่อรายการเป็นทางการ</p>
                </td>
                <td style="width: 7%;">
                    <p>จำนวน</p>
                </td>
                <td style="width: 7%;">
                    <p>หน่วยนับ</p>
                </td>
                <td style="width: 7%;">
                    <p>หมายเหตุ</p>
                </td>
                <td style="width: 7%;">
                    <p><strong>แก้ไข/ลบ</strong></p>
                </td>
            </tr>
            <?php
            include 'function/selectShowOrderAFB.php';
            ?>
        </table>
        <table style="margin-top:20px;">
            <tr>
                <td style="text-align: right;border:none;">
                    <input type="button" id="save-data" value="บันทึกข้อมูล">
                </td>
            </tr>
        </table>
    </div>
</div>
<div>
    <table>
        <tr>
            <td style="border:none;">
                <div id="popup-content">
                    <div class="popup">
                        <div class="popup-ct">
                            <div style="margin:20px;">
                                <table>
                                    <tr>
                                        <td style="text-align: right;border:none;">
                                            <button id="close-button">X</button>
                                        </td>
                                    </tr>
                                </table>
                                <table>

                                    <tr>
                                        <td style="border:none;">
                                            <p style="text-align: left;">ชื่อไม่เป็นทางการ : <input type="text" id="name-not" style="width: 99%;" placeholder="กรุณากรอกข้อมูล..">
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">
                                            <p style="text-align: left;">ชื่อเป็นทางการ : <input type="text" id="name-yes" style="width: 99%;" placeholder="กรุณากรอกข้อมูล..">
                                            </p>
                                        </td>
                                    </tr>

                                </table>
                                <table>
                                    <tr>
                                        <td style="border:none;">
                                            <p>จำนวน<input type="number" id="value" placeholder="กรุณากรอกข้อมูล.." required></p>
                                        </td>
                                        <td style="border:none;">
                                            <p>หน่วยนับ<input type="text" id="unit" required></p>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td style="border:none;">
                                            <p style="text-align: left;">หมายเหตุ(หากมี)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">
                                            <textarea id="subject_order" name="subject" placeholder="หมายเหตุ...." style="height:50px;"></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td style="text-align: right;border:none;">
                                            <input type="button" id="insert-button" value="เพิ่มข้อมูล">
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <div class="table-info" style="width: 100%; word-wrap: break-word;">
                                    <table style="width: 100%; word-wrap: break-word;">
                                        <tr>
                                            <td style="width: 1%;">
                                                <p>ลำดับ</p>
                                            </td>
                                            <td style="width: 3%;">
                                                <p>ชื่อรายการไม่เป็นทางการ</p>
                                            </td>
                                            <td style="width: 3%;">
                                                <p>ชื่อรายการเป็นทางการ</p>
                                            </td>
                                            <td style="width: 1%;">
                                                <p>จำนวน</p>
                                            </td>
                                            <td style="width: 1%;">
                                                <p>หน่วยนับ</p>
                                            </td>
                                            <td style="width: 1%;">
                                                <p>หมายเหตุ</p>
                                            </td>
                                            <td style="width: 1%;">
                                                <p><strong>แก้ไข/ลบ</strong></p>
                                            </td>
                                        </tr>
                                        <?php
                                        include 'function/selectShowOrderAFB.php';

                                        /*
                                        $form_afb_id = $_SESSION['form_afb_id'];
                                        $_SESSION['select_data'] = $_GET['select_data'];
                                        $sql = "SELECT name_ms_normal_name,name_ms_real_name,order_afb_value,unit_name,order_afb_note FROM order_afb_tbl as a INNER JOIN name_ms_tbl as b ON a.name_ms_id = b.name_ms_id INNER JOIN unit_tbl as c ON a.unit_id = c.unit_id WHERE a.form_afb_id = $form_afb_id";
                                        $query = mysqli_query($conn,$sql);
                                        $count_data = 1;
                                        while($row = mysqli_fetch_array($query)){
                                                    $name_ms_normal_name = $row['name_ms_normal_name'];
                                                    $name_ms_real_name =$row['name_ms_real_name'];
                                                    $order_afb_value = $row['order_afb_value'];
                                                    $unit_name = $row['unit_name'];
                                                    $order_afb_note = $row['order_afb_note'];
                                                    echo '<tr>';
                                                    echo '<td>';
                                                    echo '<p>'.$count_data.'</p>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<p>'.$name_ms_normal_name.'</p>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<p>'.$name_ms_real_name.'</p>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<p>'.$order_afb_value.'</p>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<p>'.$unit_name.'</p>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<p>'.$order_afb_note.'</p>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                    $count_data++;
                                                }
                                                $count_data = 1;
                                                */
                                        ?>
                                    </table>
                                    <!--  <style>

                                    </style>
                                    <div id="display_popConfirm">
                                        <div id="popup_confirm_container">
                                            <div id="popcup-confirm-ct">
                                                <p>
                                                <table>
                                                    <tr>
                                                        <td style="border: none;">
                                                            <p><strong>ยืนยันการทำรายการ</strong></p>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td style="border: none;text-align:right;">
                                                            <input type="button" id="ok_butt" value="ตกลง">
                                                        </td>
                                                        <td style="border: none;text-align:left;">
                                                            <input type="button" id="cancle_butt" value="ย้อนกลับ">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <script>
                                                $(function() {
                                                    $('#ok_butt').click(function() {
                                                        $('#display_popConfirm').hide()
                                                    });
                                                    $('#cancle_butt').click(function() {
                                                        $('#display_popConfirm').hide()
                                                    });
                                                });
                                            </script>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <table>
                                    <tr>
                                        <td style="text-align: right;border:none;">
                                            <input type="button" id="save-data" value="บันทึกข้อมูล">
                                        </td>
                                    </tr>
                                </table>
                                <script>
                                    $(function() {
                                        $('#save-data').click(function() {
                                            $('#display_popConfirm').show()
                                        });
                                    });
                                </script>   -->
                                </div>
                            </div>
                        </div>
            </td>
        </tr>
    </table>
</div>
<div id="popup_background_order_afb_edit">
    <div id="popup_edit_order_afb">
        <div id="box_butt_close">
            <div id="close_edit_order_afb_butt">
                <button>X</button>
            </div>
        </div>
        <div id="tilte_popup">
            แก้ไขรายการใบขอซื้อ
        </div>
        <div id="box_content">
            <div id="block_area_title_inp">
                <div id="block_laout">
                    <label for="inp_edit_name_not">ชื่อรายการไม่เป็นทางการ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">ชื่อรายการเป็นทางการ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">จำนวน</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">หน่วยนับ</label>
                </div>
                <div id="block_laout">
                    <label for="inp_edit_name_not">หมายเหตุ</label>
                </div>
            </div>
            <div id="block_area_colon">
                <div id="block_laout">
                    <div><label>:</label></div>
                </div>
                <div id="block_laout">
                    <div><label>:</label></div>
                </div>
                <div id="block_laout">
                    <div><label>:</label></div>
                </div>
                <div id="block_laout">
                    <div><label>:</label></div>
                </div>
                <div id="block_laout">
                    <div><label>:</label></div>
                </div>
            </div>
            <div id="block_area_inp">
                <div id="block_laout">
                    <div><input type="text" id="inp_name_not_edit"></div>
                </div>
                <div id="block_laout">
                    <div><input type="text" id="inp_name_yes_edit"></div>
                </div>
                <div id="block_laout">
                    <div><input type="text" id="inp_value_edit"></div>
                </div>
                <div id="block_laout">
                    <div><input type="text" id="inp_unit_edit"></div>
                </div>
                <div id="block_laout">
                    <textarea id="subject_order_edit" name="subject" placeholder="หมายเหตุ...."></textarea>
                </div>
            </div>
        </div>
        <div id="box_butt_enter">
            <div id="block_butt_enter">
                <button id="save_edit_order_afb_butt" type="submit">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>