<?php


?>
<style>
    .display-butt{
       display: flex;
       justify-content: center;

    }
    .butt-conf-po{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-conf-po:hover{
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }
    .butt-conf-po a{
       text-decoration: none;
       color: white;
    }
    .butt-edit-po{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #fbd741;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-edit-po:hover{
        width: 60px;
        border-radius: 20px;
        background: #fda003;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-edit-po a{
        color: black;
        text-decoration: none;
    }
    .butt-cancle{
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #be2623;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-cancle:hover{
        width: 60px;
        border-radius: 20px;
        background: #930a00;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .butt-cancle a{
        color: white;
        text-decoration: none;
    }
</style>
<div class="container_title">
    <h5>ประวัติการรับเข้าและเบิกออกวัสดุ - LOGS OF PICK IN AND PICK OUT ITEM</h5>

</div>
<div class="container_box">
    <div class="container_box_h1">
        <div id="table-function">
            <table>
                <tr>
                    <td style="border:none;">
                    ประวัติการรับเข้าและเบิกออกวัสดุ
                    </td>
                    <td style="border:none;">
                        ค้นหา <input type="search" id="name-po" />
                    </td>
                    <td style="border:none;">
                        จากวันที่ <input type="date" id="date-start" />
                    </td>
                    <td style="border:none;">
                        ถึงวันที่ <input type="date" id="date-start" />
                    </td>
                </tr>
            </table>
            <div style="display: flex;justify-content: center;margin-bottom:20px;width:100%;margin-top:10px">
                <div id="table_data_show_display" style="border:1px solid black;width:100%;">
                    <div id="fuck">
                        <table>
                            <thead>
                                <tr>
                                    <td style="width: 5%;">
                                        ลำดับที่
                                    </td>
                                    <td style="width: 10%;">
                                        ชื่อรายการวัสดุ
                                    </td>
                                    <td style="width: 5%;">
                                        จำนวน
                                    </td>
                                    <td style="width: 10%;">
                                        สถานะ
                                    </td>
                                    <td style="width: 10%;">
                                        ขื่อผู้ทำรายการ
                                    </td>
                                    <td style="width: 10%;">
                                        วันที่
                                    </td>
                                    <td style="width: 10%;">
                                        <strong>ราคาล่าสุดที่รับเข้า(บาท)</strong>
                                    </td>


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                session_start();
                                include 'php/connect_db.php';
                                $sql = "SELECT * FROM pick_in_out_logs_tbl 
                                WHERE state_id = 17 ORDER BY pick_in_out_logs_id DESC
                               ";
                                $result = mysqli_query($conn, $sql);
                                $eiei = 1;
                                while ($row = mysqli_fetch_array($result)) {?>
                                    
                                    <tr>
                                        <td style="width: 5%;">
                                        <?= $eiei; ?>
                                        </td>
                                        <td style="width: 10%;">
                                            
                                            <?= $row['pick_in_name']; ?>
           
                                        </td>

                                        <td style="width: 10%;">
                                               <?=$row['pick_in_out_val']?>
                                               </td>

                                        <td style="width: 7%;">
                                       
                                           
                                                <li style="color:green;">รับเข้า</li>
                                            
                                        </td>
                                        <td style="width: 7%;">
                                       
                                            <?= $row['pick_in_out_pel']; ?>
                                            
                                        </td>
                                        <td style="width: 10%;">
                                        <?=$row['pick_in_out_date']?>
                                    </td>
                                    <td style="width: 7%;">
                                       
                                       <?= number_format($row['pick_in_out_price'],2); ?>
                                       
                                   </td>
                                           
                                            <?php $eiei++; }  ?>



                                    </tr>



                                <?php  

                                ?>
                            </tbody>

                            </form>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>