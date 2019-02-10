<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:04
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'New Table | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">New Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Table Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Table Name">
                                </div>
                                <div class="form-group">
                                    <label>Model Name</label>
                                    <input type="text" class="form-control" name="model" placeholder="Enter Model Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4>Column List:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Column Name</th>
                                            <th>Data Type</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" value="column1" placeholder="Enter Column Name">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="">Choose Data Type</option>
                                                        <option value="string" selected>string</option>
                                                        <option value="integer">integer</option>
                                                        <option value="float">float</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="size" value="255" placeholder="Enter Column Size">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Column Name">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="" selected>Choose Data Type</option>
                                                        <option value="string">string</option>
                                                        <option value="integer">integer</option>
                                                        <option value="float">float</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="size" placeholder="Enter Column Size">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"><a class="btn btn-primary btn-xs pull-right" href="javascript:void(0)">Add New Column <i class="fas fa-plus-circle"></i></a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.database.index') }}">Back</a>
                            </div>
                        </div>
                    </form>
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
