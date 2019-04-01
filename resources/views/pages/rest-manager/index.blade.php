<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:04
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'REST Manager'])

@section('title', 'REST Manager')
@section('page-id', 'rest-manager')

@section('additional-styles')
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="javascript:void(0)">REST Controllers</a></li>
                    <li><a href="#">Response Format</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <table class="table table-bordered table-striped" id="table-data">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Namespace</th>
                                <th>Model</th>
                                <th>Base URL</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($controllers as $controller)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $controller->name }}</td>
                                    <td>{{ $controller->namespace }}</td>
                                    <td>{{ $controller->model }}</td>
                                    <td>{{ url($controller->url) }}/</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="#"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                            @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);

            require(['jquery', 'datatables.bootstrap'], function ($) {
                $('#table-data').DataTable();
            });
        });
    </script>
@endsection
