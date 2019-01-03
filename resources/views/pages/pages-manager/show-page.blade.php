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
                    <h3 class="box-title">{{ $configControllerPage->title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-primary table-striped">
                        <tr>
                            <th>Page Type</th>
                            <td> : </td>
                            <td>{{ $configControllerPage->resource }}</td>
                        </tr>
                        <tr>
                            <th>Page Title</th>
                            <td> : </td>
                            <td>{{ $configControllerPage->title }}</td>
                        </tr>
                        <tr>
                            <th>Page URL</th>
                            <td> : </td>
                            <td>{{ url($configController->url . '/' . $configControllerPage->url) }}</td>
                        </tr>
                        <tr>
                            <th>Available in web</th>
                            <td> : </td>
                            <td>@if($configControllerPage->web) Yes @else No @endif</td>
                        </tr>
                        <tr>
                            <th>Available in REST API</th>
                            <td> : </td>
                            <td>@if($configControllerPage->rest) Yes @else No @endif</td>
                        </tr>
                        <tr>
                            <th>Request Method</th>
                            <td> : </td>
                            <td>{{ implode(', ', $configControllerPage->methods) }}</td>
                        </tr>
                        <tr>
                            <th>View File Name</th>
                            <td> : </td>
                            <td>{{ $configControllerPage->view }}</td>
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
            require(['adminlte']);
            require(['laravelmager']);
        });
    </script>
@endsection
