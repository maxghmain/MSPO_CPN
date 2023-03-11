<?php
                    session_start();
                    include 'php/connect_db.php';

                    date_default_timezone_set('Asia/Kolkata');
                    $date = date("Y/m/d h:i:sa");
                    $sql = "UPDATE order_tbl SET order_queantity = order_queantity-$input_value_check_in,state_id = 15  WHERE order_id = $order_id_input";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE po_tbl SET state_id = 15 WHERE po_id = $check_in";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE po_logs_tbl SET state_id = 15 WHERE po_id = $check_in";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE material_tbl 
    SET material_value = material_value+$input_value_check_in,material_type_id=$type_material,material_class_shelf_id=$class_shelf
    WHERE material_name = '$name_item_check_in'";
                    mysqli_query($conn, $sql);

                    $sql = "INSERT INTO pick_in_out_logs_tbl(pick_in_out_val,pick_in_out_pel,pick_in_out_price,pick_in_out_sumval,pick_in_out_date,pick_in_name,depart_id,state_id)
VALUES('$input_value_check_in','$fullname_depart','$price_item_not_sum','$input_value_check_in','$date','$name_item_check_in',10,17)";
                    mysqli_query($conn, $sql);

                    mysqli_close($conn);
                    ?>