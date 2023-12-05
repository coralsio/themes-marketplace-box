{{--<title>--}}
{{--    @if(user() && $unreadNotifications = user()->unreadNotifications()->count())--}}
{{--        ({{ $unreadNotifications }})--}}
{{--    @endif--}}
{{--    @yield('title') | {{ \Settings::get('site_name', 'Corals') }}--}}
{{--</title>--}}

{!! \SEO::generate() !!}

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="{{ \Settings::get('site_favicon') }}" type="image/png">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

{!! \Html::style('assets/corals/plugins/lightbox2/css/lightbox.min.css') !!}
{!! Theme::css('plugins/select2/dist/css/select2.min.css') !!}
{!! Theme::css('plugins/sweetalert2/dist/sweetalert2.css') !!}
{!! \Html::style('assets/corals/plugins/icheck/skins/all.css') !!}
{!! Theme::css('plugins/Ladda/ladda-themeless.min.css') !!}

{!! \Html::script('assets/corals/js/corals_header.js') !!}

{!! Theme::css('css/bootstrap.css') !!}
{!! Theme::css('css/font-awesome.css') !!}
{!! Theme::css('css/jquery.range.css') !!}
{!! Theme::css('css/styles.css') !!}
{!! Theme::css('css/mystyles.css') !!}
{!! Theme::css('css/switcher.css') !!}

{!! Theme::css('css/schemes/bright-turquoise.css','bright-turquoise') !!}
{!! Theme::css('css/schemes/turkish-rose.css','turkish-rose') !!}
{!! Theme::css('css/schemes/hippie-blue.css','hippie-blue') !!}
{!! Theme::css('css/schemes/mandy.css','mandy') !!}
{!! Theme::css('css/schemes/green-smoke.css','green-smoke') !!}
{!! Theme::css('css/schemes/horizon.css','horizon') !!}
{!! Theme::css('css/schemes/cerise.css','cerise') !!}
{!! Theme::css('css/schemes/brick-red.css','brick-red') !!}
{!! Theme::css('css/schemes/de-york.css','de-york') !!}
{!! Theme::css('css/schemes/shamrock.css','shamrock') !!}
{!! Theme::css('css/schemes/studio.css','studio') !!}
{!! Theme::css('css/schemes/leather.css','leather') !!}
{!! Theme::css('css/schemes/denim.css','denim') !!}
{!! Theme::css('css/schemes/scarlet.css','scarlet') !!}
{!! Theme::css('css/schemes/salem.css','salem') !!}

{!! Theme::css('css/custom.css') !!}
{!! Theme::css('plugins/iziToast/css/iziToast.min.css') !!}

<script type="text/javascript">
    window.base_url = '{!! url('/') !!}';
</script>

@yield('css')

@stack('partial_css')

{!! \Assets::css() !!}

@if(\Settings::get('google_analytics_id'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ \Settings::get('google_analytics_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', "{{ \Settings::get('google_analytics_id') }}");
    </script>
@endif
<style type="text/css">
    {!! \Settings::get('custom_admin_css', '') !!}
</style>
