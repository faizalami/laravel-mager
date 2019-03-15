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
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.dummy', ['table' => 'table1']) }}">Generate Dummy Data <i class="fas fa-database"></i></a>
                        </p>
                        <table class="table table-bordered table-striped">
                            <tr>
                                @foreach($columns as $column)
                                <th>{{ $column->label }}</th>
                                @endforeach
                                <th>Action</th>
                            </tr>
                            @foreach($data as $item)
                            <tr>
                                @foreach(array_keys($columns) as $name)
                                <th>{{ $item->{name} }}</th>
                                @endforeach
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
