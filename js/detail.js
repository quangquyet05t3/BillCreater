$(document).on('pageinit', function () {
    $('input').keyup(function (e) {
        var id = ($(this).attr('id'));
        var quantitySetting = parseInt($('#quantity-setting').text());
        if (e.keyCode == 13 && id != 'total') {
            var splitId = id.split("-");
            var name = splitId[0];
            var i = splitId[1];
            i++;
            var nextId = '#' + name + '-' + (i);
            $(nextId).focus();
        } else {
            if (isPriceQuantity(id)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
            if (isTotal(id)) {
                this.value = this.value.replace(/[^0-9\.\-]/g, '');
            }
        }
    });

    $('input').focusout(function () {
        var id = ($(this).attr('id'));
        if (isTotal(id) && $(this).val() != 0 && $(this).val() != '') {
            var valueString = $(this).val();
            var value = valueString.replace(/\./g, '');
            var valueFormat = format(value);
            $(this).val(valueFormat);
        }
        if (isPriceQuantity(id) || isTotal(id)) {
            var splitId = id.split("-");
            var i = splitId[1];
            var priceId = '#price-' + i;
            var quantityId = '#quantity-' + i;
            var totalId = '#total-' + i;
            var nameId = '#name-' + i;
            if ($(priceId).val() != "" && $(quantityId).val() != "") {
                var totalItem = parseInt($(priceId).val()) * parseInt($(quantityId).val());
                var valueFormat = format(totalItem);
                $(totalId).val(valueFormat);
            }
            var quantitySetting = parseInt($('#quantity-setting').text());
            calculateAll(quantitySetting);
            storeDbAll(quantitySetting);
        }

    });

    function calculateAll(quantitySetting) {
        var total = 0;
        for (var i = 1; i <= quantitySetting; i++) {
            var totalId = '#total-' + i;
            if ($(totalId).val() != "") {
                var totalItemString = $(totalId).val();
                var totalItem = totalItemString.replace(/\./g, '');
                total += parseInt(totalItem);
            }
        }
        var valueFormat = format(total);
        $('#total').val(valueFormat);
    }
    
    function storeDbAll(quantitySetting) {
        var all = [];
        var total = 0;
        var totalQuantity = 0;
        for (var i = 1; i <= quantitySetting; i++) {
            var priceId = '#price-' + i;
            var quantityId = '#quantity-' + i;
            var nameId = '#name-' + i;
            var totalId = '#total-' + i;
            if ($(totalId).val() != "") {
                var totalItemString = $(totalId).val();
                var totalItem = totalItemString.replace(/\./g, '');
                total += parseInt(totalItem);
                var name = $(nameId).val();
                var quantity = $(quantityId).val();
                var price = $(priceId).val();
                totalQuantity += parseInt(quantity);
                all.push({
                    'name': name,
                    'quantity': quantity,
                    'price': price
                });
            }
        }
        var totalFormat = format(total);
        var timeCreate = $('#time-create').text();
        var allData = JSON.stringify(all);
        var customerName = $('#name-setting').text();
        var postData = {
            "id": timeCreate,
            "customerName": customerName,
            "allData": allData,
            "total": totalFormat,
            "totalQuantity": totalQuantity.toString()
        };
        $.ajax({
            type: "POST",
            url: "/active/billexe.php",
            data: JSON.stringify(postData),
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
    }

    function format(input){
        var number = input.toString();
        var result = '';
        if(number.indexOf("-") != -1) {
            result = '-';
            number = number.replace(/\-/g, '');
        }
        var length = number.length;
        var thousand = length%3;

        for(var i=0;i<length;i++){
            if(thousand==0){
                if(i==3) {
                    result = result + '.';
                }
            } else {
                if(i==thousand && result != ''){
                    result = result + '.';
                }
            }
            result = result +  number[i].toString();
        }
        return result;
    }

    function isPriceQuantity(id) {
        if(id != null && id != undefined){
            if (id.indexOf("price") != -1 || id.indexOf("quantity") != -1) {
                return true;
            }
        }
        return false;
    }

    function isTotal(id) {
        if(id != null && id != undefined) {
            if (id.indexOf("total") != -1) {
                return true;
            }
        }
        return false;
    }
});