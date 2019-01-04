<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 16:59
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', 'Pages Manager')
@section('page-id', 'pages-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Controller List</h3>
                    <a class="btn btn-xs btn-primary pull-right btn-new-controller" href="{{ route('mager.pages.create.controller') }}">New Controller <i class="fas fa-plus-circle"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group box-list-controller" id="accordion">
                        @php($i = 1)
                        @foreach($controllers as $controller)
                        <div class="panel box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#{{ $controller->url }}">
                                        {{ $controller->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{ $controller->url }}" class="panel-collapse collapse @if($i == 1) in @endif">
                                <ul class="list-group">

                                    @foreach($controller->pages as $id => $page)
                                    <li class="list-group-item">
                                        {{ $page->title }}

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Detail" href="{{ route('mager.pages.show.page', ['controller' => $controller->url, 'page' => $id]) }}"><i class="fas fa-file-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit View" href="{{ route('mager.pages.gui-builder', ['controller' => $controller->url, 'page' => $id]) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    @endforeach

                                    <li class="list-group-item controller-action">
                                        <b>Controller Action</b>
                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="{{ route('mager.pages.show.controller', ['controller' => $controller->url]) }}"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Model Detail" href="#"><i class="fas fa-database"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Controller" href="#"><i class="far fa-trash-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="New Page" href="{{ route('mager.pages.create.page', [ 'controller' => $controller->url ]) }}">New Page <i class="far fa-file"></i></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @php($i++)
                        @endforeach
                    </div>
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
