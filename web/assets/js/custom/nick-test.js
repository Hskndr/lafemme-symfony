$(document).ready(function () {

    $(".nick-input").blur(function () {
        var nick = this.value;

        $.ajax({
            url: URL + '/nick-test',
            data: {nick: nick},
            type: 'POST',
            success: function (response) {
                if (response == "used") {
                    $(".nick-input").css("border-left", "10px solid red");
                } else {
                    $(".nick-input").css("border-left", "5px solid green");
                }
            }
        });

    });

});