<?php
session_start();
include 'php/connect_db.php';
$comp_name_new = $_POST['comp_name_new'];
$num_address_comp_new = $_POST['num_address_comp_new'];
$road_comp_new = $_POST['road_comp_new'];
$moo_comp_new = $_POST['moo_comp_new'];
$tambon_comp_new = $_POST['tambon_comp_new'];
$amthur_comp_new = $_POST['amthur_comp_new'];
$provinc_comp_new = $_POST['provinc_comp_new'];
$zipcode_comp_new = $_POST['zipcode_comp_new'];
$tel_comp_new = $_POST['tel_comp_new'];
$fex_comp_new = $_POST['fex_comp_new'];
$people_cont_new = $_POST['people_cont_new'];
$note_comp_new = $_POST['note_comp_new'];
$sql = "SELECT * FROM comp_contect_tbl ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if ($row['comp_contect_name'] != $comp_name_new){
    $sql = "INSERT INTO comp_contect_tbl(comp_contect_name, comp_contect_loca_num, comp_contect_loca_moo, comp_contect_loca_road, comp_contect_loca_s_district, comp_contect_loca_district, comp_contect_loca_prov, comp_contect_loca_codepost, comp_contect_tel, comp_contect_fex, comp_contect_people_name, comp_contect_people_note) 
    VALUES ('$comp_name_new','$num_address_comp_new','$road_comp_new','$moo_comp_new','$tambon_comp_new',' $amthur_comp_new','$provinc_comp_new','$zipcode_comp_new','$tel_comp_new','$fex_comp_new','$people_cont_new','$note_comp_new')";
    mysqli_query($conn,$sql);
}

mysqli_close($conn);
?>

