/**
 * init elements on page loading and ajax complete
 */
function initThemeElements() {
    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        }
    });

    checkWidgetCategoriesExpanded();

    init_iCheck();

    $('.select2-normal').select2({
        allowClear: true,
    });

    $('.select2-normal.tags').select2({
        tags: []
    });

    if (window.grecaptcha) {
        grecaptcha.reset();
    }

    $('.btn-default').addClass('btn-secondary');

    if ($.fn.owlCarousel) {
        $('.owl-carousel').not("#slider .owl-carousel").each(function () {
            let options = $(this).data('options');
            if (!options) {
                options = {};
            }
            options['navText'] = [];
            options['dots'] = true;
            options['responsiveClass'] = true;
            options['loop'] = true;
            options['autoplay'] = true;
            options['autoplayTimeout'] = '2000';
            $(this).owlCarousel(options);
        });
    }

    // price slider
    $("#price-slider").ionRangeSlider({
        min: 130,
        max: 575,
        type: 'double',
        prefix: "$",
        prettify: false,
        hasGrid: false
    });

    $('#jqzoom').jqzoom({
        zoomType: 'standard',
        lens: true,
        preloadImages: false,
        alwaysOn: false,
        zoomWidth: 460,
        zoomHeight: 460,
        // xOffset:390,
        yOffset: 0,
        position: 'left'
    });

    $('.popup-text').magnificPopup({
        removalDelay: 500,
        closeBtnInside: true,
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        midClick: true
    });
}

function initThemePublicLayoutElements() {
    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        }
    });

    checkWidgetCategoriesExpanded();

    init_iCheck();

    $('.btn-default').addClass('btn-secondary');
}


function init_iCheck() {
    // iCheck init
    $('input[type=checkbox],input[type=radio]').not('.disable-icheck').each(function () {
        if ($(this).css('opacity') != "0") {
            $(this).iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue',
                // increaseArea: '20%' // optional
            });
            $(this).on('ifClicked', function (event) {
                $(event.target).click()
            });
            $(this).on('ifChanged', function (event) {
                $(event.target).trigger('change');
            });
        }

    });

}

function checkWidgetCategoriesExpanded() {
    $(".widget.widget-categories").find('input:checked').closest('.parent-category').addClass('expanded');
}

function themeConfirmation(title, text, type, confirm_btn, cancel_btn, callback, dismiss_callback) {
    swal({
        title: title,
        text: text,
        type: type,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: confirm_btn,
        cancelButtonText: cancel_btn
    }).then(
        function () {
            if (typeof callback === "function") {
                // Call it, since we have confirmed it is callable​
                callback();
            }
        }, function (dismiss) {
            if (window.Ladda) {
                Ladda.stopAll();
            }
            if (typeof dismiss_callback === "function") {
                // Call it, since we have confirmed it is callable​

                dismiss_callback()
            }
        });
}

function themeNotify(data) {

    if (undefined === data.level && undefined === data.message) {

        if (undefined !== data.responseJSON) {
            data = data.responseJSON;
        }

        var level = 'error';
        var message = data.message;
        var errors = data.errors;
    } else {
        level = data.level;
        message = data.message;
    }
    var action_buttons = undefined;
    var buttons = [];
    if (undefined !== data.action_buttons) {
        action_buttons = data.action_buttons;
    }
    if (undefined !== action_buttons) {
        $.each(action_buttons, function (key, val) {
            buttons.push(['<a target="_blank" class="btn btn-secondary">' + key + '</a>', function (instance, toast, button) {
                window.location.replace(val);

            }]);
        });
    }
    if (undefined !== errors) {
        message += "<br>";
        $.each(errors, function (key, val) {
            message += val + "<br>";
        });
    }
    if (undefined === level && undefined === message) {
        level = 'error';
        message = 'Something went wrong!!';
    }

    if (level === 'error') {
        level = 'danger';
    }

    var icon = 'icon-bell';

    if (level === 'success') {
        icon = 'icon-circle-check';
    }

    iziToast.show({
        class: "iziToast-" + level,
        icon: "icon-bell",
        timeout: 3200,
        buttons: buttons,
        transitionIn: "fadeInLeft",
        transitionInMobile: "fadeIn",
        transitionOut: "fadeOut",
        transitionOutMobile: "fadeOut",
        message: message,
        position: 'bottomRight'
    });
}

function toggleWishListProduct(response) {

    let $wishlist_item = $('*[data-wishlist_product_hashed_id="' + response.hashed_id + '"]');

    if (response.action == "add") {
        $wishlist_item.addClass('active');
    } else {
        $wishlist_item.removeClass('active');
    }
}
