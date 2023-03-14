<?php
session_start();
if ($_SESSION['userlvid'] != '') {
    header("Location: mspo_display.php");
}
/*
    if ($_SESSION['userlvid'] == '1') {
        header("Location: php/page/admin_user/home.php");
    }
    if ($_SESSION['userlvid'] == '2') {
        header("Location: php/page/normal_user/home.php");
    }
    if ($_SESSION['userlvid'] == '3') {
        header("Location: php/page/purchase_user/home.php");
    }
    if ($_SESSION['userlvid'] == '4') {
        header("Location: php/page/store_user/home.php");
    }
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css" />
    <title>เข้าสู่ระบบ-ระบบจัดการคลังวัสดุและ PO</title>
</head>

<body>
    <div class="wrapper">
        <div id="formContent">
            <div class="banner-login">
                <table style="width: 100%; text-align: left;  display: flex; justify-content: center; ">
                    <tbody>
                        <tr valign="top">
                            <td>
                                <p>
                                    <img src="img/LogoEdit.png" id="icon" alt="User Icon" style="width: 130px;" />
                                </p>
                            </td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p style="font-size: 25px;">
                                                    <strong>ระบบจัดการคลังวัสดุและPO</strong><br /> <span
                                                        style="font-size:15px;">(Material Store Managment System And
                                                        PO)</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <form style="margin-top: 20px" action="php/login.php" method="POST">
                <table class="table_inputuserpass">
                    <tbody>
                        <tr>
                            <td>
                                <p>ชื่อผู้ใช้งาน</p>
                            </td>
                            <td>
                                <p>:</p>
                            </td>
                            <td>
                                <input type="text" id="user_name" class="" name="user_name"
                                    placeholder="โปรดใส่ชื่อผู้ใช้..."
                                    value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>"
                                    class="input-field" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>รหัสผ่าน</p>
                            </td>
                            <td>
                                <p>:</p>
                            </td>
                            <td>
                                <input type="password" id="user_password" class="" name="user_password"
                                    placeholder="โปรดใส่รหัสผ่าน..."
                                    value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>"
                                    class="input-field" required/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p><input style="margin-left:330px" type="checkbox" name="emember" <?php if(isset($_COOKIE["user_name"])) { ?>checked <?php } ?> />จดจำรหัสผ่าน
             </p>
                <input type="submit" class="" value="เข้าสู่ระบบ" style="margin-top: 20px" />
            </form>
            

            <!-- Remind Passowrd -->
        </div>
    </div>
</body>

</html>