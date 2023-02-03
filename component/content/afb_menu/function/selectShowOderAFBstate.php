<style>
    .titel_afb_row {
        border: 1px solid #006ebc;
        width: 100%;
        margin: 10px;
        border-radius: 10px;
        
    }

    .box_afb {
        width: 100%;
        display: flex;
       /* border: 1px solid red;*/
        height: auto;
    }

    .afb_info_box {
        display: flex;
        /*border: 1px solid red;*/
    }
</style>
<?php
include 'php/connect_db.php';
$sql = "SELECT * FROM form_afb_tbl LIMIT 3";
$result = $conn->query($sql);
$result = $conn->query($sql);

// Check if the query returned any data
if ($result->num_rows > 0) {
    // Loop through the results and display each row
    while ($row = $result->fetch_assoc()) {
        if ($row['state_id'] == 1) {
            echo '<div class="box_afb">';
                echo '<div class="titel_afb_row">';
                    echo '<div style="font-size:20px;text-align:center;background: #006ebc;color:#fff; border-radius: 10px;">';
                        echo 'ใบขอซื้อ';
                    echo '</div>';
                    echo '<br>';
                    echo '<div class="afb_info_box">';
                        echo '<div style="width:100%;">';
                            echo 'เล่มที่ :' . $row['form_afb_number'];
                        echo '</div>';
                    echo '<div style="width:100%;">';
                        echo 'เลขที่ :' . $row['form_afb_book_number'];
                    echo '</div>';
                echo '</div>';
                echo '<div class="afb_info_box">';
                    echo '<div style="width:100%;">';
                        echo 'วันที่เขียน :' . $row['form_afb_write_date'];
                    echo '</div>';
                    echo '<div style="width:100%;">';
                        echo 'วันที่เพิ่มลงระบบ :' . $row['form_afb_savesys_date'];
                    echo '</div>';
                    echo '</div>';
                    echo '<br>';
                echo '</div>';
               
            echo '</div>';
        }
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>