<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:04
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'REST Manager'])

@section('title', 'REST Manager')
@section('page-id', 'rest-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit REST Description - {{ $config->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>REST Description</label>
                                    <textarea class="form-control" name="restDesc" placeholder="Enter REST Description">{{ isset($config->restDesc)?$config->restDesc:'' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if($config->isPage)
                                <a class="btn btn-warning" href="{{ route('mager.rest.show.controller', ['controller' => $config->controller]) }}">Back</a>
                                @else
                                <a class="btn btn-warning" href="{{ route('mager.rest.index') }}">Back</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager'])
        });
    </script>
@endsection
