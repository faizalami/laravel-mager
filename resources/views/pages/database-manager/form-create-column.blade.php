<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:28
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'New Column - ' . $configModel->name . ' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">New Column - {{ $configModel->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-new-column" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Column Name</th>
                                        <th>Column Label</th>
                                        <th>Input Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input name="columns[0][name]" type="text" class="form-control" placeholder="Column Name">
                                            </td>
                                            <td>
                                                <input name="columns[0][label]" type="text" class="form-control" placeholder="Column Label">
                                            </td>
                                            <td>
                                                <select name="columns[0][input]" class="form-control">
                                                    <option value="" selected disabled>Input Type</option>
                                                    <option value="textbox">Textbox</option>
                                                    <option value="emailbox">Emailbox</option>
                                                    <option value="numberbox">Numberbox</option>
                                                    <option value="passwordbox">Passwordbox</option>
                                                    <option value="textarea">Textarea</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3"><a id="button-add-column" class="btn btn-primary btn-xs pull-right" href="javascript:void(0)">Add New Column <i class="fas fa-plus-circle"></i></a></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.database.table.properties', ['controller' => $configModel->controller]) }}">Back</a>
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
            require(['adminlte', 'laravelmager']);
            require(['jquery'], function ($) {
                var i = 1;

                $('#button-add-column').click(function (event) {
                    $('#table-new-column tbody').append('<tr>\n' +
                        '    <td>\n' +
                        '        <input name="columns['+i+'][name]" type="text" class="form-control" placeholder="Column Name">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <input name="columns['+i+'][label]" type="text" class="form-control" placeholder="Column Label">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <select name="columns['+i+'][input]" class="form-control">\n' +
                        '            <option value="" selected disabled>Input Type</option>\n' +
                        '            <option value="textbox">Textbox</option>\n' +
                        '            <option value="emailbox">Emailbox</option>\n' +
                        '            <option value="numberbox">Numberbox</option>\n' +
                        '            <option value="passwordbox">Passwordbox</option>\n' +
                        '            <option value="textarea">Textarea</option>\n' +
                        '        </select>\n' +
                        '    </td>\n' +
                        '</tr>')
                    i++;
                });
            })
        });
    </script>
@endsection
