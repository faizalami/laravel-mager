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
                    <a class="btn btn-xs btn-primary pull-right btn-new-controller" href="#">New Controller <i class="fas fa-plus-circle"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group box-list-controller" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Blog
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Blog List

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Blog View

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Blog Form <small>(Insert | Update)</small>

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item controller-action">
                                        <b>Controller Action</b>
                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Controller" href="#"><i class="far fa-trash-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="New Page" href="{{ route('mager.pages.gui-builder') }}">New Page <i class="far fa-file"></i></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Contact
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Contact List

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Contact View

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Contact Form <small>(Insert | Update)</small>

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item controller-action">
                                        <b>Controller Action</b>
                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Controller" href="#"><i class="far fa-trash-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="New Page" href="{{ route('mager.pages.gui-builder') }}">New Page <i class="far fa-file"></i></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Gallery
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Gallery List

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Gallery View

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        Gallery Form <small>(Insert | Update)</small>

                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Page Preview" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Page" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Page" href="#"><i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item controller-action">
                                        <b>Controller Action</b>
                                        <span class="pull-right">
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Controller Detail" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Controller" href="#"><i class="far fa-trash-alt"></i></a>
                                            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="New Page" href="{{ route('mager.pages.gui-builder') }}">New Page <i class="far fa-file"></i></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
