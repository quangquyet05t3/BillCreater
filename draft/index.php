<?php
require $_SERVER["DOCUMENT_ROOT"] . '/library/User.php';
if(!isset($_COOKIE[User::COOKIE_USER_ID])) {
    echo '<script>window.location.href = "../active";</script>';
}

$quantitySetting=2;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill Nháp</title>
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

</head>
<body>
<div data-role="header" data-position="fixed" data-theme="a">
    <h1>Bill Nháp</h1>
    <a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
</div><!-- /header -->

<div data-role="page" id="a">

    <div role="main" class="ui-content">
        <a id="button-setting" href="#popupSetting" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-plus ui-btn-icon-left ui-btn-a" data-transition="pop" aria-expanded="true">Tạo mới bill nháp</a>
        <div data-role="popup" id="popupSetting" data-theme="a" class="ui-corner-all">
            <form id="form-setting">
                <div style="padding:10px 20px;">
                    <h3>Nhập thông tin</h3>
                    <label for="un" class="ui-hidden-accessible">Tên khách:</label>
                    <input name="customer-name" id="customer-name" value="" placeholder="Tên khách" data-theme="a" type="text">
                    <label for="pw" class="ui-hidden-accessible">Số hàng:</label>
                    <input name="num-row" id="num-row" value="" placeholder="Số hàng" data-theme="a" type="text">
                    <a href="#" id="accept-setting" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Chấp nhận</a>
                </div>
            </form>
        </div>

        <div id="table-template" style="display: none;">
            <div class="ui-corner-all custom-corners" style="margin-top: 30px;">
                <div class="ui-bar ui-bar-a">
                    <h3>{customer-name}</h3>
                </div>
                <div class="ui-body ui-body-a" style="padding: 0px 0px 0px 0px;">
                    <div class="ui-grid-d">
                        <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tên Hàng</div></div>
                        <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">SL</div></div>
                        <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Giá</div></div>
                        <div class="ui-block-e" style="width: 29% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                    </div>
                    <form id="{form-id}">
                        {row-template}
                    </form>
                    <div class="ui-grid-b">
                        <div class="ui-block-a" style="width: 100% !important;">
                            <div class="ui-bar ui-bar-a" style="font-size: 15px; padding-top: 0px; padding-bottom: 0px;">
                                <button id="btn-addrow" type="submit" value="Thêm dòng" data-inline="true" style="height: 30px !important; font-size: 15px !important; padding: 0px 10px 0px 10px;">Thêm dòng</button>
                                <button id="btn-save" type="reset" value="Lưu" data-inline="true" style="height: 30px !important; font-size: 15px !important; padding: 0px 10px 0px 10px;">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="row-template" style="display: none;">
            <fieldset class="ui-grid-d">
                <div class="ui-block-b"><input type="text" id="{name}" name="name[]"value=""></div>
                <div class="ui-block-c"><input type="text" id="{quantity}" name="quantity[]" value="" style="text-align: right;" maxlength="3"></div>
                <div class="ui-block-d"><input type="text" id="{price}" name="price[]" value="" style="text-align: right;" maxlength="3"></div>
                <div class="ui-block-e" style="width: 29% !important;">
                    <div class="ui-bar ui-bar-a" style="height: 28px !important; padding: 0px !important;">
                        <div class="ui-nodisc-icon ui-alt-icon"><!-- Class added to the wrapper -->
                            <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Delete</a>
                            <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-u ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Up</a>
                            <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-d ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Down</a>
                        </div>

                    </div>
                </div>
            </fieldset>
        </div>

        <div id="list-bill">
            <div class="ui-corner-all custom-corners" style="margin-top: 30px;">
                <div class="ui-bar ui-bar-a">
                    <h3>Chị Hằng</h3>
                </div>
                <div class="ui-body ui-body-a" style="padding: 0px 0px 0px 0px;">
                    <div class="ui-grid-d">
                        <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tên Hàng</div></div>
                        <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">SL</div></div>
                        <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Giá</div></div>
                        <div class="ui-block-e" style="width: 29% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                    </div>
                    <?php for($i=1;$i<=$quantitySetting;$i++): ?>
                        <?php
                        $name = 'name-'.$i;
                        $price = 'price-'.$i;
                        $quantity = 'quantity-'.$i;
                        $total = 'total-'.$i;
                        ?>
                        <fieldset class="ui-grid-d">
                            <div class="ui-block-b"><input type="text" id="<?php echo $name; ?>" name="<?php echo $name; ?>"value=""></div>
                            <div class="ui-block-c"><input type="text" id="<?php echo $quantity; ?>" name="<?php echo $quantity; ?>" value="" style="text-align: right;" maxlength="3"></div>
                            <div class="ui-block-d"><input type="text" id="<?php echo $price; ?>" name="<?php echo $price; ?>" value="" style="text-align: right;" maxlength="3"></div>
                            <div class="ui-block-e" style="width: 29% !important;">
                                <div class="ui-bar ui-bar-a" style="height: 28px !important; padding: 0px !important;">
                                    <div class="ui-nodisc-icon ui-alt-icon"><!-- Class added to the wrapper -->
                                        <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Delete</a>
                                        <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-u ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Up</a>
                                        <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-d ui-btn-icon-notext ui-btn-inline" style="margin: 4px 0px 0px 0px !important; height: 20px !important; width: 20px !important;">Down</a>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                    <?php endfor ?>


                    <div class="ui-grid-b">
                        <div class="ui-block-a" style="width: 100% !important;">
                            <div class="ui-bar ui-bar-a" style="font-size: 15px; padding-top: 0px; padding-bottom: 0px;">
                                <button type="submit" value="Thêm dòng" data-inline="true" style="height: 30px !important; font-size: 15px !important; padding: 0px 10px 0px 10px;">Thêm dòng</button>
                                <button type="reset" value="Lưu" data-inline="true" style="height: 30px !important;; font-size: 15px !important; padding: 0px 10px 0px 10px;">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div><!-- /content -->
    <div data-role="footer" data-position="fixed" data-theme="a">
        <h1>&nbsp;</h1>
    </div><!-- /footer -->

</div><!-- /page -->

<div data-role="panel" id="outside" data-theme="b">
    <ul data-role="listview">
        <li data-icon="back"><a href="#" data-rel="close">Đóng</a></li>
        <li><a href="../create.php">Tạo Bill Mới</a></li>
    </ul>
</div>

</body>
</html>




