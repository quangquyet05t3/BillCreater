$(document).on('pageinit', function(){
    var submit = false;
    $("#btn-create").on('click', function(e){
        e.preventDefault();
        if(validate()){
            if(submit==false) {
                submit = true;
                $("#frm-bill-setting").submit();
            }

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