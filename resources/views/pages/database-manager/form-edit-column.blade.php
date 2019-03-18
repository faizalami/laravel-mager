<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 17/03/19
 * Time: 12:25
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', $configModel->name.' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Column - {{ $editColumn->label }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Column Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $column }}" placeholder="Enter Column Name">
                                </div>
                                <div class="form-group">
                                    <label>Column Label</label>
                                    <input type="text" class="form-control" name="label" value="{{ $editColumn->label }}" placeholder="Enter Column Label">
                                </div>
                                <div class="form-group">
                                    <label>Input Type</label>
                                    <select name="input" class="form-control">
                                        <option value="">Choose Input Type</option>
                                        <option value="textbox" @if($editColumn->input == 'textbox') selected @endif>Textbox</option>
                                        <option value="emailbox" @if($editColumn->input == 'emailbox') selected @endif>Emailbox</option>
                                        <option value="numberbox" @if($editColumn->input == 'numberbox') selected @endif>Numberbox</option>
                                        <option value="passwordbox" @if($editColumn->input == 'passwordbox') selected @endif>Passwordbox</option>
                                        <option value="textarea" @if($editColumn->input == 'textarea') selected @endif>Textarea</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.database.table.properties', ['controller' => $configModel->controller]) }}">Back</a>
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
