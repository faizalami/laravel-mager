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
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-home"></i></h1>
                                                        <p>fas fa-home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-users"></i></h1>
                                                        <p>fas fa-users</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-chart-bar"></i></h1>
                                                        <p>fas fa-chart-bar</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-chart-pie"></i></h1>
                                                        <p>fas fa-chart-pie</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-file"></i></h1>
                                                        <p>fas fa-file</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="box box-solid box-default">
                                                    <div class="box-body text-center">
                                                        <h1><i class="fas fa-balance-scale"></i></h1>
                                                        <p>fas fa-balance-scale</p>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <input type="text" value="fas fa-certificate" class="form-control" id="icon-class" name="icon-class" placeholder="Enter Icon Class">
                                            <p class="help-block">Enter Fontawesome icon class based from <a href="https://fontawesome.com/icons?m=free">https://fontawesome.com/icons?m=free</a>.</p>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="box box-solid box-default">
                                                        <div class="box-body text-center">
                                                            <h1><i class="fas fa-certificate"></i></h1>
                                                            <p>fas fa-certificate</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        });
    </script>
@endsection
