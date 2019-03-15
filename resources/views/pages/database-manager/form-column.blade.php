<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:28
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'New Column - ' . $configModel->name . ' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">New Column - {{ $configModel->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Column List:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Column Name</th>
                                        <th>Column Label</th>
                                        <th>Input Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control new-name" placeholder="Column Name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control new-label" placeholder="Column Label">
                                        </td>
                                        <td>
                                            <select class="form-control new-input">
                                                <option value="" selected disabled>Input Type</option>
                                                <option value="textbox">Textbox</option>
                                                <option value="emailbox">Emailbox</option>
                                                <option value="numberbox">Numberbox</option>
                                                <option value="passwordbox">Passwordbox</option>
                                                <option value="textarea">Textarea</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control new-name" placeholder="Column Name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control new-label" placeholder="Column Label">
                                        </td>
                                        <td>
                                            <select class="form-control new-input">
                                                <option value="" selected disabled>Input Type</option>
                                                <option value="textbox">Textbox</option>
                                                <option value="emailbox">Emailbox</option>
                                                <option value="numberbox">Numberbox</option>
                                                <option value="passwordbox">Passwordbox</option>
                                                <option value="textarea">Textarea</option>
                                            </select>
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
                                <a class="btn btn-warning" href="{{ route('mager.database.table.properties', ['table' => 'table1']) }}">Back</a>
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
