<?php
function select_name_not($name_not_data){
    include 'php/connect_db.php';
    $sql = "SELECT name_ms_normal_name FROM name_ms_tbl;";
    $query = mysqli_query($conn, $sql);
    $name_not_data = [];
    $count = 0;
    while($row = mysqli_fetch_array($query)){
        $name_not_data[$count] = $row['name_ms_normal_name'];
        $count++;
    }
    $count = 0;
    mysqli_close($conn);
    return $name_not_data; 
}
?>