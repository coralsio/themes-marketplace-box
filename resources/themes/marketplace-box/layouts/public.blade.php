<!DOCTYPE html>
<html lang="{{ \Language::getCode() }}" dir="{{ \Language::getDirection() }}">
<head>
    @include('partials.scripts.header')
</head>

<body>
<div class="global-wrapper clearfix" id="global-wrapper">

    @php \Actions::do_action('after_body_open') @endphp
    @include('partials.switcher')
    @include('partials.header')
    <div class="offcanvas-wrapper">
        <div class="page-title" style="margin-bottom: 5px;">
            <div class="container">
                @yield('content_header')
            </div>
        </div>

        @yield('before_content')

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @yield('custom-actions')
                </div>
                <div class="col-md-6 text-right" style="padding-bottom: 10px;">
                    @yield('actions')
                </div>
            </div>
            @yield('editable_content')
        </div>

        <div>@include('partials.footer')</div>
    </div>
</div>
@include('partials.scripts.footer')

<div class="modal fade modal-image" id="modal-image-crop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>@lang('corals-marketplace-box::labels.auth.change_image')</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img width="100%" src="" id="image_cropper" alt="picture 1" class="img-responsive img-fluid">
                </div>
                <div class="actions my-3">
                        <span class="">
                            @lang('corals-marketplace-box::labels.auth.browse_files')
                            <input type="file" class="custom-file" id="cropper" required>
                        </span>

                    <button type="button" class="btn btn-primary rotate" data-method="rotate"
                            data-option="-30">
                        <i class="fa fa-undo"></i></button>
                    <button type="button" class="btn btn-primary rotate" data-method="rotate"
                            data-option="30">
                        <i class="fa fa-repeat"></i></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary m-r-10 m-l-10"
                        id="Save">@lang('corals-marketplace-box::labels.auth.save',['title'=>''])</button>
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">@lang('corals-marketplace-box::labels.auth.close')</button>
            </div>
        </div>
    </div>
</div>


@include('components.modal',['id'=>'global-modal'])

@include('partials.notifications')


</body>
</html>
