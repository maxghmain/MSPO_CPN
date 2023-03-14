<?php
session_start();
include 'php/connect_db.php'; ?>
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<style>
    input[type="search"] {
        border:1px solid #006EBC;
        border-radius: 30px;
    }
    .butt-search-afb-it{
        margin: 5px;
        width: 100px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
        border: 0px solid red;
        height: 35px;
    }
    .butt-search-afb-it:hover{
        margin: 5px;
        width: 100px;
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
        border: 0px solid red;
        height: 35px;
    }
    
</style>
<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
                    <div id="titel-name">
                        รายการขอซื้อที่รอใช้งาน

                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <form action="" method="POST" >
                                <div>
                                ค้นหารายการที่ต้องการ
                                <input type="search" class="search_it_afb" name="keyword" />
                                <button type="submit" name="search" class="butt-search-afb-it">ค้าหา</button>
                                </div>

                              
                            </form>
                            <?php
                            if (isset($_POST['search'])) {
                                $keyword = $_POST['keyword'];

                                $where = [];
                                if (!empty($keyword)) {
                                    $where[] = "name_ms_normal_name LIKE '%$keyword%'";
                                }

                                $where_clause = '';
                                if (!empty($where)) {
                                    $where_clause = ' WHERE ' . implode(' AND ', $where);
                                }

                                $sql = "SELECT order_afb_id,order_afb_note, name_ms_normal_name, name_ms_real_name, order_afb_value,a.unit_id, unit_name, order_afb_note,a.form_afb_id,form_afb_number,form_afb_book_number,form_afb_people_name,a.state_id,form_afb_write_date,d.group_id
                                    FROM order_afb_tbl as a 
                                    INNER JOIN name_ms_tbl as b 
                                    ON a.name_ms_id = b.name_ms_id 
                                    INNER JOIN unit_tbl as c 
                                    ON a.unit_id = c.unit_id 
                                    INNER JOIN form_afb_tbl as d 
                                    ON a.form_afb_id = d.form_afb_id
                                    INNER JOIN group_tbl as e
                                    ON d.group_id = e.group_id" . $where_clause . " ORDER BY order_afb_id DESC";

                                $result = mysqli_query($conn, $sql);
                            } else {
                                $sql = "SELECT order_afb_id,order_afb_note, name_ms_normal_name, name_ms_real_name, order_afb_value,a.unit_id, unit_name, order_afb_note,a.form_afb_id,form_afb_number,form_afb_book_number,form_afb_people_name,a.state_id,form_afb_write_date,d.group_id
                                    FROM order_afb_tbl as a 
                                    INNER JOIN name_ms_tbl as b 
                                    ON a.name_ms_id = b.name_ms_id 
                                    INNER JOIN unit_tbl as c 
                                    ON a.unit_id = c.unit_id 
                                    INNER JOIN form_afb_tbl as d 
                                    ON a.form_afb_id = d.form_afb_id
                                    INNER JOIN group_tbl as e
                                    ON d.group_id = e.group_id
                                    WHERE a.state_id = 3 ORDER BY order_afb_id DESC";
                                $result = mysqli_query($conn, $sql);
                            }
                            $counst = 1;
                            while ($row = mysqli_fetch_array($result)) {
                               
                            ?>

                            <?php


                                
                                echo '<div class="containner_item">';
                                echo '<div class="box-item-show-1">';
                                echo 'รายการที่ : ' . $counst;
                                echo '<br>';
                                echo ' เล่มที่ ' .  $row['form_afb_book_number'] . ' เลขที่ ' .   $row['form_afb_number'] . ' | ' . ' วันที่ :' .   $row['form_afb_write_date'] . '<br>';
                                echo 'ชื่อไม่เป็นทางการ : ' . $row['name_ms_normal_name'] . '|';
                                echo 'ชื่อเป็นทางการ : ' . $row['name_ms_real_name'] . '|';
                                echo 'จำนวน : ' . $row['order_afb_value'] . ' ' . $row['unit_name'] . '|';
                                echo 'หมายเหตุ : ' . $row['order_afb_note'];
                                echo '</div>';
                                echo '<a id="showdetail_butt" href="mspo_display.php?menu=po_material&state_excecut=select_item&item_Number_select=' . $row['order_afb_id'] . '&name_item=' . $row['name_ms_real_name'] . '&value_item=' . $row['order_afb_value'] . '&unit_item=' . $row['unit_id'] . '&note_item=' . $row['order_afb_note'] . '&form_afbnum=' . $row['form_afb_number'] . '&form_afbbook=' . $row['form_afb_book_number'] . '&group_id_item=' . $row['group_id'] . '&form_afb_pel=' . $row['form_afb_people_name'] . '" >เลือกรายการขอซื้อ';
                                echo '</a>';
                                echo '</div>';
                                $counst++;
                            }

                            // Create the pagination links
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

            width: 90%;
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
        }

        #afb_content_xxx {
            margin: 10px;
            height: 95%;
            /*border: 1px solid red;*/
            overflow: auto;

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