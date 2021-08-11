/*price range*/

if ($.fn.slider) {
    $("#sl2").slider();
}

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: "300", // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollText: "<i class=\"fa fa-angle-up\"></i>", // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 9, // Z-Index for the overlay
        });
    });
});

/*upload image*/
$('#lfm').filemanager('image');

/*change password*/
$(document).ready(function(){
    //console.log($('a[data-toggle="tab"]:first').tab('show'))
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
        //save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    //go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if ($('a[href=' + lastTab + ']').length > 0) {
        $('a[href=' + lastTab + ']').tab('show');
    }
    else
    {
        // Set the first tab if cookie do not exist
        $('a[data-toggle="tab"]:first').tab('show');
    }
})