// INFINITY SCROLL
$(document).ready(function () {

    let ias = jQuery.ias({
        container: '#timeline .box-content',
        item: '.publication-item',
        pagination: '#timeline .pagination',
        next: '#timeline .pagination .next_link',
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
    });

    ias.on('rendered', function (event) {
        buttons();
    });


});

// FOLLOW FUNCTION BUTTON
function buttons() {
    $(".btn-img").unbind("click").click(function () {
        $(this).parent().find('.pub-image').fadeToggle();
    });
}