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

    #new_comp_container {
        /* border: 1px solid red;*/
        display: flex;
        justify-content: center;
        width: 99.89%;
        height: 99%;
        overflow: hidden;

    }

    #box_container_new_comp {
        width: 40%;
        height: 50%;
        /* border: 1px solid red;*/
        margin-top: 100px;

    }

    #title_new_comp {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        background: #006ebc;
        color: white;
        font-size: 28px;
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

    #container_input {
        background: white;
        border: 1px solid #006ebc;

    }

    #set_margin {
        margin: 20px;
    }

    #set_flex_container {
        display: flex;
    }

    #start_title {
        width: 100px;
    }

    #start_title-1 input[type="text"] {
        width: 435px;
    }

    #start_title-2 input[type="text"] {
        width: 355px;
    }

    #note_comp_new {
        resize: none;
        width: 435px;
    }

    #button_save_comp_new {
        text-align: right;
        margin: 10px;

    }

    #button_save_comp_new a {
        cursor: pointer;
        background: #006ebc;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.2s;
    }

    #button_save_comp_new a:hover {
        cursor: pointer;
        background: #014474;
        color: white;
        padding: 3px;
        border-radius: 30px;
        text-decoration: none;
    }
</style>
<div class="add_afb_po" id="add_afb_po">
    <div id="new_comp_container">
        <div id="box_container_new_comp">
            <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
            <div id="title_new_comp">
                เพิ่มข้อมูลบริษัทที่ติดต่อ
            </div>
            <div id="container_input">
                <div id="set_margin">
                    <div id="set_flex_container">
                        <div id="start_title">
                            ชื่อบริษัท
                        </div>
                        <div id="start_title-1">
                            :<input type="text" id="comp_name_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>

                    <div id="set_flex_container">
                        <div id="start_title">
                            ที่อยู่
                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">เลขที่</div><input type="text" id="num_address_comp_new" placeholder="กรุณากรอก...." />

                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">
                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">ถนน</div> <input type="text" id="road_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">

                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">หมู่</div><input type="text" id="moo_comp_new" placeholder="กรุณากรอก...." />

                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">

                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">ตำบล</div><input type="text" id="tambon_comp_new" placeholder="กรุณากรอก...." />

                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">

                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">อำเภอ</div><input type="text" id="amthur_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">

                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">จังหวัด</div><input type="text" id="provinc_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">

                        </div>
                        <div id="start_title-2" style="display:flex;">
                            : <div style="width:80px">รหัสไปรษณี</div><input type="text" id="zipcode_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">
                            โทรศัพท์
                        </div>
                        <div id="start_title-1">
                            :<input type="text" id="tel_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">
                            แฟกซ์-FEX<br>(ถ้ามี)
                        </div>
                        <div id="start_title-1">
                            :<input type="text" id="fex_comp_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">
                            ผู้ติดต่อ
                        </div>
                        <div id="start_title-1">
                            :<input type="text" id="people_cont_new" placeholder="กรุณากรอก...." />
                        </div>
                    </div>
                    <div id="set_flex_container">
                        <div id="start_title">
                            รายละเอียด
                        </div>
                        <div id="start_title-1">
                            :<textarea id="note_comp_new" placeholder="กรุณากรอก...."></textarea>
                        </div>
                    </div>

                </div>
                <div id="button_save_comp_new">
                    <a onclick="save_comp_new()">บันทึกข้อมูล</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function save_comp_new(){
        var comp_name_new = $('#comp_name_new').val();
        var num_address_comp_new = $('#num_address_comp_new').val();
        var road_comp_new = $('#road_comp_new').val();
        var moo_comp_new = $('#moo_comp_new').val();
        var tambon_comp_new = $('#tambon_comp_new').val();
        var amthur_comp_new = $('#amthur_comp_new').val();
        var provinc_comp_new = $('#provinc_comp_new').val();
        var zipcode_comp_new = $('#zipcode_comp_new').val();
        var tel_comp_new = $('#tel_comp_new').val();
        var fex_comp_new = $('#fex_comp_new').val();
        var people_cont_new = $('#people_cont_new').val();
        var note_comp_new = $('#note_comp_new').val();
        
        if (comp_name_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#comp_name_new").focus();
                return;
        }
        if (num_address_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#num_address_comp_new").focus();
                return;
        }
        if (road_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#road_comp_new").focus();
                return;
        }
        if (moo_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#moo_comp_new").focus();
                return;
        }
        if (tambon_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#tambon_comp_new").focus();
                return;
        }
        if (amthur_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#amthur_comp_new").focus();
                return;
        }
        if (provinc_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#provinc_comp_new").focus();
                return;
        }
        if (zipcode_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#zipcode_comp_new").focus();
                return;
        }
        if (tel_comp_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#tel_comp_new").focus();
                return;
               
        }
        if (people_cont_new == "") {
                $("#bg_pop_alert").show();
                setTimeout(hide_pop_wrong_alert, 3000);
                $("#people_cont_new").focus();
                return;    
        }
        if(comp_name_new != "" && num_address_comp_new != "" && moo_comp_new != "" && road_comp_new != "" && tambon_comp_new != "" && amthur_comp_new != "" && provinc_comp_new != "" && zipcode_comp_new != "" && tel_comp_new != "" && people_cont_new != "" ){
            $.ajax({
                    type: "POST",
                    url: "../../mspo_cpn/mspo_display.php?menu=po_material&add_company_new=save_comp_new",
                    data: {
                        comp_name_new: comp_name_new,
                        num_address_comp_new: num_address_comp_new,
                        road_comp_new: road_comp_new,
                        moo_comp_new:moo_comp_new,
                        tambon_comp_new: tambon_comp_new,
                        amthur_comp_new: amthur_comp_new,
                        provinc_comp_new: provinc_comp_new,
                        zipcode_comp_new: zipcode_comp_new,
                        tel_comp_new:tel_comp_new,
                        fex_comp_new:fex_comp_new,
                        people_cont_new:people_cont_new,
                        note_comp_new:note_comp_new,
                    }
                });
                window.location = '../../mspo_cpn/mspo_display.php?menu=po_material';
        }
        
    
            
    }
    function loading_hide() {
        $("#bg_loading").hide();
    }

    function hide_pop_wrong_alert() {
        $("#bg_pop_alert").hide();
    }

    function hide_pop_succ_alert() {
        $("#bg_pop_alert_succ").hide();
    }
</script>
<?php mysqli_close($conn); ?>