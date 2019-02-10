<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 11/02/19
 * Time: 6:40
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Database Manager'])

@section('title', 'Generate Dummy Data - table1 | Database Manager')
@section('page-id', 'database-manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Generate Dummy Data - table1</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Column List:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Column Name</th>
                                        <th>Dummy Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>column1</td>
                                        <td>
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Choose Dummy Type</option>
                                                    <option value="name">Name</option>
                                                    <option value="random-number">Random Number</option>
                                                    <option value="address">Address</option>
                                                    <option value="date-now">Date Now</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td>column2</td>
                                        <td>
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Choose Dummy Type</option>
                                                    <option value="name">Name</option>
                                                    <option value="random-number">Random Number</option>
                                                    <option value="address">Address</option>
                                                    <option value="date-now">Date Now</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td>column3</td>
                                        <td>
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Choose Dummy Type</option>
                                                    <option value="name">Name</option>
                                                    <option value="random-number">Random Number</option>
                                                    <option value="address">Address</option>
                                                    <option value="date-now">Date Now</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2">
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

    <script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
    <script>
        require(['main'], function () {
            require(['adminlte', 'laravelmager']);
        });
    </script>
@endsection
