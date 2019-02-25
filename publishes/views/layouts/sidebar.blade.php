<?php

$menu = config('global.sidebar.menu');

$routeName = explode('.', Request::route()->getName());
if(isset($menu[$routeName[0]])) {
    $menu[$routeName[0]]['active'] = 'active';
}

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>

            @foreach($menu as $id => $item)
            <li class="{{ $menu[$id]['active'] }}">
                <a href="{{ url($item['route']) }}"><i class="{{ $item['icon'] }}"></i> <span>{{ $item['title'] }}</span></a>
            </li>
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

