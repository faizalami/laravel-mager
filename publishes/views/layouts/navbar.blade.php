<?php
$menu = config('global.navbar.menu');
$appName = config('app.name');

$words = explode(' ', $appName);
$acronym = '';

if(count($words) > 1) {
    foreach ($words as $word) {
        $acronym .= $word[0];
    }
} else {
    $acronym = substr($appName, 0, 3);
}

$routeName = explode('.', Request::route()->getName());
if(isset($menu[$routeName[0]])) {
    $menu[$routeName[0]]['active'] = 'active';
}

?>

<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ $acronym }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ $appName }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu pull-left">
            <ul class="nav navbar-nav">

                @foreach($menu as $id => $item)
                <li class="{{ $menu[$id]['active'] }}">
                    <a href="{{ url(stripslashes($item['route'])) }}"><i class="{{ $item['icon'] }}"></i> <span>{{ $item['title'] }}</span></a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
