<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:04
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'REST Manager'])

@section('title', 'REST Manager')
@section('page-id', 'rest-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="{{ route('mager.rest.index') }}">REST Controllers</a></li>
                    <li class="active"><a href="javascript:void(0)">Response Format</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form method="post">
                            <div class="form-group">
                                <div class="checkbox">
                                    <h4><label>
                                        @isset($configRest->wrap)
                                        <input type="checkbox" id="wrap" name="wrap" value="true" @if($configRest->wrap) checked @endif> Wrap Response
                                        @else
                                        <input type="checkbox" id="wrap" name="wrap" value="true"> Wrap Response
                                        @endif
                                        </label></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="wrapper-form">
                                        <label>Choose Format</label>
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>
                                                    <label>
                                                        @isset($configRest->status)
                                                        <input class="input-format" id="input-status" type="checkbox" name="status" value="true" @if($configRest->status) checked @endif> Status
                                                        @else
                                                        <input class="input-format" id="input-status" type="checkbox" name="status" value="true"> Status
                                                        @endisset
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Response Status (true / false)</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        @isset($configRest->message)
                                                        <input class="input-format" id="input-message" type="checkbox" name="message" value="true" @if($configRest->message) checked @endif> Message
                                                        @else
                                                        <input class="input-format" id="input-message" type="checkbox" name="message" value="true"> Message
                                                        @endisset
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Response Message</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        @isset($configRest->length)
                                                        <input class="input-format" id="input-length" type="checkbox" name="length" value="true" @if($configRest->length) checked @endif> Length
                                                        @else
                                                        <input class="input-format" id="input-length" type="checkbox" name="length" value="true"> Length
                                                        @endisset
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Amount of Response Data</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" value="true" disabled checked> Data
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Response Data</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>

                                    <div id="wrapped-example">
                                        <label>Example</label>
                                        <table>
                                            <tr>
                                                <td>{</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr id="status-wrapper" data-wrap="status" class="format-wrapper">
                                                <td>&nbsp;</td>
                                                <td>"status"</td>
                                                <td>:</td>
                                                <td colspan="4">true,</td>
                                            </tr>
                                            <tr id="message-wrapper" data-wrap="message" class="format-wrapper">
                                                <td>&nbsp;</td>
                                                <td>"message"</td>
                                                <td>:</td>
                                                <td colspan="4">"get member data success",</td>
                                            </tr>
                                            <tr id="length-wrapper" data-wrap="length" class="format-wrapper">
                                                <td>&nbsp;</td>
                                                <td>"length"</td>
                                                <td>:</td>
                                                <td colspan="4">2,</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>"data"</td>
                                                <td>:</td>
                                                <td colspan="4">[</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>{</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"name"</td>
                                                <td>:</td>
                                                <td>"Member Name 1",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"email"</td>
                                                <td>:</td>
                                                <td>"email1@mail.com",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"age"</td>
                                                <td>:</td>
                                                <td>22,</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"address"</td>
                                                <td>:</td>
                                                <td>"Member Address 1",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>},</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>{</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"name"</td>
                                                <td>:</td>
                                                <td>"Member Name 2",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"email"</td>
                                                <td>:</td>
                                                <td>"email2@mail.com",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"age"</td>
                                                <td>:</td>
                                                <td>22,</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"address"</td>
                                                <td>:</td>
                                                <td>"Member Address 2",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>}</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>]</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>}</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div id="unwrapped-example">
                                        <label>Example</label>
                                        <table>
                                            <tr>
                                                <td>[</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>{</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"name"</td>
                                                <td>:</td>
                                                <td>"Member Name 1",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"email"</td>
                                                <td>:</td>
                                                <td>"email1@mail.com",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"age"</td>
                                                <td>:</td>
                                                <td>22,</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"address"</td>
                                                <td>:</td>
                                                <td>"Member Address 1",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>},</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>{</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"name"</td>
                                                <td>:</td>
                                                <td>"Member Name 2",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"email"</td>
                                                <td>:</td>
                                                <td>"email2@mail.com",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"age"</td>
                                                <td>:</td>
                                                <td>22,</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>"address"</td>
                                                <td>:</td>
                                                <td>"Member Address 2",</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>}</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>]</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);

            require(['jquery', 'lodash'], function($, _) {
                $('#unwrapped-example').hide();
                if($('#wrap').prop('checked') === false) {
                    $('#wrapper-form, #wrapped-example').hide();
                    $('#unwrapped-example').show();
                }

                $('#wrap').on('input', function () {
                    if($(this).prop('checked') === false) {
                        $('#wrapper-form, #wrapped-example').hide();
                        $('#unwrapped-example').show();
                    } else {
                        $('#wrapper-form, #wrapped-example').show();
                        $('#unwrapped-example').hide();
                    }
                });

                _.forEach($('.format-wrapper'), function(wrapper) {
                    if($('#input-'+$(wrapper).data('wrap')).prop('checked') === false) {
                        $(wrapper).hide();
                    } else {
                        $(wrapper).show();
                    }
                });

                $('.input-format').on('input', function() {
                    if($(this).prop('checked') === false) {
                        $('#' + $(this).prop('name') + '-wrapper').hide();
                    } else {
                        $('#' + $(this).prop('name') + '-wrapper').show();
                    }
                });
            });
        });
    </script>
@endsection
