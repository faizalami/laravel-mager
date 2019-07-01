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
    <link rel="stylesheet" href="{{ asset(config('mager.public_path').'assets/css/pages/project-configuration/theme.css') }}">
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
                                    <input type="text" class="form-control" name="name" @isset($configTheme->name) value="{{ $configTheme->name }}" @endisset placeholder="Enter Application Name">
                                </div>
                                <div class="form-group">
                                    <label>Application Logo</label>
                                    <div class="dropzone" id="logo"></div>
                                    <input type="hidden" name="logo" @isset($configTheme->logo) value="{{ $configTheme->logo }}" @endisset id="logo-input">
                                </div>
                                <div class="form-group">
                                    <label>Page Layout</label>
                                    <select name="layout" id="layout" class="form-control">
                                        <option value="" disabled>Choose Page Layout</option>
                                        <option value="fixed" @if($configTheme->layout == 'fixed') selected @endif>Fixed</option>
                                        <option value="sidebar-collapse" @if($configTheme->layout == 'sidebar-collapse') selected @endif>Collapsed Sidebar</option>
                                        <option value="layout-boxed" @if($configTheme->layout == 'layout-boxed') selected @endif>Boxed Layout</option>
                                        <option value="layout-top-nav" @if($configTheme->layout == 'layout-top-nav') selected @endif>Top Navigation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Page Theme</label>
                                    <ul id="theme" class="list-unstyled clearfix">
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-blue" @if($configTheme->theme == 'blue') checked @endif class="theme-radio" type="radio" name="theme" value="blue">
                                            <a href="javascript:void(0)" data-skin="skin-blue" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Blue</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-black" @if($configTheme->theme == 'black') checked @endif class="theme-radio" type="radio" name="theme" value="black">
                                            <a href="javascript:void(0)" data-skin="skin-black" class="skin-button clearfix full-opacity-hover">
                                                <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Black</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-purple" @if($configTheme->theme == 'purple') checked @endif class="theme-radio" type="radio" name="theme" value="purple">
                                            <a href="javascript:void(0)" data-skin="skin-purple" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Purple</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-green" @if($configTheme->theme == 'green') checked @endif class="theme-radio" type="radio" name="theme" value="green">
                                            <a href="javascript:void(0)" data-skin="skin-green" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Green</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-red" @if($configTheme->theme == 'red') checked @endif class="theme-radio" type="radio" name="theme" value="red">
                                            <a href="javascript:void(0)" data-skin="skin-red" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Red</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-yellow" @if($configTheme->theme == 'yellow') checked @endif class="theme-radio" type="radio" name="theme" value="yellow">
                                            <a href="javascript:void(0)" data-skin="skin-yellow" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin">Yellow</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-blue-light" @if($configTheme->theme == 'blue-light') checked @endif class="theme-radio" type="radio" name="theme" value="blue-light">
                                            <a href="javascript:void(0)" data-skin="skin-blue-light" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-black-light" @if($configTheme->theme == 'black-light') checked @endif class="theme-radio" type="radio" name="theme" value="black-light">
                                            <a href="javascript:void(0)" data-skin="skin-black-light" class="skin-button clearfix full-opacity-hover">
                                                <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Black Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-purple-light" @if($configTheme->theme == 'purple-light') checked @endif class="theme-radio" type="radio" name="theme" value="purple-light">
                                            <a href="javascript:void(0)" data-skin="skin-purple-light" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-green-light" @if($configTheme->theme == 'green-light') checked @endif class="theme-radio" type="radio" name="theme" value="green-light">
                                            <a href="javascript:void(0)" data-skin="skin-green-light" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-red-light" @if($configTheme->theme == 'red-light') checked @endif class="theme-radio" type="radio" name="theme" value="red-light">
                                            <a href="javascript:void(0)" data-skin="skin-red-light" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
                                            </a>
                                            <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                                        </li>
                                        <li style="float:left; width: 33.33333%; padding: 5px;">
                                            <input id="skin-yellow-light" @if($configTheme->theme == 'yellow-light') checked @endif class="theme-radio" type="radio" name="theme" value="yellow-light">
                                            <a href="javascript:void(0)" data-skin="skin-yellow-light" class="skin-button clearfix full-opacity-hover">
                                                <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                                <div><span style="display:block; width: 20%; float: left; height: 30px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 30px; background: #f4f5f7"></span></div>
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
            var uploadRoute = '{{ route('mager.configuration.logo') }}';

            require(['adminlte', 'laravelmager']);
            require(['jquery', 'dropzone'], function ($, Dropzone) {
                $('#theme li input:checked').siblings('.skin-button').addClass('active');
                $('.skin-button').click(function () {
                    $('.skin-button').removeClass('active');
                    $('.theme-radio').removeAttr('checked');

                    $(this).addClass('active');
                    $('#'+$(this).data('skin')).attr('checked', true);
                });

                new Dropzone('#logo', {
                    dictDefaultMessage: 'Click here or drop image here to upload.',
                    url: uploadRoute,
                    autoProcessQueue: true,
                    uploadMultiple: false,
                    parallelUploads: 1,
                    maxFiles: 1,
                    addRemoveLinks: true,
                    acceptedFiles: 'image/*',
                    init: function(a, b) {
                        var existing = {
                            name: $('#logo-input').val()
                        };

                        this.emit('addedfile', existing);
                        this.emit('complete', existing);
                        this.emit('thumbnail', existing, '/'+existing.name);
                    },
                    accept: function(file, done)
                    {
                        var re = /(?:\.([^.]+))?$/;
                        var ext = re.exec(file.name)[1];
                        ext = ext.toUpperCase();
                        if ( ext === "JPG" || ext === "JPEG" || ext === "PNG" ||  ext === "GIF" ||  ext == "BMP")
                        {
                            done();
                        } else {
                            done("Please select only supported picture files.");
                        }
                    },
                    success: function( file, response ){
                        $('#logo-input').val(response.name);
                    }
                });
            });
        });
    </script>
@endsection
