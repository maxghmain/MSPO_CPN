<?php
include 'php/connect_db.php';
$sql = "SELECT comp_contect_name FROM comp_contect_tbl WHERE comp_contect_name = $comp_name";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result)){
    $row['comp_contect_name'] = $comp_name;
}else{
    $sql = "INSERT INTO comp_contect_tbl(comp_contect_tbl,comp_contect_loca_num,comp_contect_loca_moo,comp_contect_loca_road,comp_contect_loca_s_district,comp_contect_loca_district,comp_contect_loca_prov,comp_contect_loca_codepost,comp_contect_tel,comp_contect_fex,comp_contect_people_name 
VALUES ('$comp_name',"
}
?>