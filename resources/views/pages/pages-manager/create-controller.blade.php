<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 01/01/19
 * Time: 14:24
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', 'Create Controller | Pages Manager')
@section('page-id', 'create-controller')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Controller</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Controller Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Controller Name">
                                </div>
                                <div class="form-group">
                                    <label>Controller Namespace</label>
                                    <input type="text" class="form-control" name="namespace" value="App\Http\Controllers" placeholder="Enter Controller Namespace">
                                </div>
                                <div class="form-group">
                                    <label>Base Route URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="url" placeholder="Enter Base Route URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Model Name</label>
                                    <input type="text" class="form-control" name="model" placeholder="Enter Model Name">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="web" value="true"> Web Controller
                                    </label>
                                    <p class="help-block">This controller will be enabled to open web pages based on view layout.</p>
                                    <label>
                                        <input type="checkbox" name="rest" value="true"> Rest Controller
                                    </label>
                                    <p class="help-block">This controller will be enabled to be REST API.</p>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('mager.pages.index') }}">Back</a>
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
