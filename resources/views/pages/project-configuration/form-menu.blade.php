<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 09/02/19
 * Time: 19:33
 */

$route = explode('.', Request::route()->getName());
$type = $route[count($route)-1];

$title = 'Create '.ucfirst($type).' Menu';
//if(Request::route()->getName() == 'mager.pages.edit.controller') {
//    $title = 'Edit '.ucfirst($type).' Menu';
//}

$commonIcons = [
    'fas fa-home',
    'fas fa-file',
    'fas fa-users',
    'fas fa-chart-bar',
    'fas fa-chart-pie',
    'fas fa-balance-scale'
];

$updateIcon = '';

if (isset($configMenu->icon)) {
    if (in_array($configMenu->icon, $commonIcons)) {
        $updateIcon = 'common';
    } else {
        $updateIcon = 'custom';
    }
}

?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', $title.' | Configuration - '.ucfirst($type))
@section('page-id', 'create-menu')
@section('additional-styles')
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'assets/css/pages/project-configuration/form-menu.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu Title</label>
                                    <input type="text" class="form-control" name="title" @isset($configMenu->title) value="{{ $configMenu->title}}" @endisset placeholder="Enter Menu Title">
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="route" @isset($configMenu->route) value="{{ $configMenu->route}}" @endisset placeholder="Enter URL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Icon</label>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Common Icons</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            @foreach($commonIcons as $icon)
                                                @if($updateIcon == 'common' && $configMenu->icon == $icon)
                                                    @php($checked = 'checked')
                                                @else
                                                    @php($checked = '')
                                                @endif
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default box-icon">
                                                    <input type="radio" name="icon" class="icon-option" value="{{ $icon }}" {{ $checked }}>
                                                    <div class="box-body text-center">
                                                        <h1><i class="{{ $icon }}"></i></h1>
                                                        <p>{{ $icon }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Custom Icon</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            @if($updateIcon == 'custom')
                                            <input type="text" value="{{ $configMenu->icon }}" class="form-control" id="icon-class" placeholder="Enter Icon Class">
                                            <p class="help-block">Enter Fontawesome icon class based from <a href="https://fontawesome.com/icons?d=gallery&m=free">https://fontawesome.com/icons?d=gallery&m=free</a>.</p>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div id="icon-class-preview" class="box box-solid box-default box-icon">
                                                        <input type="radio" name="icon" class="icon-option" value="{{ $configMenu->icon }}" checked>
                                                        <div class="box-body text-center">
                                                            <h1><i class="{{ $configMenu->icon }}"></i></h1>
                                                            <p>{{ $configMenu->icon }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <input type="text" value="" class="form-control" id="icon-class" placeholder="Enter Icon Class">
                                            <p class="help-block">Enter Fontawesome icon class based from <a href="https://fontawesome.com/icons?d=gallery&m=free">https://fontawesome.com/icons?d=gallery&m=free</a>.</p>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div id="icon-class-preview" class="box box-solid box-default box-icon">
                                                        <input type="radio" name="icon" class="icon-option" value="">
                                                        <div class="box-body text-center">
                                                            <h1><i class="fas fa-ellipsis-h"></i></h1>
                                                            <p>...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.configuration.'.$type) }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);
            require(['jquery'], function ($) {
                $('.box-icon input:checked').parent().addClass('active');
                $('.box-icon').click(function () {
                    $('.box-icon').removeClass('active');
                    $('.icon-option').removeAttr('checked');

                    $(this).addClass('active');
                    $(this).children('.icon-option').attr('checked', true);
                });
                $('#icon-class').on('input', function() {
                    $('.box-icon').removeClass('active');
                    $('.icon-option').removeAttr('checked');

                    $('#icon-class-preview').addClass('active');
                    $('#icon-class-preview .icon-option').val($(this).val()).attr('checked', 'true');
                    $('#icon-class-preview i').attr('class', $(this).val());
                    $('#icon-class-preview p').html($(this).val());
                });
            });
        });
    </script>
@endsection
