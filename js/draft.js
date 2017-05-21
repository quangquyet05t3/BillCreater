$(document).on('pageinit', function () {
    $('#button-setting').click(function(){
        $('#popupSetting').show();
    });

    $('#accept-setting').click(function(){
        $('#popupSetting').hide();
        var customerName = $('#customer-name').val();
        var numRow = $('#num-row').val();
        $.ajax({
            showLoader: false,
            url: encodeURI("savebill.php"),
            type: "POST",
            data: $("#form-setting").serialize(),
            success: function (data) {
                var obj = JSON.parse(data);
                if(obj.success) {

                    var tableTemplate = $('#table-template').html();
                    var rowTemplate = $('#row-template').html();
                    tableTemplate = tableTemplate.replace("{customer-name}", customerName);
                    var allRowTemplate = '';
                    for(var i=1;i<=parseInt(numRow);i++){
                        allRowTemplate = allRowTemplate + rowTemplate;
                    }
                    tableTemplate = tableTemplate.replace("{row-template}", allRowTemplate);
                    $('#list-bill').prepend(tableTemplate);
                } else {
                    alert(obj.message);
                }
            }
        });


    });
});