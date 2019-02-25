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
                        @if(count($configSidebar) > 0)
                            @php($i = 1)
                            @foreach($configSidebar as $base => $menu)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $menu->title }}</td>
                                    <td><i class="{{ $menu->icon }}"></i></td>
                                    <td>{{ url($base) . '/' }}</td>
                                    <td>{{ url($menu->route) . '/' }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Menu" href="{{ route('mager.configuration.edit.sidebar', ['id' => $base]) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Menu" href="{{ route('mager.configuration.delete.sidebar', ['id' => $base]) }}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @php($i++)
                            @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">No Data!</td>
                        </tr>
                        @endif
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
