<?php
session_start();
/*$_SESSION['addData_id'] = $_GET['addData_id'];
$_SESSION['state_excecut'] = $_GET['state_excecut'];*/
/***************************************************************/
/************************AFB Menu Input************************/
/* SESSION INPUT LOGS FORM ใบขอซื้อ */
    $_SESSION['num_afb'] = $_GET['num_afb'];
    $_SESSION['num_book_afb'] = $_GET['num_book_afb'];
    $_SESSION['create_afb_date'] = $_GET['create_afb_date'];
    $_SESSION['work_for'] = $_GET['work_for'];
    $_SESSION['name_afb_ark'] = $_GET['name_afb_ark'];
    $_SESSION['name_afb_ark_conf'] = $_GET['name_afb_ark_conf'];
/* SESSION INPUT LOGS FORM รายการใบขอซื้อ */
    $_SESSION['name_not_order_afb'] = $_GET['name_not_order_afb'];
    $_SESSION['name_yes_order_afb'] = $_GET['name_yes_order_afb'];
    $_SESSION['value_order_afb'] = $_GET['value_order_afb'];
    $_SESSION['unit_order_afb'] = $_GET['unit_order_afb'];
    $_SESSION['subject_order'] = $_GET['subject_order'];
    $_SESSION['group_id'] = $_GET['group_id'];
/***************************************************************/