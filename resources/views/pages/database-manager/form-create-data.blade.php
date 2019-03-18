<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:35
 */

?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'New Data - ' . $configModel->name . ' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">New Data - {{ $configModel->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Column List:</h4>
                                <table class="table table-bordered table-striped" id="table-create-data">
                                    <thead>
                                    <tr>
                                        @foreach($columns as $column)
                                        <th>{{ $column->label }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @php($i = 0)
                                        @foreach($columns as $name => $column)
                                        <td>
                                            <div class="form-group">
                                                @include('mager::pages.database-manager.inputs.'.$column->input, ['name' => $name])
                                            </div>
                                        </td>
                                        @php($i++)
                                        @endforeach
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="{{ $i }}"><a id="button-add-column" class="btn btn-primary btn-xs pull-right" href="javascript:void(0)">Add New Column <i class="fas fa-plus-circle"></i></a></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.database.table.data', ['controller' => $configModel->controller]) }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <template id="template-form">
        <tr>
        @foreach($columns as $name => $column)
            <td>
                <div class="form-group">
                    @include('mager::pages.database-manager.inputs.'.$column->input, ['name' => $name])
                </div>
            </td>
        @endforeach
        </tr>
    </template>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);
            require(['jquery'], function($) {
                var i = 1;
                $('#button-add-column').click(function () {
                    var newForm = $('#template-form').html().replace(/\[0]/g, '['+(i).toString()+']');

                    $('#table-create-data tbody').append(newForm);
                    i++;
                });
            });
        });
    </script>
@endsection
