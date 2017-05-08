
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tạo Bill Mới</title>
    <link rel="shortcut icon" href="jquery-mobile/demos/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="jquery-mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="jquery-mobile/demos/_assets/css/jqm-demos.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="jquery-mobile/demos/js/jquery.js"></script>
    <script src="jquery-mobile/demos/_assets/js/index.js"></script>
    <script src="jquery-mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/panel.js"></script>
    <script src="js/create.js"></script>
    <script src="js/detail.js"></script>
</head>
<body>

<div data-role="header" data-position="fixed" data-theme="a">
    <h1>Bill Creater</h1>
    <a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
</div><!-- /header -->

<div data-role="page" id="a">

    <div role="main" class="ui-content">

        <h2>Thiết lập</h2>
        <form id="frm-bill-setting" method="get" action="detail.php">
            <label for="text-1">Tên khách:</label>
            <input type="text" name="name" id="txt-name" value="">
            <label for="number-2">Số hàng:</label>
            <input type="number" id="quantity" name="quantity" pattern="[0-9]*" id="txt-quantity" value="10" style="text-align: right;">
            <input id="btn-create" type="submit" value="Tạo bill" data-inline="true">
            <input id="btn-reset" type="reset" value="Nhập lại" data-inline="true">
        </form>
    </div><!-- /content -->
    <div data-role="footer" data-position="fixed" data-theme="a">
        <h1>&nbsp;</h1>
    </div><!-- /footer -->

</div><!-- /page -->

<div data-role="panel" id="outside" data-theme="b">
    <ul data-role="listview">
        <li data-icon="back"><a href="#" data-rel="close">Đóng</a></li>
        <li><a href="index.php">Giới thiệu</a></li>
        <li><a href="create.php">Tạo Bill Mới</a></li>
    </ul>
</div>

</body>
</html>
