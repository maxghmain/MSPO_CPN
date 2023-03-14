<?php
session_start();
include 'php/connect_db.php';

?>
<style>
    .display-butt {
        display: flex;
        justify-content: center;

    }

    .butt-conf-po {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-conf-po:hover {
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }

    .butt-conf-po a {
        text-decoration: none;
        color: white;
    }

    .butt-edit-po {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #fbd741;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-edit-po:hover {
        width: 60px;
        border-radius: 20px;
        background: #fda003;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-edit-po a {
        color: black;
        text-decoration: none;
    }

    .butt-cancle {
        margin: 5px;
        width: 60px;
        border-radius: 20px;
        background: #be2623;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-cancle:hover {
        width: 60px;
        border-radius: 20px;
        background: #930a00;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-cancle a {
        color: white;
        text-decoration: none;
    }

    .butt-more-detail-po {
        margin: 5px;
        width: 100px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }

    .butt-more-detail-po:hover {
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
    }

    .butt-more-detail-po a {
        color: white;
        text-decoration: none;
    }
    .search-po{
        cursor: pointer;
        height: 25px;
        width: 100px;
        border-radius: 20px;
        background: #006ebc;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
    .search-po:hover{
        width: 100px;
        border-radius: 20px;
        background: #014474;
        color: white;
        text-decoration: none;
        transition-duration: 0.3s;
    }
</style>
<div class="container_title">
    <h5>ผู้ใช้ในระบบ</h5>
</div>
    <div class="container_box">
        <div class="container_box_h1">
            <div id="table-function">
                <table>
                    <form action="" method="POST">
                        <tr>
                            <td style="border:none;">
                            รายชื่อผู้ใช้
                            </td>  
                            <td style="border:none;">
                                <a href="mspo_display.php?menu=add_user&add_user_new=alrady">เพิ่มผู้ใช้</a>
                            </td>
                        </tr>
                    </form>
                </table>
   

                <div style="display: flex;justify-content: center;margin-bottom:20px;width:100%;margin-top:10px">
                    <div id="table_data_show_display" style="border:1px solid black;width:100%;">
                        <div id="fuck">
                            <table>
                                <thead>
                                    <tr>
                                        <td style="width: 5%;">
                                            ลำดับ
                                        </td>
                                        <td style="width: 10%;">
                                            User Name
                                        </td>
                                        <td style="width: 10%;">
                                            ชื่อจริง - นามสกุล
                                        </td>
                                        <td style="width: 7%;">
                                           ฝ่าย
                                        </td>
                                        <td style="width: 10%;">
                                            ระดับUser
                                        </td>

                                        
                                        <td style="width: 10%;">
                                            ACTION
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT user_name,a.userdata_id,a.userlv_id,userlv_name,userdata_fname,userdata_lname,c.rank_id,rank_name,c.prefix_id,prefix_name,e.depart_id,depart_name
                                    FROM user_tbl as a
                                    INNER JOIN userlv_tbl as b
                                    ON a.userlv_id=b.userlv_id
                                    INNER JOIN userdata_tbl as c
                                    ON a.userdata_id=c.userdata_id
                                    INNER JOIN prefix_tbl as d
                                    ON c.prefix_id=d.prefix_id
                                    INNER JOIN rank_tbl as e
                                    ON c.rank_id=e.rank_id
                                    INNER JOIN depart_tbl as f
                                    ON e.depart_id = f.depart_id";
                                    $result = mysqli_query($conn,$sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$row['user_name']?></td>
                                        <td><?=$row['prefix_name'].' '.$row['userdata_fname'].' '.$row['userdata_lname']?></td>
                                        
                                        <td><?=$row['depart_name']?></td>
                                        <td><?php
                                        if($row['userlv_id'] == 1){
                                            echo 'ADMIN';
                                        }
                                        if($row['userlv_id'] == 2){
                                            echo 'NORMAL USER';
                                        }
                                        if($row['userlv_id'] == 3){
                                            echo 'Purchase User';
                                        }
                                        if($row['userlv_id'] == 4){
                                            echo 'Store User';
                                        }
                                        if($row['userlv_id'] == 5){
                                            echo 'Superadmin';
                                        }
                                        ?></td>
                                        <td>
                                            <div style="display:flex;">
                                            

                                            </div>
                                    </td>
                                    </tr>

                                    <?php $i++; }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php mysqli_close($conn); ?>
