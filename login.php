<?php
include "config.php";
$file = "database/users.json";
@($uDatabase = json_decode(file_get_contents($file), true));
if (isset($_POST['but_submit'])) {
    $userName = $_POST['txt_uname'];
    $pass = $_POST['txt_pwd'];
    if (!empty($userName) && !empty($pass)) {
        foreach ($uDatabase as $user) {
            if ($pass == $user["pass"]) {
                $_SESSION['uname'] = $userName;
                $_SESSION['pCode'] = $user['pCode'];
                $_SESSION["name"] = $user["name"];
                $_SESSION["lName"] = $user["lName"];
                $_SESSION["admin"] = $user["admin"];
                header('Location: index.php');
            } else {
                $errorMsg = "نام کاربری یا کلمه عبور اشتباه است";
            }
            if ($user["user"] == $userName) {
                break;
            }
        }
    }
}
if (isset($_SESSION['uname'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">

    <!-- Waves Effect -->
    <link rel="shortcut icon" type="image/png" href="<?php echo FAV; ?>"/>
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

    <!-- RTL -->
    <link rel="stylesheet" href="assets/styles/style-rtl.css">
</head>

<body>

<div id="single-wrapper">
    <form method="post" action="" class="frm-single">
        <div class="inside">
            <div class="title"><strong>سامانه مدیریت</strong> فیش حقوقی</div>
            <!-- /.title -->
            <div class="frm-title">ورود</div>
            <!-- /.frm-title -->
            <?php
            if (!empty($errorMsg)) {
                echo "<div style='color:red;' class='frm-title'>$errorMsg</div>";
            }
            ?>
            <div class="frm-input"><input type="text" name="txt_uname" placeholder="کدپرسنلی" class="frm-inp"><i
                        class="fa fa-user frm-ico"></i></div>
            <!-- /.frm-input -->
            <div class="frm-input"><input type="password" name="txt_pwd" placeholder="رمزعبور" class="frm-inp"><i
                        class="fa fa-lock frm-ico"></i></div>
            <!-- /.frm-input -->

            <!-- /.clearfix -->
            <button type="submit" name="but_submit" class="frm-submit">ورود<i class="fa fa-arrow-circle-right"></i>
            </button>

            <!-- /.row -->
            <div class="frm-footer">توسعه توسط اسکیلدآپ</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>
    <!-- /.frm-single -->
</div><!--/#single-wrapper -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/script/html5shiv.min.js"></script>
<script src="assets/script/respond.min.js"></script>
<![endif]-->
<!--
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/plugin/waves/waves.min.js"></script>

<script src="assets/scripts/main.min.js"></script>
</body>
</html>