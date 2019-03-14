<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 30/09/18
 * Time: 8:41
 */
?>

@extends('mager::layouts.html-base', ['layout' => 'layout-top-nav'])

@section('title', 'GUI Builder')
@section('page-id', 'gui-builder')

@section('additional-styles')
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/waitMe/waitMe.min.css') }}">
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ route('mager.dashboard') }}" class="navbar-brand"><b>Laravel</b>-Mager</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('mager.pages.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="open-component-sidebar"><i class="fas fa-list-alt"></i> Components</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="save-page-properties"><i class="fas fa-save"></i> Save</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="show-page-properties"><i class="fas fa-wrench"></i> Page Properties</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="show-model"><i class="fas fa-database"></i> Show Model</a>
                    </li>
                </ul>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="javascript:void(0)" id="open-property-sidebar"><i class="fas fa-cogs"></i> Properties</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 drawing-container">
                            <div class="drawing-area-header" id="page">
                                <div class="page-name">Page Name</div>
                                <div class="page-control pull-right">
                                    <div class="control-circle bg-green"></div>
                                    <div class="control-circle bg-yellow"></div>
                                    <div class="control-circle bg-red"></div>
                                </div>
                            </div>
                            <div class="drawing-area">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    @include('mager::layouts.footer')

    <!-- .component-sidebar -->
    <aside class="component-sidebar active">
        <h3 class="gui-builder-sidebar-heading">Common Components</h3>
        @switch($builderType)
            @case('form')
                <div class="sidebar-item" data-type="heading">Heading</div>
                <div class="sidebar-item" data-type="label">Label</div>
                <div class="sidebar-item" data-type="paragraph">Paragraph</div>
                <div class="sidebar-item" data-type="textbox">Textbox</div>
                <div class="sidebar-item" data-type="numberbox">Numberbox</div>
                <div class="sidebar-item" data-type="emailbox">Emailbox</div>
                <div class="sidebar-item" data-type="passwordbox">Passwordbox</div>
                <div class="sidebar-item" data-type="textarea">Textarea</div>
                <div class="sidebar-item" data-type="button">Button</div>
                <div class="sidebar-item" data-type="row">Row Panel</div>
                <div class="sidebar-item" data-type="col">Column Panel</div>
                @break
            @case('index')
                <div class="sidebar-item" data-type="heading">Heading</div>
                <div class="sidebar-item" data-type="label">Label</div>
                <div class="sidebar-item" data-type="paragraph">Paragraph</div>
                <div class="sidebar-item" data-type="table">Table</div>
                <div class="sidebar-item" data-type="thumbnail">Thumbnail</div>
                <div class="sidebar-item" data-type="row">Row Panel</div>
                <div class="sidebar-item" data-type="col">Column Panel</div>
                @break
            @case('show')
                <div class="sidebar-item" data-type="table-detail">Table</div>
                <div class="sidebar-item" data-type="heading-data">Heading</div>
                <div class="sidebar-item" data-type="label-data">Label</div>
                <div class="sidebar-item" data-type="paragraph-data">Paragraph</div>
                <div class="sidebar-item" data-type="number">Number</div>
                <div class="sidebar-item" data-type="email">Email</div>
                <div class="sidebar-item" data-type="row">Row Panel</div>
                <div class="sidebar-item" data-type="col">Column Panel</div>
                @break
        @endswitch
    </aside>
    <!-- /.component-sidebar -->

    <!-- .property-sidebar -->
    <aside class="property-sidebar active">
        <h3 class="gui-builder-sidebar-heading">General Properties</h3>
        <form class="form-horizontal" id="properties-form">
        </form>
    </aside>
    <!-- /.property-sidebar -->
</div>
<!-- ./wrapper -->

@include('mager::layouts.component-templates')

@include('mager::layouts.properties-template')

<div class="modal fade" id="modal-model-columns">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Model {{ $configView->model }}</h4>
            </div>
            <div class="modal-body">
                <table id="table-model-columns" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Label</th>
                        <th>Data Type</th>
                        <th>Input Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot id="choose-column-add">
                    <tr>
                        <td>
                            <input type="text" class="form-control new-name" placeholder="Column Name">
                        </td>
                        <td>
                            <input type="text" class="form-control new-label" placeholder="Column Label">
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <select class="form-control new-type">
                                <option value="" selected disabled>Input Type</option>
                                <option value="textbox">textbox</option>
                                <option value="emailbox">emailbox</option>
                                <option value="numberbox">numberbox</option>
                                <option value="passwordbox">passwordbox</option>
                                <option value="textarea">textarea</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-block new-column">Add New</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@if(in_array($builderType, ['index', 'show']))
    <div class="modal fade" id="modal-choose-columns">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Choose Columns</h4>
                </div>
                <div class="modal-body">
                    <table id="table-choose-columns" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Choose</th>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Data Type</th>
                                <th>Input Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        <tfoot id="choose-column-add">
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <input type="text" class="form-control new-name" placeholder="Column Name">
                                </td>
                                <td>
                                    <input type="text" class="form-control new-label" placeholder="Column Label">
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <select class="form-control new-type">
                                        <option value="" selected disabled>Input Type</option>
                                        <option value="textbox">textbox</option>
                                        <option value="emailbox">emailbox</option>
                                        <option value="numberbox">numberbox</option>
                                        <option value="passwordbox">passwordbox</option>
                                        <option value="textarea">textarea</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-block new-column">Add New</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="save-choosen-columns" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endif

<script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
<script>
    localStorage.setItem('controller', '{{ $configView->controller }}');
    localStorage.setItem('model', '{{ $configView->model }}');
    localStorage.setItem('view', '{{ $configView->name }}');

    require(['main'], function () {
        localStorage.setItem('baseUrl', '{{ url(config('mager.base_url')) }}/');

        require(['adminlte', 'laravelmager', 'assets/js/pages/gui-builder']);
    });
</script>

@endsection
