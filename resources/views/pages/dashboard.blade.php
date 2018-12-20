<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:45
 */
?>

@extends('mager::layouts.main')

@section('title', 'Dashboard')
@section('page-id', 'dashboard')

@section('content')
<div class="row">
    <div class="col-md-2 col-md-offset-5 col-xs-12">
        <img class="dashboard-logo" src="{{ asset(config('mager.public_path').'assets/img/laravel-mager-logo.png') }}" alt="">
    </div>
    <div class="col-md-12 col-xs-12">
        <h3 class="text-center dashboard-greeting">Welcome to Laravel Mager</h3>
    </div>
    <div class="col-md-2 col-md-offset-2 col-xs-12">
        <i class="far fa-copy dashboard-menu-icon"></i>
        <a class="dashboard-menu-link" href="{{ route('mager.pages.index') }}">Pages Manager</a>
    </div>
    <div class="col-md-2">
        <i class="fas fa-cogs dashboard-menu-icon"></i>
        <a class="dashboard-menu-link" href="{{ route('mager.configuration.theme') }}">Project Configuration</a>
    </div>
    <div class="col-md-2">
        <i class="fas fa-server dashboard-menu-icon"></i>
        <a class="dashboard-menu-link" href="{{ route('mager.rest.index') }}">REST Manager</a>
    </div>
    <div class="col-md-2">
        <i class="fas fa-database dashboard-menu-icon"></i>
        <a class="dashboard-menu-link" href="{{ route('mager.database.index') }}">Database Manager</a>
    </div>
</div>

<script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
<script>
    require(['main'], function () {
        require(['adminlte']);
        require(['laravelmager']);
    });
</script>
@endsection

