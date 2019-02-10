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
                    <a class="btn btn-xs btn-primary pull-right btn-new-controller" href="{{ route('mager.database.create.table') }}">New Table <i class="fas fa-plus-circle"></i></a>
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
                        <tr>
                            <td>1</td>
                            <td>table1</td>
                            <td>yes</td>
                            <td>Table1</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Table Detail" href="{{ route('mager.database.table.properties', ['table' => 'table1']) }}"><i class="fas fa-database"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Table" href="#"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>table2</td>
                            <td>no</td>
                            <td>Table2</td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>table3</td>
                            <td>no</td>
                            <td>Table3</td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>table4</td>
                            <td>no</td>
                            <td>Table4</td>
                            <td>
                                &nbsp;
                            </td>
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
