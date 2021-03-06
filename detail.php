<?php
    if(isset($_GET["quantity"])){
        $nameSetting = $_GET['name'];
        $quantitySetting = $_GET['quantity'];
    }else {
        //header('Location: create.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill Chi Tiết</title>
    <link rel="shortcut icon" href="jquery-mobile/demos/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <h3 id="name-setting"><?php echo ($nameSetting); ?></h3>
        <span id="time-create" style="display: none"><?php echo time(); ?></span>
        <span id="quantity-setting" style="display: none"><?php echo $quantitySetting; ?></span>
        <div>
            <div class="ui-grid-d">
                <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tên Hàng</div></div>
                <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">SL</div></div>
                <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Giá</div></div>
                <div class="ui-block-e"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tiền</div></div>
            </div>
                <?php for($i=1;$i<=$quantitySetting;$i++): ?>
                    <?php
                        $name = 'name-'.$i;
                        $price = 'price-'.$i;
                        $quantity = 'quantity-'.$i;
                        $total = 'total-'.$i;
                    ?>
                    <fieldset class="ui-grid-d">
                        <div class="ui-block-a"><input type="text"  value="<?php echo $i; ?>" style="text-align: center;" readonly="readonly"></div>
                        <div class="ui-block-b"><input type="text" id="<?php echo $name; ?>" name="<?php echo $name; ?>"value=""></div>
                        <div class="ui-block-c"><input type="text" id="<?php echo $quantity; ?>" name="<?php echo $quantity; ?>" value="" style="text-align: right;" maxlength="3"></div>
                        <div class="ui-block-d"><input type="text" id="<?php echo $price; ?>" name="<?php echo $price; ?>" value="" style="text-align: right;" maxlength="3"></div>
                        <div class="ui-block-e"><input type="text" id="<?php echo $total; ?>" value="" style="text-align: right;" maxlength="7"></div>
                    </fieldset>
                <?php endfor ?>


            <div class="ui-grid-b">
                <div class="ui-block-a" style="width: 56% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                <div class="ui-block-b" style="width: 24% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tổng</div></div>
                <div class="ui-block-e"><input type="text" id="total" value="" style="text-align: right;" readonly="readonly"></div>
            </div>


        </div><!--/demo-html -->

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

