<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/01/19
 * Time: 8:52
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', 'Create Controller | Pages Manager')
@section('page-id', 'create-controller')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Page</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Page ID</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Page ID">
                                </div>
                                <div class="form-group">
                                    <label>Page Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Page Title">
                                </div>
                                <div class="form-group">
                                    <label>Page URL</label>
                                    <input type="text" class="form-control" name="url" placeholder="Enter Page URL">
                                </div>
                                <div class="form-group">
                                    <label>Page Type</label>
                                    <select name="resource">
                                        <option value="" selected>Choose Page Type</option>
                                        <option value="index">Index</option>
                                        <option value="show">Show</option>
                                        <option value="create">Create</option>
                                        <option value="edit">Edit</option>
                                        <option value="destroy">Destroy</option>
                                    </select>
                                    <p class="help-block">Choose CRUD type for page.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="web" value="true"> Web Controller
                                    </label>
                                    <p class="help-block">This page will be accessible via a web page.</p>
                                    <label>
                                        <input type="checkbox" name="rest" value="true"> Rest Controller
                                    </label>
                                    <p class="help-block">This page will be accessible via REST API.</p>
                                </div>
                                <div class="form-group">
                                    <label>View File Name</label>
                                    <input type="text" class="form-control" name="url" placeholder="Enter View File Name">
                                    <p class="help-block">Use existing view file name if needed.</p>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
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
            require(['adminlte']);
            require(['laravelmager']);
        });
    </script>
@endsection
