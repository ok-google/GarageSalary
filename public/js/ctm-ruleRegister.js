var CekValidate = function() {
    var Result = true;
    var Msg = "Register sekarang";

    if (Result) {
        if (document.getElementById('inputPassword').value.length < 8) {
            Result = false;
            Msg = "Maaf! Password minimal 8 karakter...";
        }
    }

    if (Result) {
        if (document.getElementById('inputPassword').value != document.getElementById('inputConfirmPassword').value) {
            Result = false;
            Msg = "Maaf! Konfirmasi password kamu tidak cocok...";
        }
    }

    return [Result, Msg];
};

function checkRegister(){
    var Validate = CekValidate();
    var Res = Validate[0];
    var Msg = Validate[1];

    if (Res) {
        $(document).ready(function(){
            $("#btnText").html(Msg);
            $("#submit").removeClass("btn-primary");
            $("#submit").removeClass("btn-danger");
            $("#submit").addClass("btn-success");
            $("#submit").removeAttr("disabled");
            $("#icon").removeClass("fa-user-times");
            $("#icon").addClass("fa-user-plus");
        });
    } else {
        $(document).ready(function(){
            $("#btnText").html(Msg);
            $("#submit").removeClass("btn-primary");
            $("#submit").addClass("btn-danger");
            $("#submit").removeClass("btn-success");
            $("#submit").attr("disabled", "disabled");
            $("#icon").addClass("fa-user-times");
            $("#icon").removeClass("fa-user-plus");
        });
    }
}
