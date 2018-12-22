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

@extends('mager::layouts.html-base')

@section('body')
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
                        <a href="#" data-toggle="control-sidebar"><i class="fas fa-file-download"></i> Generate Project</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fab fa-android"></i> Export Android Project</a>
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

    @include('mager::layouts.footer')
</div>
<!-- ./wrapper -->
@endsection
