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
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'assets/css/gui-builder-icons/gui-builder-icons.css') }}">
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
                <div class="sidebar-item" data-type="heading"><span class="gui-icon icon-heading"></span> <span class="component-item">Heading</span></div>
                <div class="sidebar-item" data-type="label"><span class="gui-icon icon-label"></span> <span class="component-item">Label</span></div>
                <div class="sidebar-item" data-type="paragraph"><span class="gui-icon icon-paragraph"></span> <span class="component-item">Paragraph</span></div>
                <div class="sidebar-item" data-type="textbox"><span class="gui-icon icon-textbox"></span> <span class="component-item">Textbox</span></div>
                <div class="sidebar-item" data-type="numberbox"><span class="gui-icon icon-numberbox"></span> <span class="component-item">Numberbox</span></div>
                <div class="sidebar-item" data-type="emailbox"><span class="gui-icon icon-emailbox"></span> <span class="component-item">Emailbox</span></div>
                <div class="sidebar-item" data-type="passwordbox"><span class="gui-icon icon-passwordbox"></span> <span class="component-item">Passwordbox</span></div>
                <div class="sidebar-item" data-type="textarea"><span class="gui-icon icon-textarea"></span> <span class="component-item">Textarea</span></div>
                <div class="sidebar-item" data-type="button"><span class="gui-icon icon-button"></span> <span class="component-item">Button</span></div>
                <div class="sidebar-item" data-type="row"><span class="gui-icon icon-row"></span> <span class="component-item">Row Panel</span></div>
                <div class="sidebar-item" data-type="col"><span class="gui-icon icon-col"></span> <span class="component-item">Column Panel</span></div>
                @break
            @case('index')
                <div class="sidebar-item" data-type="heading"><span class="gui-icon icon-heading"></span> <span class="component-item">Heading</span></div>
                <div class="sidebar-item" data-type="label"><span class="gui-icon icon-label"></span> <span class="component-item">Label</span></div>
                <div class="sidebar-item" data-type="paragraph"><span class="gui-icon icon-paragraph"></span> <span class="component-item">Paragraph</span></div>
                <div class="sidebar-item" data-type="table"><span class="gui-icon icon-table"></span> <span class="component-item">Table</span></div>
                <div class="sidebar-item" data-type="thumbnail"><span class="gui-icon icon-thumbnail"></span> <span class="component-item">Thumbnail</span></div>
                <div class="sidebar-item" data-type="row"><span class="gui-icon icon-row"></span> <span class="component-item">Row Panel</span></div>
                <div class="sidebar-item" data-type="col"><span class="gui-icon icon-col"></span> <span class="component-item">Column Panel</span></div>
                @break
            @case('show')
                <div class="sidebar-item" data-type="table-detail"><span class="gui-icon icon-table"></span> <span class="component-item">Table</span></div>
                <div class="sidebar-item" data-type="heading-data"><span class="gui-icon icon-heading"></span> <span class="component-item">Heading</span></div>
                <div class="sidebar-item" data-type="label-data"><span class="gui-icon icon-label"></span> <span class="component-item">Label</span></div>
                <div class="sidebar-item" data-type="paragraph-data"><span class="gui-icon icon-paragraph"></span> <span class="component-item">Paragraph</span></div>
                <div class="sidebar-item" data-type="number"><span class="gui-icon icon-number"></span> <span class="component-item">Number</span></div>
                <div class="sidebar-item" data-type="email"><span class="gui-icon icon-email"></span> <span class="component-item">Email</span></div>
                <div class="sidebar-item" data-type="row"><span class="gui-icon icon-row"></span> <span class="component-item">Row Panel</span></div>
                <div class="sidebar-item" data-type="col"><span class="gui-icon icon-col"></span> <span class="component-item">Column Panel</span></div>
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

<div class="modal fade modal-model" id="modal-model-columns">
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
                    <tfoot>
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
                            <select class="form-control new-input">
                                <option value="" selected disabled>Input Type</option>
                                <option value="textbox">Textbox</option>
                                <option value="emailbox">Emailbox</option>
                                <option value="numberbox">Numberbox</option>
                                <option value="passwordbox">Passwordbox</option>
                                <option value="textarea">Textarea</option>
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
    <div class="modal fade modal-model" id="modal-choose-columns">
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
                        @if(in_array($builderType, ['index', 'show']))
                        <tfoot>
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
                                    <select class="form-control new-input">
                                        <option value="" selected disabled>Input Type</option>
                                        <option value="textbox">Textbox</option>
                                        <option value="emailbox">Emailbox</option>
                                        <option value="numberbox">Numberbox</option>
                                        <option value="passwordbox">Passwordbox</option>
                                        <option value="textarea">Textarea</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-block new-column">Add New</button>
                                </td>
                            </tr>
                        </tfoot>
                        @endif
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
