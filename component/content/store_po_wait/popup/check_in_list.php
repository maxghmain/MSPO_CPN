<?php
session_start();
include 'php/connect_db.php'; ?>
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->

<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close">
                        <?php ?>
                        <?php if ($_SESSION['userlvid'] == '4') { ?>
                            <a href="mspo_display.php?menu=po_check_in&check_in=<?= $check_in ?>&state_excecut=complet_po_list" style="text-decoration:none ;">ปิดรายการ/ตรวจรับทุกรายการจนหมดแล้ว</a>
                        <?php } ?>
                        <?php
                        if ($_SESSION['menu'] == "po_check_in") {
                        ?>
                            <a href="mspo_display.php?menu=po_check_in" style="text-decoration:none ;">X</a>
                        <?php } ?>
                        <?php
                        if ($_SESSION['menu'] == "dashboard") {
                        ?>
                            <a href="mspo_display.php?menu=dashboard" style="text-decoration:none ;">X</a>
                        <?php } ?>
                    </div>

                    <div id="titel-name">
                        รายการของ PO ที่รอตรวจรับ
                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <?php
                            $sql = "SELECT a.po_id,po_num,b.order_id,order_detail,order_queantity,order_price,b.unit_id,unit_name,b.state_id
                           FROM po_tbl as a
                           INNER JOIN order_tbl as b
                           ON a.po_id = b.po_id
                           INNER JOIN unit_tbl as c
                           ON b.unit_id = c.unit_id WHERE a.po_id = $check_in OR order_queantity >= 1 AND b.state_id = 15  AND b.state_id = 16 AND b.state_id = 14";
                            $result = mysqli_query($conn, $sql);
                            $counst = 1;
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="containner_item">
                                    <?php if ($row['state_id'] == 14) { ?>
                                        <div class="box-item-show-1">
                                            รายการที่ : <?= $counst; ?>
                                            <br>
                                            ชื่อรายการ : <?= $row['order_detail'] ?> |
                                            &nbsp;จำนวน : <?= $row['order_queantity'] . ' ' . $row['unit_name'] ?>

                                            <li style="color:#f7d07a;">รอตรวจรับ</li>
                                        </div>
                                    <?php }
                                    ?>
                                    <?php if ($row['state_id'] == 15) { ?>
                                        <div class="box-item-show-1">
                                            รายการที่ : <?= $counst; ?>
                                            <br>
                                            ชื่อรายการ : <?= $row['order_detail'] ?> |
                                            &nbsp;จำนวน : <?= $row['order_queantity'] . ' ' . $row['unit_name'] ?>

                                            <li style="color:#f7d07a;">ตรวจรับแล้วแต่ยังไม่สมบูรณ์</li>
                                        </div>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($row['state_id'] == 16) { ?>
                                        <div class="box-item-show-1">
                                            รายการที่ : <?= $counst; ?>
                                            <br>
                                            ชื่อรายการ : <?= $row['order_detail'] ?> |
                                            &nbsp;จำนวน : <?= $row['order_queantity'] . ' ' . $row['unit_name'] ?>

                                            <li style="color:green;">ตรวจรับเสร็จสมบูรณ์แล้ว</li>
                                        </div>
                                    <?php }
                                    ?>

                                    <?php if ($_SESSION['userlvid'] == '4') { ?>

                                        <a id="showdetail_butt" href="mspo_display.php?menu=po_check_in&check_in=<?= $check_in ?>&state_excecut=check_in_list&input_value=alradyinput&order_id_input=<?= $row['order_id'] ?>&name_item_check_in=<?= $row['order_detail'] ?>&unit_name_check=<?= $row['unit_id'] ?>&price_item_not_sum=<?= $price_item_not_sum ?>">ตรวจรับรายการนี้</a>



                                    <?php  } ?>
                                </div>
                            <?php $counst++;
                            }

                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #add_afb_po {
            /*display: none;*/
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            backdrop-filter: blur(5px);

        }

        #box_add_afb_po {

            width: 50%;
            height: 70%;
            /*  border: 1px solid red;*/
        }

        #box_add_afb_po-1 {
            /*  border: 1px solid red;*/
            margin: 5px;
            display: flex;
            justify-content: center;


            /*height: 100%;*/
        }

        #box_add_afb_po-2 {
            /* border: 1px solid red;*/
            margin: 5px;
            width: 100%;

        }

        #titel-name {
            /* border: 1px solid red;*/
            width: 100%;
            text-align: center;
            font-size: 24px;
            background: #006ebc;
            color: white;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #content-po-box {
            height: 450px;
            background: white;
            border: 1px solid #006ebc;
            overflow: auto;
        }

        #afb_content_xxx {
            margin: 10px;
            height: 95%;
            /* border: 1px solid red;*/

        }

        #body-afb-box-1 {
            width: 400px;
            border: 1px solid black;
            margin: 10px;
            border-radius: 10px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }

        #body-afb-box-2 {

            margin: 2.5px;
        }

        #title-afb {
            justify-content: center;
            align-items: center;
            height: 50px;
            background: #006ebc;
            display: flex;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            color: white;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
        }

        #info-afb-box-1 {
            display: flex;
        }

        #info-afb-box-2 {
            width: 100%;
        }

        #cancel-afb-state {
            padding: 5px;
            margin: 5px;
            border-radius: 50px;
            background: #cd5c5c;
            color: white;
            text-decoration: none;
            transition-duration: 0.3s;
            cursor: pointer;
        }

        #cancel-afb-state:hover {
            padding: 5px;
            margin: 5px;
            border-radius: 50px;
            background: #cc353f;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        #create_po_afb {
            padding: 5px;
            margin: 5px;
            border-radius: 50px;
            background: #006ebc;
            color: white;
            text-decoration: none;
            transition-duration: 0.3s;
            cursor: pointer;
        }

        #create_po_afb:hover {
            padding: 5px;
            margin: 5px;
            border-radius: 50px;
            background: #014474;
            color: white;
            text-decoration: none;
            transition-duration: 0.3s;
            cursor: pointer;
        }

        #state_name_wait {
            padding: 5px;
            border-radius: 30px;
            background: #7bae6a;
            color: white;
            margin: 5px;
        }

        #item-log {
            height: 55px;
            overflow: auto;
        }

        #action_afb {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #crop-box {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        #box_butt_close {
            display: flex;
            justify-content: right;
            background-color: #006EBC;
            padding-top: 10px;
        }

        #box_butt_close a {
            margin: 5px;
            border-radius: 40px;
            border: none;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 20px;
            color: #006EBC;
            background-color: white;
            font-weight: bold;
            transition-duration: 0.2s;
        }

        #box_butt_close a:hover {
            cursor: pointer;
            background: #014474;
            color: white;
        }

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

        .containner_item {
            border-radius: 10px;
            margin: 10px;
            height: auto;
            display: flex;
            justify-content: left;
            align-items: center;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .box-item-show-1 {
            /* border: 1px solid red;*/
            display: block;
            width: 100%;
            margin: 5px;
        }

        .button_more_afb {
            border: 0px solid red;
            border-radius: 20px;
            margin: 10px;
            height: 40px;
            display: flex;
            justify-content: left;
            align-items: center;
            background: #006ebc;
            color: white;
            font-family: Noto sans Thai;
            cursor: pointer;
            transition-duration: 0.3s;
            width: 150px;
            padding: 10px;

        }

        .button_more_afb:hover {
            border: 0px solid red;
            border-radius: 20px;
            margin: 10px;
            height: 40px;
            display: flex;
            justify-content: left;
            align-items: center;
            background: #5d8d75;
            color: white;
            font-family: Noto sans Thai;
            cursor: pointer;

        }

        #open_afb_more_detail {
            text-decoration: none;
        }

        #showdetail_butt {
            justify-content: center;
            align-items: center;
            display: flex;
            height: 35px;
            width: 170px;
            margin: 5px;
            background: #006ebc;
            text-decoration: none;
            border-radius: 30px;
            padding: 5px;
            color: white;
            font-size: 14px;
            transition-duration: 0.3s;
        }

        #showdetail_butt:hover {
            justify-content: center;
            align-items: center;
            display: flex;
            height: 35px;
            width: 170px;
            margin: 5px;
            background: #014474;
            text-decoration: none;
            border-radius: 30px;
            padding: 5px;
            color: white;
            font-size: 14px;
        }
    </style>