<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
<style>
    #bg_pop {
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

    #bl_item {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        display: block;
        /* border: 1px solid red; */
        align-items: center;
        width: 350px;
        border-radius: 10px;
        background: white;
        margin-top: 150px;
        margin-left: 10px;
        margin-right: auto;
        margin-left: auto;
        background-color: #ffffff;
        align-items: center;
        text-align: center;
        margin-bottom: 0px;
    }

    #title_pop {
        border-radius: 10px;
        text-align: center;
        display: block;
        color: #ffffff;
        font-size: 25px;
        font-weight: bold;
        background-color: #006EBC;
        padding: 0.1px 0px 0.1px 0px;
    }

    #butt_ok_box {
        border-radius: 10px;
        display: block;
        padding: 20px;
        padding-bottom: 0px;
        padding-top: 0px;
        background-color: #006EBC;
        font-weight: bold;
    }

    #butt_ok_box a {
        text-decoration: none;
        color: #ffffff;
    }

    #butt_cancle_box {
        border-radius: 10px;
        display: block;
        padding: 20px;
        padding-bottom: 0px;
        padding-top: 0px;
        background-color: red;
        font-weight: bold;
    }

    #butt_cancle_box a {
        text-decoration: none;
        color: #ffffff;
    }

    #butt_a {
        justify-content: center;
        align-items: center;
        display: flex;
        margin: 20px;
        margin-top: 0px;
        padding: 10px;
    }

    #detail_a {
        font-size: 18px;
    }

    #butt_ok_box:hover {
        cursor: pointer;
        color: white;
        background: #014474;
    }
    #butt_cancle_box:hover {
        cursor: pointer;
        color: white;
        background: #800000;
    }
</style>


<div class="background_popup" id="bg_pop">
    <div class="block_item" id="bl_item">
        <div class="title_popup" id="title_pop">
            <p id="title1">
                ยืนยันการทำรายการ
            </p>
        </div>
        <div class="detail_area" id="detail_a">
            <p id="detail_text">
                ท่านต้องการ&nbsp;<strong style="color: red;">"ลบ"</strong>&nbsp;รายการนี้หรือไม่ ?
            </p>
        </div>
        <div class="butt_area" id="butt_a">
            <div id="butt_ok_box">
                <a id="butt_ok" href="#">
                    <p id="butt_box">
                        ตกลง
                    </p>
                </a>
            </div>
            <div id="center_">
                <p>&nbsp;</p>
            </div>
            <div id="butt_cancle_box">
                <a id="butt_cancle" href="#">
                    <p id="butt_box">
                        ยกเลิก
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>