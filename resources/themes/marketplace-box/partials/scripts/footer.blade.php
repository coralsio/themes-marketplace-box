{!! Theme::js('js/jquery.js') !!}
{!! Theme::js('js/bootstrap.js') !!}
{!! Theme::js('js/icheck.js') !!}
{!! Theme::js('js/ionrangeslider.js') !!}
{!! Theme::js('js/jqzoom.js') !!}
{!! Theme::js('js/jquery.range.min.js') !!}
{!! Theme::js('js/card-payment.js') !!}
{!! Theme::js('js/owl-carousel.js') !!}
{!! Theme::js('js/magnific.js') !!}

{!! \Html::script('assets/corals/plugins/lightbox2/js/lightbox.min.js') !!}
{!! \Html::script('assets/corals/plugins/autocomplete/js/bootstrap-autocomplete.min.js') !!}
{!! \Html::script('assets/corals/plugins/icheck/icheck.js') !!}


{!! Theme::js('plugins/Ladda/spin.min.js') !!}
{!! Theme::js('plugins/Ladda/ladda.min.js') !!}
{!! Theme::js('plugins/iziToast/js/iziToast.min.js') !!}
{!! Theme::js('plugins/select2/dist/js/select2.full.min.js') !!}
{!! Theme::js('plugins/sweetalert2/dist/sweetalert2.min.js') !!}
{!! Theme::js('js/functions.js') !!}
{!! Theme::js('js/main.js') !!}
{!! Theme::js('js/switcher.js') !!}

{!! \Html::script('assets/corals/js/corals_functions.js') !!}
{!! \Html::script('assets/corals/js/corals_main.js') !!}

{!! Assets::js() !!}
@php  \Actions::do_action('footer_js') @endphp

@include('Corals::corals_main')

@include('Marketplace::cart.cart_script')
@yield('js')


@php  \Actions::do_action('admin_footer_js') @endphp

<script type="text/javascript">
    {!! \Settings::get('custom_admin_js', '') !!}

    $(document).on('submit', '#main-search', function (event) {
        $(this).find(":input, select").filter(function () {
            return !this.value;
        }).attr("disabled", "disabled");

        return true;
    });
</script>
