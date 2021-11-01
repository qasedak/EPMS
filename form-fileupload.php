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

	<title>Multiple File Upload - My Admin Template</title>

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
	
	<!-- Dropify -->
	<link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">

	<!-- RTL -->
	<link rel="stylesheet" href="assets/styles/style-rtl.css">
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.php" class="logo"><i class="ico mdi mdi-cube-outline"></i>سامانه فیش حقوقی</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="assets/images/avatar-sm-5.jpg" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.php">محمد عنبرستانی</a></h5>
			<h5 class="position">حسابدار ارشد</h5>
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
                        <li class="current"><a href="form-fileupload.php">بارگذاری لیست فیش حقوق جدید</a></li>
                        <li><a href="index.php">نمایش لیست کامل حقوق</a></li>
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
		<h1 class="page-title">بارگذاری بانک اطلاعاتی</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<!-- /.ico-item -->
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
					<h4 class="box-title">بارگذاری نسخه جدید</h4>
					<!-- /.box-title -->
					<input type="file" accept=".csv" id="input-file-now" class="dropify" />
                    <label>فقط فایل با پسوند CSV بارگذاری شود.</label>
                </div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->

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
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
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

	<!-- Dropify -->
	<script src="assets/plugin/dropify/js/dropify.js"></script>
	<script src="assets/scripts/fileUpload.demo.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>