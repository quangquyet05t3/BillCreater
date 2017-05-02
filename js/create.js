$(document).on('pageinit', function(){
    $("#btn-create").on('click', function(){
        if(validate()){
            $("#frm-bill-setting").submit();
        }
    });

    $("#btn-reset").on('click', function(){
        $("#txt-name").text("");
        $("#txt-quantity").text("");
    });

    var validate = function(){
        return true;
    }
});