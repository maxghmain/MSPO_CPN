<div class="container_title">
    <h5>สถานะใบขอซื้อ - State Ask For Buy</h5>
    <div class="button-add-afb" >
        <a href="mspo_display.php?menu=afb_add_afb">เพิ่มใบขอซื้อ</a>
    </div>
</div>
<style>
    #set-con {
        margin: 20px;
        border-radius: 20px;
    }

    .margin-box {

        display: flex;
    }
    #container-afb-box{
        height: 70vh;
    }
    #pagination{

        display: flex;
        justify-content: center;
        align-items: center;

    }
    .button-add-afb{
        justify-content: right;
        align-items: center;
        display: flex;
        width: 50%;
        margin-left:400px;
    }
    .button-add-afb a{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 35px;
        font-size: 20px;
        border-radius: 30px;
        text-decoration: none;
        background: #006ebc;
        color: white;
        transition-duration: 0.3s;
    }
    .button-add-afb a:hover{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 35px;
        font-size: 20px;
        border-radius: 30px;
        text-decoration: none;
        background: #014474;
        color: white;
    }
</style>

<div id="set-con">
    <div id="container-afb-box">
        <div class="margin-box">
            <?php include 'function/selectShowOderAFBstate.php'; ?>
        </div>
    </div>
    <div id="pagination">
        <?php echo $pagination; ?>
    </div>
</div>