<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/01/19
 * Time: 8:52
 */

$title = 'Create Page';
if(Request::route()->getName() == 'mager.pages.edit.page') {
    $title = 'Edit Page';
}

?>

@extends('mager::layouts.main', ['breadcrumb' => 'Pages Manager'])

@section('title', $title.' | Pages Manager')
@section('page-id', 'create-controller')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Page Type</label>
                                    <select name="resource" id="resource">
                                    @isset($configControllerPage->resource)
                                        <option value="">Choose Page Type</option>
                                        <option value="index" @if($configControllerPage->resource == 'index') selected @endif>Index</option>
                                        <option value="show" @if($configControllerPage->resource == 'show') selected @endif>Show</option>
                                        <option value="create" @if($configControllerPage->resource == 'create') selected @endif>Create</option>
                                        <option value="edit" @if($configControllerPage->resource == 'edit') selected @endif>Edit</option>
                                        <option value="destroy" @if($configControllerPage->resource == 'destroy') selected @endif>Destroy (Delete)</option>
                                    @else
                                        <option value="" selected>Choose Page Type</option>
                                        <option value="index">Index</option>
                                        <option value="show">Show</option>
                                        <option value="create">Create</option>
                                        <option value="edit">Edit</option>
                                        <option value="destroy">Destroy (Delete)</option>
                                    @endisset
                                    </select>
                                    <p class="help-block">Choose CRUD type for page.</p>
                                </div>
                                <div class="form-group">
                                    <label>Page Title</label>
                                    <input type="text" class="form-control" name="title" @isset($configControllerPage->title) value="{{ $configControllerPage->title }}" @endisset placeholder="Enter Page Title">
                                </div>
                                <div class="form-group">
                                    <label>Page URL</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url($configController->url) . '/' }}</div>
                                        <input type="text" class="form-control" name="url" @isset($configControllerPage->url) value="{{ $configControllerPage->url }}" @endisset placeholder="Enter Page URL">
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                    @isset($configControllerPage->web)
                                        <input type="checkbox" name="web" value="true" @if($configControllerPage->web) checked @endif> Web Page
                                    @else
                                        <input type="checkbox" name="web" value="true" checked> Web Page
                                    @endisset
                                    </label>
                                    <p class="help-block">This page will be accessible via a web page.</p>
                                    <label>
                                    @isset($configControllerPage->rest)
                                        <input type="checkbox" name="rest" value="true" @if($configControllerPage->web) checked @endif> REST Page
                                    @else
                                        <input type="checkbox" name="rest" value="true"> REST Page
                                    @endisset
                                    </label>
                                    <p class="help-block">This page will be accessible via REST API.</p>
                                </div>
                                <div class="checkbox" id="landing">
                                    <label>
                                    @isset($configControllerPage->url)
                                        @if($configController->defaultPage == $configControllerPage->url)
                                        <input type="checkbox" name="landing" value="true" checked> Set as Landing Page
                                        @else
                                        <input type="checkbox" name="landing" value="true"> Set as Landing Page
                                        @endif
                                    @else
                                        <input type="checkbox" name="landing" value="true"> Set as Landing Page
                                    @endisset
                                    </label>
                                    <p class="help-block">This page will be controller landing page.</p>
                                </div>
                                <div class="form-group" id="redirect">
                                    <label>Redirect URL</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">{{ url('/') . '/' }}</div>
                                        <input type="text" class="form-control" name="redirect" @isset($configControllerPage->redirect) value="{{ $configControllerPage->redirect }}" @endisset placeholder="Enter Redirect URL">
                                    </div>
                                    <p class="help-block">Redirect URL after create or edit.</p>
                                </div>
                                <div class="form-group">
                                    <label>View File Name</label>
                                    <input type="text" class="form-control" name="view" @isset($configControllerPage->view) value="{{ $configControllerPage->view }}" @endisset placeholder="Enter View File Name">
                                    <p class="help-block">Use existing view file name if needed.</p>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('mager.pages.index') }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager', 'assets/js/pages/create-page']);
        });
    </script>
@endsection
