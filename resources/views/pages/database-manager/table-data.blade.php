<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 10/02/19
 * Time: 20:33
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'table1 | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="{{ route('mager.database.table.properties', ['table' => 'table1']) }}">Table Properties</a></li>
                    <li class="active"><a href="{{ route('mager.database.table.data', ['table' => 'table1']) }}">Table Data</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <p>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.data', ['table' => 'table1']) }}">New Data <i class="fas fa-plus-circle"></i></a>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.dummy', ['table' => 'table1']) }}">Generate Dummy Data <i class="fas fa-database"></i></a>
                        </p>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>id</th>
                                <th>column1</th>
                                <th>column2</th>
                                <th>column3</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>data1</td>
                                <td>15</td>
                                <td>value1</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>data2</td>
                                <td>25</td>
                                <td>value2</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>data3</td>
                                <td>35</td>
                                <td>value3</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>data4</td>
                                <td>45</td>
                                <td>value4</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Data" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Data" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
