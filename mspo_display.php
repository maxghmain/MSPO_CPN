<?php
session_start();
if ($_SESSION['username'] == '') {
    header("Location: index.php");
} else {
    
    include 'php/connect_db.php';
    include 'component/loading.php';
    
    $_SESSION['menu'] = $_GET['menu'];
    $_SESSION['editData_id'] = $_GET['editData_id'];
    $_SESSION['deleteData_id'] = $_GET['deleteData_id'];
    $_SESSION['addData_id'] = $_GET['addData_id'];
    $_SESSION['state_excecut'] = $_GET['state_excecut'];
    $_SESSION['add_last_state'] = $_GET['add_last_state'];
    /* รับ Session จากการเพิ่มรายการใบขอซื้อ */
    $name_not_order_afb = $_GET['name_not_order_afb'];
    $name_yes_order_afb = $_GET['name_yes_order_afb'];
    $value_order_afb = $_GET['value_order_afb'];
    $unit_order_afb = $_GET['unit_order_afb'];
    $subject_order = $_GET['subject_order'];
    $form_afb_id = $_SESSION['form_afb_id'];
    /* Session รับค่าที่พิมพ์เก็บไว้ เมื่อรีเฟรชจะไม่หายไป ของเพิ่มใบขอซื้อ */
    /* ปิดการแสดงของ Popup และ Loading */
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/javascript" src="js/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="js/custom/session_afb_inp_save.js"></script>
        <link rel="stylesheet" href="css/component/popup.css?version=0s2" />
        <!-- <script type="text/javascript" src="js/custom/add_order_afb_ajex.js"></script> -->
        <title>ระบบจัดการคลังวัสดุและ PO - Display</title>
        <?php
        if ($_SESSION['userlvid'] == 1) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=11" />
        <?php
        }
        if ($_SESSION['userlvid'] == 2) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=11" />
        <?php
        }
        if ($_SESSION['userlvid'] == 3) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=11" />
        <?php
        }
        if ($_SESSION['userlvid'] == 4) {
        ?>
            <link rel="stylesheet" href="css/store_dashboard.css?version=11" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_select_menu') {
        ?>
            <link rel="stylesheet" href="css/component/afb_select_menu.css?version=11" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_add_afb') {
        ?>
            <link rel="stylesheet" href="css/component/afb_add_afb.css?version=121" />
        <?php
        }
        ?>

        <title>Dashboard</title>
    </head>

    <body>
        <?php include 'component/header.php'; ?>
        <div class="contianer_detail_all">
            <?php include 'component/sidebar.php'; ?>
            <div class="container_content">
                <?php
                /*เมนู Dashboard ของทุก User */
                if ($_SESSION['menu'] == "") {
                    include 'component/content/dashboard.php';
                } else if ($_SESSION['menu'] == "dashboard") {
                    include 'component/content/dashboard.php';
                    /*-----เมนูของ Purchase User------------*/
                    /*เมนูของ ใบขอซื้อ */
                } else if ($_SESSION['menu'] == "afb_select_menu") {
                    include 'component/content/afb_menu/afb_select_menu.php';
                    /*เมนูของ เพิ่มใบขอซื้อ */
                } else if ($_SESSION['menu'] == "afb_add_afb") {
                    include 'component/content/afb_menu/function/chack_state_and_id_form_afb_func.php';
                    include 'component/content/afb_menu/afb_add_afb.php';
                    include 'component/popup/wrong_inp_alert.php';
                    include 'component/popup/success_inp_alert.php';
                    include 'component/content/afb_menu/pop_up/pop_up_edit_data.php';
                    include 'component/content/afb_menu/pop_up/pop_up_add_order_afb.php';
                    include 'component/popup/confirm_popup_delete.php';
                    echo '<script>$("#bg_pop_alert_succ").hide(); $("#popup_background_order_afb_edit").hide();$("#bg_pop").hide();$("#bg_pop_delete").hide();</script>';
                    /*popup เพิ่มรายการของใบขอซื้อ*/
                    /* addData_Page_toggle */
                    if ($_SESSION['addData_id'] != "") {
                        echo '<script>$("#bg_pop").show();</script>';
                        if ($_SESSION['add_last_state'] != "") {
                            echo '<script>$("#bg_pop_alert_succ").show();</script>';
                            echo  '<script>setTimeout(hide_pop_succ_alert,3000);</script>';
                        } else if ($_SESSION['editData_id'] != "") {
                            echo '<script>$("#popup_background_order_afb_edit").show();</script>';
                        }else if ($_SESSION['deleteData_id'] != ""){
                            echo '<script>$("#bg_pop_delete").show();</script>';
                        }else if ($_SESSION['state_excecut'] == "addData") {
                            echo '<script>$("#popup_background_order_afb_edit").hide();</script>';
                            echo '<script>';
                            echo  '$("#bg_loading").show();';
                            echo '</script>';
                            include 'component/content/afb_menu/function/add_order_afb_to_db_func.php';
                            echo  '<script>setTimeout(loading_hide,50);</script>';
                            echo '<script>';
                            echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . '&state_excecut=addSuccess")';
                            echo '</script>';
                        } else if ($_SESSION['state_excecut'] == "addSuccess") {

                ?>
                            <script type="text/javascript">
                                window.location = '../mspo_cpn/mspo_display.php?menu=afb_add_afb&addData_id=' + <?php echo $row_add; ?> + '&add_last_state=1';
                            </script>
                <?php

                        }
                    } else if ($_SESSION['editData_id'] != "") {
                        echo '<script>$("#popup_background_order_afb_edit").show();</script>';
                    }else if ($_SESSION['deleteData_id'] != ""){
                        echo '<script>$("#bg_pop_delete").show();</script>';
                    }
                }
                ?>
            </div>
        </div>
    </body>

    </html>
<?php }
?>