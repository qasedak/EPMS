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
    <link rel="shortcut icon" type="image/png" href="<?php echo FAV; ?>"/>
    <link rel="stylesheet" href="assets/styles/print.css"/>
    <title>چاپ فیش حقوقی</title>
</head>

<body>

<div class="page-header" style="text-align: center">
    <h3>
        فیش حقوقی مورخ :
    </h3>
    <button type="button" onClick="window.print()" style="background: #6dbff6">
        چاپ
    </button>
</div>

<div class="page-footer">
    <button onclick="goBack()">بازگشت</button>
    <span>توسعه توسط اسکیلدآپ</span>
</div>

<table>

    <thead>
    <tr>
        <td>
            <!--place holder for the fixed-position header-->
            <div class="page-header-space"></div>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <table class="main-table" style="width:100%">
            <tbody>
            <table>
                <tbody>
                <tr>
                    <td>کدپرسنلی:</td>
                    <td>شماره ملی:</td>
                    <td>شماره بیمه:</td>
                </tr>
                <tr>
                    <td>نام و نام خانوادگی:</td>
                    <td>ماه و سال:</td>
                    <td>شماره حساب بانکی:</td>
                </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                <tr class="details-tb" style="background-color: #dedede">
                    <td colspan="2">کارکرد</td>
                    <td colspan="2">حقوق و مزایا</td>
                    <td colspan="2">کسورات</td>
                    <td colspan="2">سایر اطلاعات</td>
                </tr>
                <tr class="details-sub">
                    <td class="sub-right">آیتم 1</td>
                    <td class="sub-left">21332</td>
                    <td class="sub-right">آیتم 2</td>
                    <td class="sub-left">2312344</td>
                    <td class="sub-right">آیتم 3</td>
                    <td class="sub-left">988932</td>
                    <td class="sub-right">آیتم4</td>
                    <td class="sub-left">526</td>
                </tr>
                <tr class="details-sub">
                    <td class="sub-right">آیتم 1</td>
                    <td class="sub-left">21332</td>
                    <td class="sub-right">آیتم 2</td>
                    <td class="sub-left">2312344</td>
                    <td class="sub-right">آیتم 3</td>
                    <td class="sub-left">988932</td>
                    <td class="sub-right">آیتم4</td>
                    <td class="sub-left">526</td>
                </tr>
                <tr class="details-sub">
                    <td class="sub-right">آیتم 1</td>
                    <td class="sub-left">21332</td>
                    <td class="sub-right">آیتم 2</td>
                    <td class="sub-left">2312344</td>
                    <td class="sub-right">آیتم 3</td>
                    <td class="sub-left">988932</td>
                    <td class="sub-right">آیتم4</td>
                    <td class="sub-left">526</td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="details-tb">
                    <td colspan="2"></td>
                    <td colspan="2" style="background-color: #dedede">جمع: 9838917213</td>
                    <td colspan="2" style="background-color: #dedede">جمع: 8783127</td>
                    <td colspan="2"></td>
                </tr>
                </tfoot>
            </table>
            </tbody>
        </table>
    </tr>
    <tr>
        <td>
            <!--*** CONTENT GOES HERE ***-->
            <div>
                <span>مبلغ خالص پرداختی: 897679798 ریال</span>
                <p>
                    تذکر این فیش بدون مهر کارگزینی شرکت فاقد اعتبار است
                </p>
            </div>
        </td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td>
            <!--place holder for the fixed-position footer-->
            <div class="page-footer-space"></div>
        </td>
    </tr>
    </tfoot>

</table>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>
