<?php
include 'config.php';
include 'helper/common.php';
// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
}
// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
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

	<title>مدیریت لیست فیش های حقوقی</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo FAV; ?>"/>

    <!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Material Design Icon -->
	<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

	<!-- RTL -->
	<link rel="stylesheet" href="assets/styles/style-rtl.css">
</head>

<body>

<div class="main-menu">
	<header class="header">
		<a href="index.php" class="logo"><i class="ico mdi mdi-cube-outline"></i>سامانه فیش حقوقی</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="assets/images/avatar-sm-1.jpg" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.php"><?php echo $_SESSION['name'] . " " . $_SESSION['lName']; ?></a></h5>
			<h5 class="position">
                <?php
                if ($_SESSION["admin"] == true) {
                    echo "مدیر سامانه";
                } else {
                    echo "کارمند";
                }
                ?>
            </h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="profile.php"><i class="fa fa-user"></i> پروفایل</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> تنظیمات سیستم</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-sign-out"></i> خروج</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">
		<div class="navigation">
			<!-- /.menu js__accordion -->
			<h5 class="title">حسابداری</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-table"></i><span>مدیریت فیش حقوقی</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="form-fileupload.php">بارگذاری لیست فیش حقوق جدید</a></li>
						<li class="current"><a href="index.php">نمایش لیست کامل حقوق</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">نمایش لیست کامل حقوق</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
        <form method="post" action="">
            <input type="hidden" value="Logout" name="but_logout" />
            <a class="ico-item mdi mdi-logout" onclick="this.parentNode.submit();"></a>
        </form>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">جدول فیش حقوقی تمامی کارمندان</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="form-fileupload.php">بارگذاری نسخه جدید</a></li>
							<li><a href="#">دریافت فایل CSV</a></li>
							<li class="split"></li>
							<li><a href="#">حذف بانک اطلاعاتی</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>نام</th>
								<th>سمت</th>
								<th>واحد</th>
								<th>سن</th>
								<th>تاریخ</th>
								<th>حقوق</th>
                                <th>دانلود فیش</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>نام</th>
                                <th>سمت</th>
                                <th>واحد</th>
                                <th>سن</th>
                                <th>تاریخ</th>
                                <th>حقوق</th>
                                <th>دانلود فیش</th>
							</tr>
						</tfoot>
						<tbody>
                        <?php
                        $payments = csvToArray('database/bookings.csv');
                        if ($payments != false && $_SESSION["admin"] ==  true) {
                            foreach ($payments as $payment){
                                if (isset($payment[0],$payment[1],$payment[2],$payment[3],$payment[4],$payment[5],$payment[6])){
                                    echo "<tr> <td>$payment[0]</td> <td>$payment[1]</td> <td>$payment[2]</td> <td>$payment[3]</td> <td>$payment[4]</td> <td>$payment[5]</td> <td><a href='print.php'>چاپ</a></td> </tr>";
                                }
                            }
                        } else {
                            foreach ($payments as $payment){
                                if (isset($payment[0],$payment[1],$payment[2],$payment[3],$payment[4],$payment[5],$payment[6]) && $payment[7] == $_SESSION['pCode']){
                                    echo "<tr> <td>$payment[0]</td> <td>$payment[1]</td> <td>$payment[2]</td> <td>$payment[3]</td> <td>$payment[4]</td> <td>$payment[5]</td> <td><a href='print.php'>چاپ</a></td> </tr>";
                                    break;
                                }
                            }
                        }
                        ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>

		</div>
		<!-- /.row small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li>توسعه توسط اسکیلدآپ</li>
				<li><a href="#">پشتیبانی</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/scripts/html5shiv.min.js"></script>
		<script src="assets/scripts/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<script src="assets/scripts/main.js"></sc