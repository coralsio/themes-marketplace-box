var btnWide = $('#switcher_changer #btn-wide');
var btnBoxed = $('#switcher_changer #btn-boxed');

(function ($) {
    var c = readCookie('style');
    if (c) switchStylestyle(c);

    let boxBg = readCookie('box-bg');

    if(boxBg) {
        $('body').css('background-image', boxBg);
    }

    $(document).ready(function () {
        var boxedWide = readCookie('boxed-wide');

        if (boxedWide === 'boxed') {
            btnBoxed.trigger('click');
        } else {
            btnWide.trigger('click');
        }

        $('#styleswitch_area .styleswitch').on('click', function () {
            switchStylestyle(this.getAttribute("data-src"));
            return false;
        });
        var c = readCookie('style');
        if (c) switchStylestyle(c);
    });

    function switchStylestyle(styleName) {
        $('link[rel*=style][id]').each(function (i) {
            this.disabled = this.id !== styleName;
        });
        createCookie('style', styleName, 365);
    }
})(jQuery);

// Cookie functions
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

// Switcher
jQuery('#switcher_changer .switcher-icon').on('click', function () {

    if (jQuery('.switcher_changer').hasClass("active")) {
        jQuery('.switcher_changer').animate({
            "left": "-230px"
        }, function () {
            jQuery('.switcher_changer').toggleClass("active");
        });
    } else {
        jQuery('.switcher_changer').animate({
            "left": "0px"
        }, function () {
            jQuery('.switcher_changer').toggleClass("active");
        });
    }
});


if ($('body').hasClass('boxed')) {
    btnBoxed.addClass('btn-primary');
} else {
    btnWide.addClass('btn-primary');
}

btnWide.on('click', function (event) {
    event.preventDefault();
    $('body').removeClass('boxed');
    $(this).addClass('btn-primary');
    btnBoxed.removeClass('btn-primary');
    createCookie('boxed-wide', 'wide', 365);
});

btnBoxed.on('click', function (event) {
    event.preventDefault();
    $('body').addClass('boxed');
    $(this).addClass('btn-primary');
    btnWide.removeClass('btn-primary');
    $('body').removeClass('bg-cover');
    $('body').css('background-image', 'url("/assets/themes/marketplace-box/img/patterns/binding_light.png")');
    createCookie('boxed-wide', 'boxed', 365);
});


$('#patternswitch_area .patternswitch').on('click', function (event) {
    event.preventDefault();
    $('body').removeClass('bg-cover');
    btnBoxed.trigger('click');
    $('body').css('background-image', $(this).css('background-image'));

    createCookie('box-bg', $(this).css('background-image'), 365);
});

$('#bgimageswitch_area .bgimageswitch').on('click', function (event) {
    event.preventDefault();
    btnBoxed.trigger('click');
    $('body').addClass('bg-cover');
    $('body').css('background-image', 'url("' + $(this).attr('data-src') + '")');
});
