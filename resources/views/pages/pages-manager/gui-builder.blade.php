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
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">
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
                        <a href="#" id="open-component-sidebar"><i class="fas fa-list-alt"></i> Components</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-wrench"></i> Page Property</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-eye"></i> Page Preview</a>
                    </li>
                </ul>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" id="open-property-sidebar"><i class="fas fa-cogs"></i> Properties</a>
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
        <div class="sidebar-item" data-type="label">Label</div>
        <div class="sidebar-item" data-type="textbox">Textbox</div>
        <div class="sidebar-item" data-type="numberbox">Numberbox</div>
        <div class="sidebar-item" data-type="emailbox">Emailbox</div>
        <div class="sidebar-item" data-type="passwordbox">Passwordbox</div>
        <div class="sidebar-item" data-type="button">Button</div>
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

@endsection

@section('additional-scripts')
    <script src="{{ asset(config('mager.public_path').'sugarjs/sugar.min.js') }}"></script>
    <script src="{{ asset(config('mager.public_path').'jquerymy/jquerymy.min.js') }}"></script>
    <script src="{{ asset(config('mager.public_path').'jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset(config('mager.public_path').'assets/js/gui-builder.js') }}"></script>
@endsection
