// INFINITY SCROLL
$(document).ready(function () {

    let ias = jQuery.ias({
        container: '.profile-box #user-publications',
        item: '.publication-item',
        pagination: '.profile-box .pagination',
        next: '.profile-box .pagination .next_link',
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
        text: 'no more publications'
    }));

    //METHOD TO FOLLOW BUTTON
    ias.on('ready', function (event) {
        buttons();
        followButtons()
    });

    ias.on('rendered', function (event) {
        buttons();
    });


});

// FOLLOW FUNCTION BUTTON
function buttons() {
    //BUTTON LIKE, METHOD TOOLTIP FROM BOOTSTRAP
    $('[data-toggle="tooltip"]').tooltip();

    // SHOW AND HIDE IMAGE
    $(".btn-img").unbind("click").click(function () {
        $(this).parent().find('.pub-image').fadeToggle();
    });
    // REMOVE PUBLICATIONS
    $(".btn-delete-pub").unbind('click').click(function () {
        $(this).parent().parent().addClass('hidden');

        $.ajax({
            url: URL + '/publication/remove/' + $(this).attr("data-id"),
            type: 'GET',
            success: function (response) {
                console.log(response);
            }
        })
    });

    // LIKES
    $(".btn-like").unbind('click').click(function () {
        $(this).addClass("hidden");
        $(this).parent().find('.btn-unlike').removeClass("hidden");

        $.ajax({
            url: URL + '/like/' + $(this).attr("data-id"),
            type: 'GET',
            success: function (response) {
                console.log(response);
            }
        })
    });

    $(".btn-unlike").unbind('click').click(function () {
        $(this).addClass("hidden");
        $(this).parent().find('.btn-like').removeClass("hidden");

        $.ajax({
            url: URL + '/unlike/' + $(this).attr("data-id"),
            type: 'GET',
            success: function (response) {
                console.log(response);
            }
        })
    });

    }