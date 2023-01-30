<style>
    #bg_pop_alert_succ{
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        overflow: auto;
    }
    #bl_item_alert {
        z-index: 1;
        left: 0;
        top: 0;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 10px 10px;
        display: block;
        /* border: 1px solid red; */
        align-items: center;
        width: 400px;
        border-radius: 10px;
        background: white;
        margin-top: 30px;
        margin-left: 10px;
        margin-right: auto;
        margin-left: auto;
        background-color: #ffffff;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
        align-items: center;
    }

    #title_pop_success_alert {
        align-items: center;
        display: block;
        border-radius: 10px;
        text-align: center;
        color: #ffffff;
        font-size: 18px;
        font-weight: bold;
        background-color: #73c088;
        padding: 10px;
    }
</style>
<div id="bg_pop_alert_succ">
    <div class="block_item" id="bl_item_alert">
        <div class="title_popup" id="title_pop_success_alert">
            เพิ่มรายการสำเร็จ !!
        </div>
    </div>
</div>