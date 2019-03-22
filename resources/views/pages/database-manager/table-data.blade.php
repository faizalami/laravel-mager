<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 10/02/19
 * Time: 20:33
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', $configModel->name.' | Database Manager')
@section('page-id', 'database-manager')

@section('additional-styles')
<link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="{{ route('mager.database.table.properties', ['controller' => $configModel->controller]) }}">Table Properties</a></li>
                    <li class="active"><a href="javascript:void(0)">Table Data</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <p>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.data', ['controller' => $configModel->controller]) }}">New Data <i class="fas fa-plus-circle"></i></a>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.dummy', ['controller' => $configModel->controller]) }}">Generate Dummy Data <i class="fas fa-database"></i></a>
                        </p>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fas fa-exclamation-triangle"></i> Alert!</h4>
                            This page is only displaying generated columns.
                        </div>
                        <table class="table table-bordered table-striped" id="table-data">
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                    <th>{{ $column->label }}</th>
                                    @endforeach
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    @foreach(array_keys((array) $columns) as $name)
                                    <td>{{ $item->{$name} }}</td>
                                    @endforeach
                                    <td>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="{{ route('mager.database.edit.data', ['controller' => $configModel->controller, 'id' => $item->id]) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="{{ route('mager.database.delete.data', ['controller' => $configModel->controller, 'id' => $item->id]) }}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
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
