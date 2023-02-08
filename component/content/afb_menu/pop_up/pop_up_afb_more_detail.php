<?php
include 'php/connect.php';
?>
<div id="showDetails_afb" style="display: none;">
   <?php
   $sql = "SELECT * FROM form_afb_tbl";
   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_array($query)){
    echo $row['form_afb_id'];
   }
   ?>
</div>