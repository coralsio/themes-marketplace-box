@foreach($menus as $menu)
    @if($menu->hasChildren('active')  && $menu->user_can_access)
        <li class="dropdown yamm-fw>
        {{ \Request::is(explode(',',$menu->active_menu_url)) || $menu->getProperty('always_active',false,'boolean')?'active':'' }}
        {{ $menu->isRoot()?'':'has-children' }}">
            <a href="{{ url($menu->url) }}">
                @if($menu->icon) <i class="{{ $menu->icon }} fa-fw"></i>@endif
                {{ $menu->name }}
                <i class="drop-caret" data-toggle="dropdown"></i>
            </a>
            <ul class="dropdown-menu">
                @include('partials.menu.menu_item', ['menus' => $menu->getChildren('active')])
            </ul>
        </li>
    @elseif($menu->user_can_access)
        <li class="yamm-fw {{ \Request::is(explode(',',$menu->active_menu_url))|| $menu->getProperty('always_active',false,'boolean')?'active':'' }}">
            <a href="{{ url($menu->url) }}" target="{{ $menu->target??'_self' }}">
                @if($menu->icon)<i class="{{ $menu->icon }} fa-fw"></i>@endif {{ $menu->name }}
            </a>
        </li>
    @endif
@endforeach
