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
                        @foreach($controllers as $controller)
                        <div class="panel box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a class="button-collapse" data-toggle="collapse" data-parent="#accordion" href="#{{ $controller->url }}">
                                        {{ $controller->pageName }}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{ $controller->url }}" class="panel-collapse collapse">
                                <ul class="list-group">

                                    @foreach($controller->pages as $id => $page)
                                    <li class="list-group-item">
                                        @if($controller->defaultPage != $page->url)
                                            {{ $page->title }}
                                        @else
                                            @if(Route::has($controller->url . '.' . $controller->defaultPage))
                                            <a href="{{ route($controller->url . '.' . $controller->defaultPage) }}" target="_blank">{{ $page->title }}</a>
                                            @else
                                            {{ $page->title }}
                                            @endif
                                            <i class="fas fa-home" data-toggle="tooltip" title="Home Page"></i>
                                        @endif

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Detail" href="{{ route('mager.pages.show.page', ['controller' => $controller->url, 'page' => $id]) }}"><i class="fas fa-file-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page Properties" href="{{ route('mager.pages.edit.page', ['controller' => $controller->url, 'page' => $id]) }}"><i class="fas fa-edit"></i></a>
                                            @if(in_array($page->resource, ['index', 'create', 'edit', 'show']))
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit View" href="{{ route('mager.pages.gui-builder', ['controller' => $controller->url, 'page' => $id]) }}"><i class="fas fa-object-group"></i></a>
                                            @endif
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="{{ route('mager.pages.delete.page', ['controller' => $controller->url, 'page' => $id]) }}"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    @endforeach

                                    <li class="list-group-item controller-action">
                                        <b>Controller Action</b>
                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="{{ route('mager.pages.show.controller', ['controller' => $controller->url]) }}"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Controller Properties" href="{{ route('mager.pages.edit.controller', ['controller' => $controller->url]) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Model Detail" href="{{ route('mager.database.index') }}"><i class="fas fa-database"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Controller" href="{{ route('mager.pages.delete.controller', ['controller' => $controller->url]) }}"><i class="far fa-trash-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="New Page" href="{{ route('mager.pages.create.page', [ 'controller' => $controller->url ]) }}">New Page <i class="far fa-file"></i></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
            require(['adminlte', 'laravelmager']);
            require(['jquery'], function($){
                $(document).ready(function(){
                    if($(localStorage.getItem('activePage')).length !== 0) {
                        $(localStorage.getItem('activePage')).addClass('in');
                    } else {
                        @if(count($controllers) > 0)
                        $('#{{ $controllers[0]->url }}').addClass('in');
                        @endif
                    }

                    $('.button-collapse').click(function () {
                        localStorage.setItem('activePage', $(this).attr('href'));
                    });
                })
            });
        });
    </script>
@endsection
