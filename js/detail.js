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
        if (isTotal(id) && $(this).val() > 0) {
            var valueString = $(this).val();
            var value = valueString.replace(/\./g, '');
            $(this).val(format(parseInt(value)));
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
                $(totalId).val(format(totalItem));
            }
            var quantitySetting = parseInt($('#quantity-setting').text());
            calculateAll(quantitySetting);
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
        $('#total').val(format(total));
    }

    function format(number) {
        var locale = number.toLocaleString();
        var result = locale.replace(/,/g, '.');
        return result;
    }

    function isPriceQuantity(id) {
        if (id.indexOf("price") != -1 || id.indexOf("quantity") != -1) {
            return true;
        }
        return false;
    }

    function isTotal(id) {
        if (id.indexOf("total") != -1) {
            return true;
        }
        return false;
    }
});