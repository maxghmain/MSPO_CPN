
<!--<link rel="stylesheet" href="../../css/component/popup.css">-->
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
    #ahah{
        border: 1px solid red;
    }
</style>

<div class="add_afb_po" id="add_afb_po">
    <div id="crop-box">
        <div id="box_add_afb_po">
            <div id="box_add_afb_po-1">
                <div id="box_add_afb_po-2">
                    <div id="box_butt_close"><a href="mspo_display.php?menu=po_material">X</a></div>
                    <div id="titel-name">
                        เพิ่มชื่อบริษัทที่ติดต่อ
                    </div>
                    <div id="content-po-box">
                        <div id="afb_content_xxx">
                            <div id="box-context">
                                <div id="box-context-1">
                                    ชื่อบริษัท
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-3">
                                    <input type="text" name="comp_name" list="comp_name">
                                    <datalist id="comp_name">
                                    <?php
                                        include 'php/connect_db.php';
                                        $sql = "SELECT comp_contect_name FROM comp_contect_tbl";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        $comp_contect_name = $row['comp_contect_name'];
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<option value="' . $row['comp_contect_name'] . '">'.$row['comp_contect_name'].'</option>';
                                        }
                                        ?>


                                    </datalist>
                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">
                                    ที่อยู่
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-4">
                                    เลขที่ : <input type="text" name="num_address" list="num_address">
                                    <datalist id="num_address">
                                        <?php
                                        include 'php/connect_db.php';
                                        $sql = "SELECT comp_contect_loca_num FROM comp_contect_tbl";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        $comp_contect_loca_num = $row['comp_contect_loca_num'];
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<option value="' . $row['comp_contect_loca_num'] . '">'.$row['comp_contect_loca_num'].'</option>';
                                        }
                                        ?>
                                    </datalist>
                                    หมู่ที่ : <input type="text" list="mutee" />
                                    <datalist id="mutee">
                                    <?php
                                        include 'php/connect_db.php';
                                        $sql = "SELECT comp_contect_loca_moo FROM comp_contect_tbl";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        $comp_contect_loca_moo = $row['comp_contect_loca_moo'];
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<option value="' . $row['comp_contect_loca_moo'] . '">'.$row['comp_contect_loca_moo'].'</option>';
                                        }
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">

                                </div>
                                <div id="box-context-2">

                                </div>
                                <div id="box-context-4">
                                    ถนน&nbsp; : <input type="text" list="road" />
                                    <datalist id="road">
                                     
                                    </datalist>
                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">

                                </div>
                                <div id="box-context-2">

                                </div>
                                <div id="box-context-3">
                                <div style="width:150px">ตำบล</div>:<input type="text" name="district" id="district" placeholder="กรุณากรอก ตำบล / แขวง" />
                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">

                                </div>
                                <div id="box-context-2">

                                </div>
                                <div id="box-context-3">
                                <div style="width:150px">อำเภอ</div>:<input type="text" name="amphoe" id="amphoe" placeholder="กรุณากรอก อำเภอ / เขต" />

                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">

                                </div>
                                <div id="box-context-2">

                                </div>
                                <div id="box-context-3">
                                <div style="width:150px">จังหวัด</div>:<input type="text" name="province" id="province" placeholder="กรุณากรอก จังหวัด" />
                                </div>
                            </div>



                            <div id="box-context">
                                <div id="box-context-1">

                                </div>
                                <div id="box-context-2">

                                </div>
                                <div id="box-context-3">
                                
                                   <div style="width:150px">รหัสไปรษณีย์</div>:<input type="text" name="zipcode" id="zipcode" placeholder="กรุณากรอก รหัสไปรษณีย์" />
                                </div>
                            </div>

                            <div id="box-context">
                                <div id="box-context-1">
                                    โทรศัพท์
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-3">
                                 <input type="text" list="comp_contect_tel" />
                                    <datalist id="comp_contect_tel">
                                     
                                    </datalist>

                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">
                                    แฟกซ์-FAX
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-3">
                                    <input type="text" />

                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">
                                    ชื่อผู้ติดต่อ
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-3">
                                <input type="text" list="comp_contect_people_name" />
                                    <datalist id="comp_contect_people_name">
                                      
                                    </datalist>

                                </div>
                            </div>
                            <div id="box-context">
                                <div id="box-context-1">
                                    รายละเอียดเพิ่มเติม(ถ้ามี)
                                </div>
                                <div id="box-context-2">
                                    :
                                </div>
                                <div id="box-context-3">
                                    <textarea></textarea>

                                </div>
                            </div>
                            <div style="text-align: right;">
                                <a id="butt_add_company" href="mspo_display.php?menu=po_material&add_company=select_company">บันทึกข้อมูล</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.Thailand({

            database: 'js/jquery.Thailand.js-master/jquery.Thailand.js/database/db.json',

            $district: $('#district'),

            $amphoe: $('#amphoe'),

            $province: $('#province'),

            $zipcode: $('#zipcode'),

            onDataFill: function(data) {

                console.info('Data Filled', data);

            },

            onLoad: function() {

                console.info('Autocomplete is ready!');

                $('#loader, .demo').toggle();

            }

        });
    </script>