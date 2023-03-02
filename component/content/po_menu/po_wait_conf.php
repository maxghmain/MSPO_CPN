<?php


?>
<style>
</style>
<div class="container_title">
    <h5>PO ที่รอตรวจรับ - PO WAIT</h5>

</div>
<div class="container_box">
    <div class="container_box_h1">
        <div id="table-function">
            <table>
                <tr>
                    <td style="border:none;">
                        รายการ PO ที่รอตรวจรับ
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
                                        เลขที่ PO
                                    </td>
                                    <td style="width: 10%;">
                                        บริษัทที่ติดต่อ
                                    </td>



                                    <td style="width: 7%;">
                                        <strong>ราคา</strong>
                                    </td>
                                    <td style="width: 10%;">
                                            สถานะ
                                            </td>
                                    <td style="width: 10%;">
                                        ดูรายระเอียด
                                    </td>


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                session_start();
                                include 'php/connect_db.php';
                                $sql = "SELECT po_id,po_num,a.comp_contect_id,comp_contect_name,po_price_sum_vat 
                                FROM po_tbl as a
                                INNER JOIN comp_contect_tbl as b
                                ON a.comp_contect_id = b.comp_contect_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td style="width: 5%;">
                                            PO <?=$row['po_num'];?>
                                        </td>
                                        <td style="width: 10%;">
                                        <?=$row['comp_contect_name'];?>
                                        </td>



                                        <td style="width: 7%;">
                                           <?=$row['po_price_sum_vat'];?>
                                        </td>
                                        <td style="width: 10%;">
                                            <strong><li style="color:red;">รอตรวจรับ</li></strong>
                                            </td>
                                       
                                        <td style="width: 10%;">
                                            ดูรายระเอียด
                                        </td>


                                    </tr>



                                <?php  }

                                ?>
                            </tbody>

                            </form>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>