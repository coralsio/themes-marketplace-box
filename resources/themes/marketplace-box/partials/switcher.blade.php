<div class="switcher_changer" id="switcher_changer">
    <div class="switcher-icon fa fa-sliders"></div>
    <div class="form_holder">
        <div class="line"></div>
        <p>Color Scheme</p>
        <div class="predefined_styles" id="styleswitch_area">
            <a class="styleswitch" href="?default=true" style="background:#486D97;"></a>
            <a class="styleswitch" href="#" data-src="bright-turquoise" style="background:#0EBCF2;"></a>
            <a class="styleswitch" href="#" data-src="turkish-rose" style="background:#B66672;"></a>
            <a class="styleswitch" href="#" data-src="salem" style="background:#12A641;"></a>
            <a class="styleswitch" href="#" data-src="hippie-blue" style="background:#4F96B6;"></a>
            <a class="styleswitch" href="#" data-src="mandy" style="background:#E45E66;"></a>
            <a class="styleswitch" href="#" data-src="green-smoke" style="background:#96AA66;"></a>
            <a class="styleswitch" href="#" data-src="horizon" style="background:#5B84AA;"></a>
            <a class="styleswitch" href="#" data-src="cerise" style="background:#CA2AC6;"></a>
            <a class="styleswitch" href="#" data-src="brick-red" style="background:#cf315a;"></a>
            <a class="styleswitch" href="#" data-src="de-york" style="background:#74C683;"></a>
            <a class="styleswitch" href="#" data-src="shamrock" style="background:#30BBB1;"></a>
            <a class="styleswitch" href="#" data-src="studio" style="background:#7646B8;"></a>
            <a class="styleswitch" href="#" data-src="leather" style="background:#966650;"></a>
            <a class="styleswitch" href="#" data-src="denim" style="background:#1A5AE4;"></a>
            <a class="styleswitch" href="#" data-src="scarlet" style="background:#FF1D13;"></a>
        </div>
        <div class="line"></div>
        <p>Layout</p>
        <div class="predefined_styles"><a class="btn btn-xs btn-primary" href="#" id="btn-wide">Wide</a>&nbsp;&nbsp;<a
                    class="btn btn-xs" href="#" id="btn-boxed">Boxed</a>
        </div>
        <div class="line"></div>
        <p>Background Patterns</p>
        <div class="predefined_styles" id="patternswitch_area">
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/binding_light.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/binding_dark.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/dark_fish_skin.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/dimension.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/escheresque_ste.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/food.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/giftly.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/grey_wash_wall.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/ps_neutral.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/pw_maze_black.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/pw_pattern.png') }});"></a>
            <a class="patternswitch" href="#"
               style="background-image: url({{ Theme::url('img/patterns/simple_dashed.png') }});"></a>
        </div>
        <div class="line"></div>
        @if(false)
            <p>Background Images</p>
            <div class="predefined_styles" id="bgimageswitch_area">
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/bike.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/bike.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/flowers.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/flowers.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/wood.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/wood.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/taxi.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/taxi.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/phone.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/phone.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/road.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/road.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/keyboard.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/keyboard.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/beach.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/beach.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/street.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/street.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/nature.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/nature.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/bridge.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/bridge.jpg') }}"></a>
                <a class="bgimageswitch" href="#"
                   style="background-image: url({{ Theme::url('img/switcher/cameras.jpg') }});"
                   data-src="{{ Theme::url('img/backgrounds/cameras.jpg') }}"></a>
            </div>
            <div class="line"></div>
        @endif
    </div>
</div>
