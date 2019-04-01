<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:40
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'Generate Dummy Data - ' . $configModel->name . ' | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Generate Dummy Data - {{ $configModel->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Column Name</th>
                                        <th>Dummy Type</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 0)
                                    @foreach($columns as $name => $column)
                                        <tr id="row-{{ $i }}">
                                            <td>
                                                {{ $column->label }}
                                                <input type="hidden" name="dummy[{{ $i }}][name]" value="{{ $name }}">
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="type" id="dummy[{{ $i }}][type]" data-row="{{ $i }}" class="form-control select-dummy-type">
                                                        <option value="" selected disabled>Choose Dummy Type</option>
                                                        <option value="number">Random Number</option>
                                                        <option value="name">Name</option>
                                                        <option value="phone">Phone Number</option>
                                                        <option value="address">Address</option>
                                                        <option value="email">Email</option>
                                                        <option value="domain">Website</option>
                                                        <option value="jobTitle">Job Title</option>
                                                        <option value="sentence">Sentence</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="column-option">

                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group">
                                                <label>Amount of Data</label>
                                                <input type="number" class="form-control" name="amount" placeholder="Enter Amount of Data">
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-warning" href="{{ route('mager.database.table.data', ['table' => 'table1']) }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <template id="template-number">
        <div class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Min</div>
                    <input type="number" name="dummy[x][option][min]" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Max</div>
                    <input type="number" name="dummy[x][option][max]" class="form-control">
                </div>
            </div>
        </div>
    </template>

    <template id="template-name">
        <div class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Type</div>
                    <select name="dummy[x][option][type]" id="" class="form-control">
                        <option value="full-name">Full Name</option>
                        <option value="first-name">First Name</option>
                        <option value="last-name">Last Name</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Gender</div>
                    <select name="dummy[x][option][gender]" id="" class="form-control">
                        <option value="both">Both Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
        </div>
    </template>

    <template id="template-phone">
        No Option
    </template>

    <template id="template-address">
        <div class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Type</div>
                    <select name="dummy[x][option][type]" id="" class="form-control">
                        <option value="address">Full Address</option>
                        <option value="city">City</option>
                        <option value="country">Country</option>
                        <option value="postcode">Post Code</option>
                        <option value="latitude">Latitude</option>
                        <option value="longitude">Longitude</option>
                    </select>
                </div>
            </div>
        </div>
    </template>

    <template id="template-email">
        No Option
    </template>

    <template id="template-domain">
        No Option
    </template>

    <template id="template-jobTitle">
        No Option
    </template>

    <template id="template-sentence">
        <div class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Word Amount</div>
                    <input type="number" name="dummy[x][option][word]" class="form-control">
                </div>
            </div>
        </div>
    </template>

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);
            require(['jquery'], function ($) {
                $('.select-dummy-type').change(function () {
                    var i = $(this).data('row');
                    var $row = $('#row-'+i+' .column-option');
                    var template = $('#template-'+$(this).val()).html().replace(/\[x]/g, '['+(i).toString()+']');

                    $row.html(template);
                });
            })
        });
    </script>
@endsection
