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

?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', $title.' | Configuration - '.ucfirst($type))
@section('page-id', 'create-menu')

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
                                    <input type="text" class="form-control" name="title" placeholder="Enter Menu Title">
                                </div>
                                <div class="form-group">
                                    <label>Base Route URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="url" placeholder="Enter Base Route URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="url" placeholder="Enter URL">
                                    </div>
                                </div>
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
        });
    </script>
@endsection
