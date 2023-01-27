<?php
session_start();

if (!$_SESSION['username']) {
    header("index.php");
} else {
    include 'php/connect_db.php';
    $_SESSION['menu'] = $_GET['menu'];
    $_SESSION['insert_data'] = $_GET['insert_data'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/javascript" src="js/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="js/custom/popup_add_order_afb_button.js"></script>
        <script type="text/javascript" src="js/custom//in_popup_add_order_afb_button_func.js"></script>
        <script type="text/javascript" src="js/custom/edit_delete_butt_get_value.js"></script>
        <title>ระบบจัดการคลังวัสดุและ PO - Display</title>
        <?php
        if ($_SESSION['userlvid'] == 1) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=0sasdasqwedss1" />
        <?php
        }
        if ($_SESSION['userlvid'] == 2) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=0sasdqasdwess1" />
        <?php
        }
        if ($_SESSION['userlvid'] == 3) {
        ?>
            <link rel="stylesheet" href="css/purchase_dashboard.css?version=0ssasqasdweds1" />
        <?php
        }
        if ($_SESSION['userlvid'] == 4) {
        ?>
            <link rel="stylesheet" href="css/store_dashboard.css?version=01asdaaqwasdesdsds" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_select_menu') {
        ?>
            <link rel="stylesheet" href="css/component/afb_select_menu.css?version=0s1s5qweasdasd44s" />
        <?php
        }
        if ($_SESSION['menu'] == 'afb_add_afb') {
        ?>
            <link rel="stylesheet" href="css/component/afb_add_afb.css?version=02qwฟหกe" />
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
                if ($_SESSION['menu'] == "dashboard") {
                ?>
                    <?php
                    include 'component/content/dashboard.php';
                    ?>
                <?php }
                /*--------------------เมนูของ Purchase User------------------------*/
                /*เมนูของ ใบขอซื้อ */
                if ($_SESSION['menu'] == "afb_select_menu") {
                    include 'component/content/afb_menu/afb_select_menu.php';
                ?>
                <?php }
                /*เมนูของ เพิ่มใบขอซื้อ */
                if ($_SESSION['menu'] == "afb_add_afb") {
                    include 'component/content/afb_menu/function/chack_state_and _id_form_afb_func.php';
                  include 'component/content/afb_menu/afb_add_afb.php';
                    if($_SESSION['insert_data'] == "yes"){
                        include 'component/content/afb_menu/function/in_popup_add_order_afb_insert_to_db_func.php';
                        include 'component/content/afb_menu/afb_add_afb.php';
                        $_SESSION['insert_data'] = "no";
                    }
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php }
                if ($_SESSION['menu'] == "") {
                ?>
                <?php } ?>
            </div>
        </div>
    </body>

    </html>
<?php } ?>