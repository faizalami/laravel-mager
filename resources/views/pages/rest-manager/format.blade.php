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
                                        <input type="checkbox" id="wrap" name="wrap" value="true" checked> Wrap Response
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
                                                        <input type="checkbox" name="status" value="true"> Status
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Response Status (true / false)</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" name="message" value="true"> Message
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Response Message</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" name="length" value="true"> Length
                                                    </label>
                                                </th>
                                                <td>:</td>
                                                <td>Amount of Response Data</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" value="true" disabled> Data
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
                                            <tr id="status-wrapper">
                                                <td>&nbsp;</td>
                                                <td>"status"</td>
                                                <td>:</td>
                                                <td colspan="4">true,</td>
                                            </tr>
                                            <tr id="message-wrapper">
                                                <td>&nbsp;</td>
                                                <td>"message"</td>
                                                <td>:</td>
                                                <td colspan="4">"get member data success",</td>
                                            </tr>
                                            <tr id="length-wrapper">
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

            require(['jquery'], function($) {
                $('#unwrapped-example').hide();
                if($('#wrap').prop('checked') === false) {
                    $('#wrapper-form, #wrapped-example').hide();
                    $('#unwrapped-example').show();
                }

                $('#wrap').on('input', function () {
                    if($('#wrap').prop('checked') === false) {
                        $('#wrapper-form, #wrapped-example').hide();
                        $('#unwrapped-example').show();
                    } else {
                        $('#wrapper-form, #wrapped-example').show();
                        $('#unwrapped-example').hide();
                    }
                });
            });
        });
    </script>
@endsection
