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
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Request List - {{ $configController->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table-data">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Page Type</th>
                                <th>URL</th>
                                <th>Params</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($configController->pages as $name => $page)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $name }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->resource }}</td>
                                    <td>{{ url('api/' . $configController->url . '/' . $page->url) }}/</td>
                                    <td>{{ implode(', ', $page->params) }}</td>
                                    <td>{{ isset($page->restDesc)?$page->restDesc:'' }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit REST Description" href="{{ route('mager.rest.desc.page', ['controller' => $configController->url, 'page' => $name]) }}"><i class="fas fa-comment-alt"></i></a>
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                </div>
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
