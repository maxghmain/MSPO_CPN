<?php

include 'php/connect_db.php';
session_start();
$comp_contect_name = $_SESSION['comp_contect_name'];

$sql = "INSERT INTO comp_contect_tbl(comp_contect_name,comp_contect_loca_num,comp_contect_loca_moo,comp_contect_loca_road,comp_contect_loca_s_district,comp_contect_loca_district,comp_contect_loca_prov,comp_contect_loca_codepost,comp_contect_tel,comp_contect_fex,comp_contect_people_name,comp_contect_people_note) 
VALUES ('$comp_contect_name','$comp_contect_loca_num','$comp_contect_loca_moo','$comp_contect_loca_road','$district','$amphoe','$province','$zipcode','$comp_contect_tel','ควย','$comp_contect_people_name','asdasd')";

mysqli_query($conn, $sql);


?>