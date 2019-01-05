<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 03/01/19
 * Time: 21:14
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
                    <h3 class="box-title">{{ $configController->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-primary table-striped">
                        <tr>
                            <th>Controller Name</th>
                            <td> : </td>
                            <td>{{ $configController->name }}</td>
                        </tr>
                        <tr>
                            <th>Controller Namespace</th>
                            <td> : </td>
                            <td>{{ $configController->namespace }}</td>
                        </tr>
                        <tr>
                            <th>Base Route URL</th>
                            <td> : </td>
                            <td>{{ url($configController->url) }}</td>
                        </tr>
                        <tr>
                            <th>Model Name</th>
                            <td> : </td>
                            <td>{{ $configController->model }}</td>
                        </tr>
                        <tr>
                            <th>Available in web</th>
                            <td> : </td>
                            <td>@if($configController->web) Yes @else No @endif</td>
                        </tr>
                        <tr>
                            <th>Available in REST API</th>
                            <td> : </td>
                            <td>@if($configController->rest) Yes @else No @endif</td>
                        </tr>
                    </table>
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
