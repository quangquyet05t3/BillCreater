$(document).on('pageinit', function(){
    var submit = false;
    $("#btn-active").on('click', function(e){
        e.preventDefault();
        if(validate()){
            if(submit==false) {
                submit = true;
                $.ajax({
                    showLoader: false,
                    url: encodeURI("execute.php"),
                    type: "POST",
                    data: $("#frm-active").serialize(),
                    success: function (data) {
                        var obj = JSON.parse(data);
                        if(obj.success) {
                            window.location.href = "/draft/";

                        }
                    }
                });
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