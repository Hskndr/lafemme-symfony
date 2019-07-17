
// FOLLOW FUNCTION BUTTON
function followButtons() {
    // Select button and binding
    $(".btn-follow").unbind("click").click(function () {
        //hidden buttons automatic
        $(this).addClass("hidden");
        $(this).parent().find(".btn-unfollow").removeClass("hidden");

        $.ajax({
            url: URL + '/follow',
            type: 'POST',
            data: {followed: $(this).attr("data-followed")},
            success: function (response) {
                console.log(response);
            }
        })
    });

    $(".btn-unfollow").unbind("click").click(function () {
        //hidden buttons automatic
        $(this).addClass("hidden");
        $(this).parent().find(".btn-follow").removeClass("hidden");

        $.ajax({
            url: URL + '/unfollow',
            type: 'POST',
            data: {followed: $(this).attr("data-followed")},
            success: function (response) {
                console.log(response);
            }
        })
    });

}