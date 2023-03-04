<?php 
include('connect_db.php');
    session_start();

    if (isset($_POST['user_name'])) {

        $username = $_POST['user_name'];
        $password = MD5($_POST['user_password']);

        $query = ("SELECT user_id,user_name,user_password,b.userlv_id as userlv_id_get,userlv_name,userdata_fname,userdata_lname,rank_name FROM user_tbl as a
        INNER JOIN userlv_tbl as b 
        ON a.userlv_id = b.userlv_id
        INNER JOIN userdata_tbl as c
        ON a.userdata_id = c.userdata_id
        INNER JOIN rank_tbl as d 
        ON c.rank_id = d.rank_id

        WHERE user_name = '$username' AND user_password = '$password'
        ");

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['userdatafullname'] = $row['userdata_fname'].' '.$row['userdata_lname'];
            $_SESSION['userlvid'] = $row['userlv_id_get'];
            $_SESSION['userlvname'] = $row['userlv_name'];
            $_SESSION['rankname'] = $row['rank_name'];
            
            if ($_SESSION['userlvid'] != '') {
                $_SESSION['menu'] == "dashboard";
                header("Location: ../mspo_display.php?menu=dashboard");
            }
            /*
            if ($_SESSION['userlvid'] == '1') {
                header("Location: ../../php/page/admin_user/home.php");
            }
            if ($_SESSION['userlvid'] == '2') {
                header("Location: ../../php/page/normal_user/home.php");
            }
            if ($_SESSION['userlvid'] == '3') {
                header("Location: ../../php/page/purchase_user/home.php");
            }
            if ($_SESSION['userlvid'] == '4') {
                header("Location: ../../php/page/store_user/home.php");
            }
            */
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>'";
            header('Refresh:0; url=../index.php');
        }

    } else {
        header("Location:../index.php");
    }

mysqli_close($conn);
?>