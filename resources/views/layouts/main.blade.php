<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:43
 */

$activeMenu = [
    'mager.pages.index' => '',
    'mager.configuration.theme' => '',
    'mager.configuration.navbar' => '',
    'mager.configuration.sidebar' => '',
    'mager.rest.index' => '',
    'mager.database.index' => '',
];

$activeTree = '';

if(strpos(Request::route()->getName(), 'mager.configuration.') !== false) {
    $activeTree = 'active menu-open';
}

$activeMenu[Request::route()->getName()] = 'active';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>@yield('title') | Laravel Mager</title>

    <!-- STYLES -->
    @foreach(config('mager.css_assets') as $css_file)
        <link rel="stylesheet" href="{{ asset(config('mager.public_path').$css_file) }}">
    @endforeach

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Custom Style -->
    <style>

    </style>
    <!-- /Custom Style -->
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-red fixed sidebar-mini @yield('page-id')">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('mager.dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>L</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Laravel</b>-Mager</span>
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

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fas fa-cogs"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fas fa-cogs"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fas fa-cogs"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li class="{{ $activeMenu['mager.pages.index'] }}">
                    <a href="{{ route('mager.pages.index') }}">
                        <i class="far fa-copy"></i> <span>Pages Manager</span>
                    </a>
                </li>
                <li class="treeview {{ $activeTree }}">
                    <a href="#">
                        <i class="fas fa-cogs"></i> <span>Project Configuration</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $activeMenu['mager.configuration.theme'] }}">
                            <a href="{{ route('mager.configuration.theme') }}"><i class="far fa-circle"></i> Theme</a>
                        </li>
                        <li class="{{ $activeMenu['mager.configuration.navbar'] }}">
                            <a href="{{ route('mager.configuration.navbar') }}"><i class="far fa-circle"></i> Navbar</a>
                        </li>
                        <li class="{{ $activeMenu['mager.configuration.sidebar'] }}">
                            <a href="{{ route('mager.configuration.sidebar') }}"><i class="far fa-circle"></i> Sidebar</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeMenu['mager.rest.index'] }}">
                    <a href="{{ route('mager.rest.index') }}"><i class="fas fa-server"></i> <span>REST Manager</span></a>
                </li>
                <li class="{{ $activeMenu['mager.database.index'] }}">
                    <a href="{{ route('mager.database.index') }}"><i class="fas fa-database"></i> <span>Database Manager</span></a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <ol class="breadcrumb">
                @if(isset($breadcrumb))
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">{{ $breadcrumb }}</li>
                @else
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                @endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2018 <a href="https://github.com/faizalami/laravel-mager">Laravel-Mager</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->


<!-- SCRIPTS -->
@foreach(config('mager.js_assets') as $js_file)
    <script src="{{ asset(config('mager.public_path').$js_file) }}"></script>
@endforeach
<!-- /SCRIPTS -->
<!--Custom scripts-->
<script>

</script>
<!--/Custom scripts-->
</body>
</html>
