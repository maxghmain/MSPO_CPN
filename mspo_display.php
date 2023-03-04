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
    $_SESSION['page'] = $_GET['page'];
    $_SESSION['cancle_afb'] = $_GET['cancle_afb'];
    $_SESSION['po_material'] = $_GET['po_material'];
    $_SESSION['add_afb'] = $_GET['add_afb'];
    $_SESSION['add_item'] = $_GET['add_item'];
    $_SESSION['add_company'] = $_GET['add_company'];
    $_SESSION['add_company_new'] = $_GET['add_company_new'];
    $_SESSION['comfirm_po'] = $_GET['comfirm_po'];

    $user_id = $_SESSION['userid'];

    $num_afb = $_GET['num_afb'];
    $num_book_afb = $_GET['num_book_afb'];
    $create_afb_date = $_GET['create_afb_date'];
    $work_for = $_GET['work_for'];
    $name_afb_ark = $_GET['name_afb_ark'];
    $name_afb_ark_conf = $_GET['name_afb_ark_conf'];
    $afb_group_id = $_GET['afb_group_id'];
    $order_afb_id = $_GET['order_afb_id'];

    /* รับ Session จากการเพิ่มรายการใบขอซื้อ */
    $name_not_order_afb = $_GET['name_not_order_afb'];
    $name_yes_order_afb = $_GET['name_yes_order_afb'];
    $value_order_afb = $_GET['value_order_afb'];
    $unit_order_afb = $_GET['unit_order_afb'];
    $subject_order = $_GET['subject_order'];
    $form_afb_id = $_SESSION['form_afb_id'];
    $comp_name = $_SESSION['comp_name'];

    /* Session รับค่าที่พิมพ์เก็บไว้ เมื่อรีเฟรชจะไม่หายไป ของเพิ่มใบขอซื้อ */
    $_SESSION['item_Number'] = $_GET['item_Number'];
    $item_Number = $_GET['item_Number'];
    $_SESSION['item_Number_select'] = $_GET['item_Number_select'];
    $item_Number_select = $_SESSION['item_Number_select'];
    $name_item = $_GET['name_item'];
    $_SESSION['name_item'] = $_GET['name_item'];
    $value_item = $_GET['value_item'];
    $_SESSION['value_item'] = $_GET['value_item'];
    $unit_item = $_GET['unit_item'];
    $_SESSION['unit_item'] = $_GET['unit_item'];
    $note_item = $_GET['note_item'];
    $_SESSION['note_item'] = $_GET['note_item'];
    $form_afbnum = $_GET['form_afbnum'];
    $_SESSION['form_afbnum'] = $_GET['form_afbnum'];
    $form_afbbook = $_GET['form_afbbook'];
    $_SESSION['form_afbbook'] = $_GET['form_afbbook'];
    $group_id_item = $_GET['group_id_item'];
    $_SESSION['group_id_item'] = $_GET['group_id_item'];
    $form_afb_pel = $_GET['form_afb_pel'];
    $_SESSION['form_afb_pel'] = $_GET['form_afb_pel'];
    $select_comp = $_GET['select_comp'];
    $_SESSION['select_comp'] = $_GET['select_comp'];
    $select_and_add_comp = $_GET['select_and_add_comp'];
    $_SESSION['select_and_add_comp'] = $_GET['select_and_add_comp'];
    $item_id = $_SESSION['item_id'];
    $_SESSION['item_id'] = $_GET['item_id'];
    
    $item_price = $_POST['item_price'];
    $order_id = $_SESSION['order_id'];
    $_SESSION['order_id'] = $_GET['order_id'];
    $po_number = $_SESSION['po_number'];
    /* PO */
    $po_id = $_SESSION['po_id'];

    $order_detail = $_SESSION['order_detail'];



    $_SESSION['po_id_select'] = $_GET['po_id_select'];
    $po_id_select = $_SESSION['po_id_select'];

    $_SESSION['check_in'] = $_GET['check_in'];
    $check_in = $_SESSION['check_in'];

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


        <link rel="stylesheet" href="js/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>

        <script type="text/javascript" src="js/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/JQL.min.js"></script>

        <script type="text/javascript" src="js/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

        <script type="text/javascript" src="js/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

        

        <title>ระบบจัดการคลังวัสดุและ PO - Display</title>
        <?php
        if ($_SESSION['userlvid'] == 1) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=55" />
        <?php
        }
        if ($_SESSION['userlvid'] == 2) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=55" />
        <?php
        }
        if ($_SESSION['userlvid'] == 3) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=55" />
        <?php
        }
        if ($_SESSION['userlvid'] == 4) {
        ?>
            <link rel="stylesheet" href="css/store_dashboard.css?version=55" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_select_menu') {
        ?>
            <link rel="stylesheet" href="css/component/afb_select_menu.css?version=55" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_add_afb') {
        ?>
            <link rel="stylesheet" href="css/component/afb_add_afb.css?version=551" />
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
                    include 'component/content/afb_menu/pop_up/confirm_popup_delete.php';
                    echo '<script>$("#bg_pop_alert_succ").hide(); $("#popup_background_order_afb_edit").hide();$("#bg_pop").hide();$("#bg_pop_delete").hide();</script>';
                    /*popup เพิ่มรายการของใบขอซื้อ*/
                    /* addData_Page_toggle */
                    if ($_SESSION['addData_id'] != "") {
                        echo '<script>$("#bg_pop").show();</script>';
                        if ($_SESSION['add_last_state'] != "") {
                            echo '<script>$("#bg_pop_alert_succ").show();</script>';
                            echo  '<script>setTimeout(hide_pop_succ_alert,3000);</script>';
                        } else if ($_SESSION['delete_last_state'] != "") {
                            echo '<script>$("#bg_pop_alert_succ").show();</script>';
                            echo  '<script>setTimeout(hide_pop_succ_alert,3000);</script>';
                        } else if ($_SESSION['editData_id'] != "") {
                            echo '<script>$("#popup_background_order_afb_edit").show();</script>';
                        } else if ($_SESSION['deleteData_id'] != "") {
                            echo '<script>$("#bg_pop_delete").show();</script>';
                        } else if ($_SESSION['state_excecut'] == "addData") {
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
                        } else if ($_SESSION['editData_id'] != "") {
                            echo '<script>$("#popup_background_order_afb_edit").show();</script>';
                        } else if ($_SESSION['deleteData_id'] != "") {
                            echo '<script>$("#bg_pop_delete").show();</script>';
                            if ($_SESSION['state_excecut'] == "deleteData") {
                                echo '<script>';
                                echo '$("#bg_pop_delete").hide(); $("#bg_loading").show(); setTimeout(loading_hide,500);';
                                echo '</script>';
                                include 'component/content/afb_menu/function/delete_order_afb_out_db_func.php';
                                echo '<script>';
                                echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . '&deleteData_id' . $_SESSION['deleteData_id'] . '=&state_excecut=deleteSuccess")';
                                echo '</script>';
                            } else if ($_SESSION['state_excecut'] == "deleteSuccess") {
                                echo '<script>';
                                echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&addData_id=' . $row_add . 'state_excecut=deleteSuccess")';
                                echo '</script>';
                            ?>
                                <script type="text/javascript">
                                    window.location = '../mspo_cpn/mspo_display.php?menu=afb_add_afb&editData_id='
                                    <?php echo $row_add; ?>;
                                </script>
                            <?php
                            }
                        }
                        /*   EDIT DATA */
                    } else if ($_SESSION['editData_id'] != "") {
                        echo '<script>$("#popup_background_order_afb_edit").show();</script>';
                        if ($_SESSION['state_excecut'] == "editData") {
                            echo '<script>';
                            echo '$("#bg_loading").show(); setTimeout(loading_hide,500);';
                            echo '</script>';
                            include 'component/content/afb_menu/function/update_oder_afb_to_db_func.php';
                            echo '<script>';
                            echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&state_excecut=editSuccess")';
                            echo '</script>';
                        } else if ($_SESSION['state_excecut'] == "editSuccess") {
                            ?>
                            <script type="text/javascript">
                                window.location = '../mspo_cpn/mspo_display.php?menu=afb_add_afb';
                            </script>
                        <?php
                        }


                        /*   DELETE DATA */
                    } else if ($_SESSION['deleteData_id'] != "") {
                        echo '<script>$("#bg_pop_delete").show();</script>';
                        if ($_SESSION['state_excecut'] == "deleteData") {
                            echo '<script>';
                            echo '$("#bg_pop_delete").hide(); $("#bg_loading").show(); setTimeout(loading_hide,500);';
                            echo '</script>';
                            include 'component/content/afb_menu/function/delete_order_afb_out_db_func.php';
                            echo '<script>';
                            echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&state_excecut=deleteSuccess")';
                            echo '</script>';
                        } else if ($_SESSION['state_excecut'] == "deleteSuccess") {
                        ?>
                            <script type="text/javascript">
                                window.location = '../mspo_cpn/mspo_display.php?menu=afb_add_afb';
                            </script>
                <?php
                        }/*else if($_SESSION['state_excecut'] == "saveData"){
                            echo '<script>';
                            echo ' $("#bg_loading").show(); setTimeout(loading_hide,500);';
                            echo '</script>';
                            include 'component/content/afb_menu/function/save_all_to_move_to_next_stat_func.php';
                            echo '<script>';
                            echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=afb_add_afb&saveData&state_excecut=saveDataSuccess")';
                            echo '</script>';
                        }/*else if ($_SESSION['state_excecut'] == "saveDataSuccess") {
                            ?>
                                <script type="text/javascript">
                                    window.location = '../mspo_cpn/mspo_display.php?menu=state_afb';
                                </script>
                    <?php
                            }*/
                    }
                } else if ($_SESSION['menu'] == "state_afb") {
                    include 'component/content/afb_menu/state_afb.php';
                    if ($form_afb_id != "" && $_SESSION['state_excecut'] == "cancle_afb") {
                        include 'component/content/afb_menu/function/cancle_afb.php';

                        echo '<script>';
                        echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=state_afb")';
                        echo '</script>';
                    }
                } else if ($_SESSION['state_excecut'] == "saveData") {
                    include 'component/content/afb_menu/function/save_all_to_move_to_next_stat_func.php';

                    echo '<script>';
                    echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=state_afb")';
                    echo '</script>';
                } else if ($_SESSION['menu'] == "item_wait_for_use") {
                    include 'component/content/afb_menu/item_wait_for_use.php';
                    include 'component/content/afb_menu/pop_up/pop_up_afb_more_detail.php';
                } else if ($_SESSION['menu'] == "history_afb") {
                    include 'component/content/afb_menu/history_afb.php';
                }
                if ($_SESSION['item_Number'] != "") {

                    echo '<script>';
                    echo '$("#showDetails_afb").show();';
                    echo '</script>';
                } else if ($_SESSION['menu'] == "po_select_menu") {
                    include 'component/content/po_menu/po_select_menu.php';
                } else if ($_SESSION['menu'] == "po_material") {
                    include 'component/content/po_menu/function/check_po_id_material.php';
                    include 'component/content/po_menu/po_material.php';
                    if ($_SESSION['add_item'] == "already_selected") {
                        include 'component/content/po_menu/popup/add_po_afb.php';
                    }
                    
                    
                    else if ($_SESSION['state_excecut'] == "select_item") {
                        include 'component/content/po_menu/function/insert_afb_to_po.php';
                        
                    }
                    if ($_SESSION['add_company'] == "already_selected") {

                        include 'component/content/po_menu/popup/pop_add_company.php';

                    } else if ($_SESSION['add_company'] == "select_company") {
                        include 'component/content/po_menu/function/insert_copany.php';
                    }else if ($_SESSION['add_company'] == "select_and_add_comp"){
                        include 'component/content/po_menu/function/update_po.php';
                        echo '<script>';
                        echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=po_material")';
                        echo '</script>';
                    }else if($_SESSION['state_excecut'] == "save_price_item"){
                       
                      include 'component/content/po_menu/function/sum_price_item.php';
                    }else if($_SESSION['state_excecut'] == "save_print_po"){
                        include 'component/content/po_menu/function/save_po.php';
                        echo '<script>';
                        echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=po_wait_conf")';
                        echo '</script>';
                       

                    }
                    
                    if($_SESSION['add_company_new'] == "already_selected"){
                        include 'component/content/po_menu/popup/pop_add_company_new.php';
                    }else if($_SESSION['add_company_new'] == "save_comp_new"){
                        include 'component/content/po_menu/function/save_comp_new.php';
                    }
                } else if ($_SESSION['menu'] == "po_service") {
                    include 'component/content/po_menu/function/check_po_id_service.php';
                    include 'component/content/po_menu/po_service.php';
                } else if ($_SESSION['menu'] == "total_items") {
                    include 'component/content/total_item/total_item.php';
                }
                if($_SESSION['menu'] == "po_wait_conf"){
                    include 'component/content/po_menu/po_wait_conf.php';

                }if ($_SESSION['comfirm_po'] == "alrady_comfirm"){
                    include 'component/content/po_menu/popup/comfirm_po.php'; 
                }if($_SESSION['state_excecut'] == "comfirm_po_sure"){
                    include 'component/content/po_menu/function/confirm_po.php';
                    echo '<script>';
                    echo 'window.location.assign("../mspo_cpn/mspo_display.php?menu=po_wait_conf")';
                    echo '</script>';
                }
                /* STORE USER */
                if($_SESSION['menu'] == "po_check_in"){
                    include 'component/content/store_po_wait/po_check_in.php';
                }
                if($_SESSION['menu'] == "history_po_item"){
                    include 'component/content/history_po_item/history_po_item.php';
                }
                if($_SESSION['state_excecut'] == "check_in_list"){
                    include 'component/content/store_po_wait/popup/check_in_list.php';
                }
                ?>
            </div>
        </div>
    </body>

    </html>
<?php }
?>