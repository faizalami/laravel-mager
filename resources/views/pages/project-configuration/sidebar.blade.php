<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:05
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Configuration - Sidebar'])

@section('title', 'Configuration - Sidebar')
@section('page-id', 'configuration-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Sidebar Menu List</h3>
                    <a class="btn btn-xs btn-primary pull-right btn-new-controller" href="{{ route('mager.configuration.create.sidebar') }}">New Menu <i class="fas fa-plus-circle"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Menu Title</th>
                            <th>Icon</th>
                            <th>Base Route URL</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Menu 1</td>
                            <td><i class="fas fa-file"></i></td>
                            <td>localhost:8000/menu-1</td>
                            <td>localhost:8000/menu-1/index</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="#"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Menu 2</td>
                            <td><i class="fas fa-file"></i></td>
                            <td>localhost:8000/menu-2</td>
                            <td>localhost:8000/menu-2/index</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="#"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Menu 3</td>
                            <td><i class="fas fa-file"></i></td>
                            <td>localhost:8000/menu-3</td>
                            <td>localhost:8000/menu-3/index</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="#"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Menu 4</td>
                            <td><i class="fas fa-file"></i></td>
                            <td>localhost:8000/menu-4</td>
                            <td>localhost:8000/menu-4/index</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="#"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Menu 5</td>
                            <td><i class="fas fa-file"></i></td>
                            <td>localhost:8000/menu-5</td>
                            <td>localhost:8000/menu-5/index</td>
                            <td>
                                <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="#"><i class="far fa-trash-alt"></i></a>
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
