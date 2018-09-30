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
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'jquery-ui-1.12.1.draggable-only/jquery-ui.min.css') }}">
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
                        <a href="{{ route('mager.pages.index') }}"><i class="fas fa-arrow-left"> Back</i></a>
                    </li>
                    <li>
                        <a href="#" id="open-component-sidebar"><i class="fas fa-cogs"> Components</i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-cogs"> Page Property</i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-eye"> Page Preview</i></a>
                    </li>
                </ul>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" id="open-property-sidebar"><i class="fas fa-cogs"> Properties</i></a>
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
                        <div class="col-md-8 col-md-offset-2 drawing-container">
                            <div class="drawing-area-header">
                                <div class="page-name">Page Name</div>
                                <div class="page-control pull-right">
                                    <div class="control-circle bg-yellow"></div>
                                    <div class="control-circle bg-green"></div>
                                    <div class="control-circle bg-red"></div>
                                </div>
                            </div>
                            <div class="drawing-area">
                                <div class="dropped-component hide"></div>
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
        <form class="form-horizontal">
            <div class="sidebar-item">
                <div class="form-group">
                    <label for="inputId" class="col-sm-6 control-label">ID</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputId" placeholder="ID">
                    </div>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="form-group">
                    <label for="inputMinLength" class="col-sm-6 control-label">Min Length</label>

                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="inputMinLength" placeholder="Min Length">
                    </div>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="form-group">
                    <label for="inputMaxLength" class="col-sm-6 control-label">Max Length</label>

                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="inputMaxLength" placeholder="Max Length">
                    </div>
                </div>
            </div>
        </form>
    </aside>
    <!-- /.property-sidebar -->
</div>
<!-- ./wrapper -->

<template id="template-dropped">
    <div class="dropped-component hide"></div>
</template>

<template id="label">
    <label>Label Text</label>
</template>

<template id="textbox">
    <div class="form-group">
        <label for="textbox">Textbox Label</label>
        <input type="text" class="form-control" id="textbox" placeholder="Textbox placeholder">
    </div>
</template>

<template id="numberbox">
    <div class="form-group">
        <label for="numberbox">Numberbox Label</label>
        <input type="number" class="form-control" id="numberbox" placeholder="Numberbox placeholder">
    </div>
</template>

<template id="emailbox">
    <div class="form-group">
        <label for="emailbox">Emailbox Label</label>
        <input type="email" class="form-control" id="emailbox" placeholder="Emailbox placeholder">
    </div>
</template>

<template id="passwordbox">
    <div class="form-group">
        <label for="passwordbox">Passwordbox Label</label>
        <input type="email" class="form-control" id="passwordbox" placeholder="Passwordbox placeholder">
    </div>
</template>

<template id="button">
    <div class="form-group">
        <button class="btn btn-default">Button</button>
    </div>
</template>

@endsection

@section('additional-scripts')
    <script src="{{ asset(config('mager.public_path').'jquery-ui-1.12.1.draggable-only/jquery-ui.min.js') }}"></script>
    <script src="{{ asset(config('mager.public_path').'assets/js/gui-builder.js') }}"></script>
@endsection
