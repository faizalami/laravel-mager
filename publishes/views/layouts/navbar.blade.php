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
    </nav>
</header>
