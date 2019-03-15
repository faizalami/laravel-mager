<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:04
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Table List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Table Name</th>
                            <th>Generated</th>
                            <th>Model Name</th>
                            <th>Action</th>
                        </tr>
                        @php($i = 1)
                        @foreach($models as $model)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $model->table }}</td>
                            <td>@if($model->generatedAt != null) Yes @else No @endif</td>
                            <td>{{ $model->name }}</td>
                            <td>
                                @if($model->generatedAt != null)
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Table Detail" href="{{ route('mager.database.table.properties', ['controller' => $model->controller]) }}"><i class="fas fa-database"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Table" href="#"><i class="far fa-trash-alt"></i></a>
                                @endif
                            </td>
                        </tr>
                        @php($i++)
                        @endforeach
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
