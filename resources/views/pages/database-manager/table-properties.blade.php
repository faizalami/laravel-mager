<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 10/02/19
 * Time: 20:09
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', $configModel->name.' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="javascript:void(0)">Table Properties</a></li>
                    <li><a href="{{ route('mager.database.table.data', ['controller' => $configModel->controller]) }}">Table Data</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <p>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.column', ['controller' => $configModel->controller]) }}">New Column <i class="fas fa-plus-circle"></i></a>
                        </p>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Column</th>
                                <th>Label</th>
                                <th>Data Type</th>
                                <th>Size</th>
                                <th>Input</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @foreach($generatedColumns as $name => $column)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $column->label }}</td>
                                <td>{{ $column->type }}</td>
                                <td>{{ $column->length }}</td>
                                <td>{{ $column->input }}</td>
                                <td>
                                    @if(in_array($name, $deletedColumns))
                                    <span class="text-red">Deleted (Not Generated)</span>
                                    @else
                                    <span class="text-green">Generated</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Column" href="{{ route('mager.database.edit.column', ['controller' => $configModel->controller, 'column' => $name]) }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Column" href="{{ route('mager.database.delete.column', ['controller' => $configModel->controller, 'column' => $name]) }}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @php($i++)
                            @endforeach
                            @foreach($notGeneratedColumns as $name => $column)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $column->label }}</td>
                                <td>{{ $column->type }}</td>
                                <td>{{ $column->length }}</td>
                                <td>{{ $column->input }}</td>
                                <td>
                                    <span class="text-orange">Not Generated</span>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Column" href="{{ route('mager.database.edit.column', ['controller' => $configModel->controller, 'column' => $name]) }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Column" href="{{ route('mager.database.delete.column', ['controller' => $configModel->controller, 'column' => $name]) }}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @php($i++)
                            @endforeach
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
        });
    </script>
@endsection
