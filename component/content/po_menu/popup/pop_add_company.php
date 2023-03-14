<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<?php
session_start();
include 'php/connect_db.php';




?>
<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
                    <div id="titel-name">
                        รายชื่อบริษัทที่เคยติดต่อ
                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <div id="box-context">
                                <form action="" method="POST">
                                    <input name="keyword" type="text" placeholder="ค้นหาชื่อบริษัท">
                                    <input name="search" type="submit" value="ค้นหา">
                                </form>
                               
                            </div>
                            <div id="comp_item_show">
                                <?php
                                 if (isset($_POST['search'])) {
                                    $keyword = $_POST['keyword'];
    
                                    $where = [];
                                    if (!empty($keyword)) {
                                        $where[] = "comp_contect_name LIKE '%$keyword%'";
                                    }
    
                                    $where_clause = '';
                                    if (!empty($where)) {
                                        $where_clause = ' WHERE ' . implode(' AND ', $where);
                                    }
    
                                    $sql = "SELECT * FROM comp_contect_tbl" . $where_clause ;
    
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    $sql = "SELECT * FROM comp_contect_tbl";
                                    $result = mysqli_query($conn, $sql);
                                }                               
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <div class="containner_item">
                                        <div class="box-item-show-1">
                                        
                                            <?php echo '<a style="background: #006ebc;color:white;padding:1px; border-radius: 10px;">ชื่อบริษัท : ' . $row['comp_contect_name'].'</a>'. '<br>'; ?>
                                            <?php echo 'ที่อยู่ :' . ' ' . $row['comp_contect_loca_num'] . ' ' . '| หมู่ : ' . $row['comp_contect_loca_moo'] . ' ' . '| ถนน : ' . $row['comp_contect_loca_road'] . '| ตำบล : ' . $row['comp_contect_loca_s_district'] . ' | อำเภอ : ' . $row['comp_contect_loca_district'] . '| จังหวัด : ' . $row['comp_contect_loca_prov'] . '| รหัสไปรษณี : ' . $row['comp_contect_loca_codepost'] . '<br>' . 'เบอร์โทร : ' . $row['comp_contect_tel'] . '| FEX : ' . $row['comp_contect_fex']; ?>
                                        </div>
                                        <?php echo '<a id="showdetail_butt" href="mspo_display.php?menu=po_material&add_company=select_and_add_comp&select_comp='.$row['comp_contect_id'].'" >เลือกบริษัท';
                                        echo '</a>'; ?>
                                    </div>
                                <?php 
                                } ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($conn); ?>
<style>
    #comp_item_show {
        /* border: 1px solid red;*/
        height: 400;
        overflow: auto;
    }

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

        width: 80%;
        height: 650;

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
        height: 500px;
        background: white;
        border: 1px solid #006ebc;
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

    #box-context {
        /*border: 1px solid red;*/
        display: flex !important;
        margin: 10px;
    }

    #box-context-1 {
        width: 15%;
        /*border: 1px solid red;*/
    }

    #box-context-2 {
        width: 1%;
        /* border: 1px solid red;*/
    }

    #box-context-3 input[type="text"] {

        width: 350px;
    }

    #box-context-3 {
        display: flex;
        align-items: center;
    }

    textarea {
        width: 500px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: none;
    }

    #butt_add_company {
        padding: 5px;
        transition: 0.3s;
        cursor: pointer;
        border-radius: 20px;
        color: white;
        background: #006EBC;
        height: 35px;
        width: 100px;
        border: 0px solid rgb(255, 255, 255);
        text-decoration: none;
    }


    #butt_add_company:hover {
        cursor: pointer;
        border-radius: 20px;
        color: white;
        background: #014474;
        height: 35px;
        width: 100px;
        border: 0px solid red;
    }

    #ahah {
        border: 1px solid red;
    }

    #mySearch {
        width: 100%;
        font-size: 18px;
        padding: 11px;
        border: 1px solid #ddd;
    }

    /* Style the navigation menu */
    #myMenu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
</style>