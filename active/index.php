
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kích hoạt</title>
    <link rel="shortcut icon" href="../jquery-mobile/demos/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../jquery-mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="../jquery-mobile/demos/_assets/css/jqm-demos.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../jquery-mobile/demos/js/jquery.js"></script>
    <script src="../jquery-mobile/demos/_assets/js/index.js"></script>
    <script src="../jquery-mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="../js/panel.js"></script>
    <script src="../js/create.js"></script>
    <script src="../js/detail.js"></script>
    <script src="../js/draft.js"></script>
    <script src="../js/active.js"></script>
</head>
<body>

<div data-role="header" data-position="fixed" data-theme="a">
    <h1>Kích hoạt</h1>
    <a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
</div><!-- /header -->

<div data-role="page" id="a">

    <div role="main" class="ui-content">
        <form id="frm-active" method="get" action="execute.php">
            <label for="text-1">Nhập số điện thoại của bạn:</label>
            <input type="text" name="active-code" id="active-code" value="">
            <input id="btn-active" type="button" value="Kích hoạt" data-inline="true">
            <input id="btn-reset" type="reset" value="Nhập lại" data-inline="true">
        </form>
    </div><!-- /content -->
    <div data-role="footer" data-position="fixed" data-theme="a">

    </div><!-- /footer -->

</div><!-- /page -->

<div data-role="panel" id="outside" data-theme="b">
    <ul data-role="listview">
        <li data-icon="back"><a href="#" data-rel="close">Đóng</a></li>
        <li><a href="../index.php">Giới thiệu</a></li>
        <li><a href="../create.php">Tạo Bill Mới</a></li>
    </ul>
</div>

</body>
</html>
