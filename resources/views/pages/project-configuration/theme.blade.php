<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:07
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Configuration - Theme'])

@section('title', 'Configuration - Theme')
@section('page-id', 'configuration-theme')
@section('additional-styles')
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/dropzone/dropzone.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Theme Configuration</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Application Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Application Name">
                                </div>
                                <div class="form-group">
                                    <label>Application Logo</label>
                                    <div class="dropzone" id="logo"></div>
                                </div>
                                <div class="form-group">
                                    <label>Page Layout</label>
                                    <select name="layout" id="layout" class="form-control">
                                        <option value="" selected>Choose Page Layout</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="sidebar-collapse">Collapsed Sidebar</option>
                                        <option value="layout-boxed">Boxed Layout</option>
                                        <option value="layout-top-nav">Top Navigation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Page Theme</label>
                                    <ul class="list-unstyled clearfix">
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Blue</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Black</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Purple</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Green</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Red</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Yellow</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Black Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Yellow Light</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
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
            require(['adminlte', 'laravelmager']);
            require(['dropzone'], function (Dropzone) {
                Dropzone.options.logo= {
                    dictDefaultMessage: 'Click here or drop image here to upload.',
                    url: '#',
                    autoProcessQueue: false,
                    uploadMultiple: false,
                    parallelUploads: 1,
                    maxFiles: 1,
                    addRemoveLinks: true,
                    acceptedFiles: 'image/*',
                    init: function() {
                        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                        // for Dropzone to process the queue (instead of default form behavior):
                        // document.getElementById("submit-all").addEventListener("click", function(e) {
                        //     // Make sure that the form isn't actually being sent.
                        //     e.preventDefault();
                        //     e.stopPropagation();
                        //     dzClosure.processQueue();
                        // });
                        //
                        // //send all the form data along with the files:
                        // this.on("sendingmultiple", function(data, xhr, formData) {
                        //     formData.append("firstname", jQuery("#firstname").val());
                        //     formData.append("lastname", jQuery("#lastname").val());
                        // });
                    }
                }
            });
        });
    </script>
@endsection
