<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 17/03/19
 * Time: 21:16
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
                    <h3 class="box-title">Edit Data - {{ $configModel->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($columns as $name => $column)
                                <div class="form-group">
                                    <label>{{ $column->label }}</label>
                                    @include('mager::pages.database-manager.inputs.'.$column->input, ['name' => $name, 'data' => $data])
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-warning" href="{{ route('mager.database.table.data', ['controller' => $configModel->controller]) }}">Back</a>
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
