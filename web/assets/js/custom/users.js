// INFINITY SCROLL
$(document).ready(function () {

    let ias = jQuery.ias({
        container: '.box-users',
        item: '.user-item',
        pagination: '.pagination',
        next: '.pagination .next_link',
        triggerPageThreshold: 5
    });
    ias.extension(new IASTriggerExtension({
        text: 'See more',
        offset: 3
    }));
    ias.extension(new IASSpinnerExtension({
        src: URL + '/../assets/images/ajax-loader.gif'
    }));
    ias.extension(new IASNoneLeftExtension({
        text: 'no more people'
    }));

    //METHOD TO FOLLOW BUTTON
    ias.on('ready', function (event) {
        followButtons();
    });

    ias.on('rendered', function (event) {
        followButtons();
    });


});

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