<?php
    if(isset($_GET["content"])){
        $nameSetting = $_GET['name'];
        $content = $_GET['content'];
        $quantitySetting = substr_count($content, "\n") + 1;
        $list = explode("\n", $content, $quantitySetting);

        $quantitySetting = $quantitySetting+2;
    }else {
        //header('Location: create.php');
    }
    function mb_ucfirst($str=''){
        $str2=explode(" ",$str);
        return str_replace($str2[0],mb_convert_case($str2[0], MB_CASE_TITLE, "UTF-8"),$str);
    }

    function format($input) {
        $number = (string)$input;
        $result = '';
        /*if($number.indexOf("-") != -1) {
            result = '-';
            number = number.replace(/\-/g, '');
        }*/
        $length = strlen($number);
        $thousand = $length%3;

        for($i=0;$i<$length;$i++){
            if($thousand==0){
                if($i==3) {
                    $result = $result . '.';
                }
            } else {
                if($i==$thousand && $result != ''){
                    $result = $result . '.';
                }
            }
            $result = $result .  (string)$number[$i];
        }
        return $result;
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
        <h3><?php echo ($nameSetting); ?></h3>
        <span id="quantity-setting" style="display: none"><?php echo $quantitySetting; ?></span>
        <div>
            <div class="ui-grid-d">
                <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tên Hàng</div></div>
                <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">SL</div></div>
                <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Giá</div></div>
                <div class="ui-block-e"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tiền</div></div>
            </div>
                <?php $totalAll = 0; ?>
                <?php for($i=1;$i<=$quantitySetting;$i++): ?>
                    <?php

                        $name = 'name-'.$i;
                        $price = 'price-'.$i;
                        $quantity = 'quantity-'.$i;
                        $total = 'total-'.$i;
                        $nameValue = '';
                        $priceValue = '';
                        $quantityValue = '';
                        $totalValue = '';

                        if($i <= count($list)) {
                            $item = $list[$i-1];
                            $splitNamePrice = explode(":", $item, 2);
                            $splitQuantityName = explode(" ", $splitNamePrice[0], 2);
                            if(is_numeric($splitQuantityName[0])) {
                                $quantityValue = (int)$splitQuantityName[0];
                                $priceValue = (int)str_replace("k", "", $splitNamePrice[1]);
                                $nameValue = $splitQuantityName[1];
                                $totalValue = $quantityValue*$priceValue;
                            } else {
                                $nameValue = $splitNamePrice[0];
                                $totalValue = (int)str_replace("k", "", $splitNamePrice[1]);;
                                $priceValue = '';
                                $quantityValue = '';
                            }
                            $totalAll += $totalValue;
                            $nameValue = str_replace(array("DA", "Hoahip", "Roxy", "Hiền", "chị Trang", "chị Hà", "Nhuận"), array("", "", "", "", "", ""), $nameValue);
                            $nameValue = mb_ucfirst($nameValue);
                            $totalValue = format($totalValue);
                        }


                    ?>
                    <fieldset class="ui-grid-d">
                        <div class="ui-block-a"><input type="text"  value="<?php echo $i; ?>" style="text-align: center;" readonly="readonly"></div>
                        <div class="ui-block-b"><input type="text" id="<?php echo $name; ?>" name="<?php echo $name; ?>"value="<?php echo $nameValue; ?>"></div>
                        <div class="ui-block-c"><input type="text" id="<?php echo $quantity; ?>" name="<?php echo $quantity; ?>" value="<?php echo $quantityValue; ?>" style="text-align: right;" maxlength="3"></div>
                        <div class="ui-block-d"><input type="text" id="<?php echo $price; ?>" name="<?php echo $price; ?>" value="<?php echo $priceValue; ?>" style="text-align: right;" maxlength="3"></div>
                        <div class="ui-block-e"><input type="text" id="<?php echo $total; ?>" value="<?php echo $totalValue; ?>" style="text-align: right;" maxlength="7"></div>
                    </fieldset>
                <?php endfor ?>
            <?php $totalAll = format($totalAll); ?>


            <div class="ui-grid-b">
                <div class="ui-block-a" style="width: 56% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">&nbsp;</div></div>
                <div class="ui-block-b" style="width: 24% !important;"><div class="ui-bar ui-bar-a" style="height: 16px; font-size: 15px;">Tổng</div></div>
                <div class="ui-block-e"><input type="text" id="total" value="<?php echo $totalAll; ?>" style="text-align: right;" readonly="readonly"></div>
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

