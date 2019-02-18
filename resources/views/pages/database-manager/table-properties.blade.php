<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 10/02/19
 * Time: 20:09
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
                    <li class="active"><a href="{{ route('mager.database.table.properties', ['table' => 'table1']) }}">Table Properties</a></li>
                    <li><a href="{{ route('mager.database.table.data', ['table' => 'table1']) }}">Table Data</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <p>
                            <a class="btn btn-xs btn-primary btn-new-controller" href="{{ route('mager.database.create.column', ['table' => 'table1']) }}">New Column <i class="fas fa-plus-circle"></i></a>
                        </p>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Column</th>
                                <th>Data Type</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>id</td>
                                <td>integer</td>
                                <td>10</td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>column1</td>
                                <td>string</td>
                                <td>255</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Column" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Column" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>column2</td>
                                <td>integer</td>
                                <td>100</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Column" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Column" href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>column3</td>
                                <td>string</td>
                                <td>255</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Column" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Column" href="#"><i class="far fa-trash-alt"></i></a>
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