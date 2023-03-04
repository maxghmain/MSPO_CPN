
<?php
session_start();
include 'php/connect_db.php';
?>
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<style>
    #bg_pop_delete {
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

    #bl_item_delete {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        display: block;
        /* border: 1px solid red; */
        align-items: center;
        width: 350px;
        border-radius: 10px;
        background: white;
        margin-top: 15%;
        margin-left: 10px;
        margin-right: auto;
        margin-left: auto;
        background-color: #ffffff;
        align-items: center;
        text-align: center;
        margin-bottom: 0px;
    }

    #title_pop_delete {
        border-radius: 10px;
        text-align: center;
        display: block;
        color: #ffffff;
        font-size: 25px;
        font-weight: bold;
        background-color: #006EBC;
        padding: 0.1px 0px 0.1px 0px;
    }

    #title_pop_delete p {
        margin-bottom: 0px;

        width: 100%;

    }

    #butt_ok_box_delete {
        border-radius: 10px;
        display: block;
        padding: 20px;
        padding-bottom: 0px;
        padding-top: 0px;
        background-color: #006EBC;
        font-weight: bold;
    }

    #butt_ok_box_delete a {
        text-decoration: none;
        color: #ffffff;
    }

    #butt_cancle_box_delete {
        border-radius: 10px;
        display: block;
        padding: 20px;
        padding-bottom: 0px;
        padding-top: 0px;
        background-color: red;
        font-weight: bold;
    }

    #butt_cancle_box_delete a {
        text-decoration: none;
        color: #ffffff;
    }

    #butt_a_delete {
        justify-content: center;
        align-items: center;
        display: flex;
        margin: 20px;
        margin-top: 0px;
        padding: 10px;
    }

    #detail_a_delete {
        font-size: 18px;
    }

    #butt_ok_box_delete:hover {
        cursor: pointer;
        color: white;
        background: #014474;
    }

    #butt_cancle_box_delete:hover {
        cursor: pointer;
        color: white;
        background: #800000;
    }
    #detail_text{
        word-wrap:break-word;
    }
</style>
<?php
$po_id_select = $_SESSION['po_id_select'];
$sql = "SELECT * FROM po_tbl WHERE po_id = '$po_id_select'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<div class="background_popup" id="bg_pop_delete">
    <div class="block_item" id="bl_item_delete">
        <div class="title_popup" id="title_pop_delete">
            <p id="title1">
                ยืนยันการทำรายการ
            </p>
        </div>
        <div class="detail_area" id="detail_a_delete">
            <p >
                ท่านต้องการ&nbsp;<strong style="color: green;">"อนุมัติ"</strong>&nbsp;ใบPOหรือไม่
            </p>
            <p id="detail_text">
                ใบ PO เลขที่ : 
            <strong><?php echo $row['po_num']?></strong>
            </p>
        </div>


        <div class="butt_area" id="butt_a_delete">
            <div id="butt_ok_box_delete">
                <a id="butt_ok_delete" href="mspo_display.php?menu=po_wait_conf&comfirm_po=alrady_comfirm&po_id_select=<?=$po_id_select?>&state_excecut=comfirm_po_sure">
                    <p id="butt_box_delete">
                        ตกลง
                    </p>
                </a>
            </div>
            <div id="center_">
                <p>&nbsp;</p>
            </div>
            <div id="butt_cancle_box_delete">
                <a id="butt_cancle_delete" href="mspo_display.php?menu=po_wait_conf">
                    <p id="butt_box_delete">
                        ยกเลิก
                    </p>
                </a>
            </div>
        </div>
    </div>
<?php mysqli_close($conn); ?>