<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 01/01/19
 * Time: 14:24
 */

$title = 'Create Controller';
if(Request::route()->getName() == 'mager.pages.edit.controller') {
    $title = 'Edit Controller';
}

?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', $title.' | Pages Manager')
@section('page-id', 'create-controller')

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
                                    <label>Page Name</label>
                                    <input type="text" class="form-control" name="pageName" @isset($configController->pageName) value="{{ $configController->pageName }}" @endisset placeholder="Enter Page Name">
                                </div>
                                <div class="form-group">
                                    <label>Controller Name</label>
                                    <input type="text" class="form-control" name="name" @isset($configController->name) value="{{ $configController->name }}" @endisset placeholder="Enter Controller Name">
                                </div>
                                <div class="form-group">
                                    <label>Controller Namespace</label>
                                    <input type="text" class="form-control" name="namespace" @isset($configController->namespace) value="{{ $configController->namespace }}" @else value="App\Http\Controllers" @endisset placeholder="Enter Controller Namespace">
                                </div>
                                <div class="form-group">
                                    <label>Base Route URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="url" @isset($configController->url) value="{{ $configController->url }}" @endisset placeholder="Enter Base Route URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Model Name</label>
                                    <input type="text" class="form-control" name="model" @isset($configController->model) value="{{ $configController->model }}" @endisset placeholder="Enter Model Name">
                                </div>
                                <div class="checkbox">
                                    <label>
                                    @isset($configController->web)
                                        <input type="checkbox" name="web" value="true" @if($configController->web) checked @endif> Web Controller
                                    @else
                                        <input type="checkbox" name="web" value="true" checked> Web Controller
                                    @endisset
                                    </label>
                                    <p class="help-block">This controller will be enabled to open web pages based on view layout.</p>
                                    <label>
                                    @isset($configController->rest)
                                        <input type="checkbox" name="rest" value="true" @if($configController->web) checked @endif> REST Controller
                                    @else
                                        <input type="checkbox" name="rest" value="true"> REST Controller
                                    @endisset
                                    </label>
                                    <p class="help-block">This controller will be enabled to be REST API.</p>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
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
