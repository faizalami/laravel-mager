<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/03/19
 * Time: 11:04
 */
?>

{{ '@' }}extends('layouts.main', ['breadcrumb' => '{{ $title }}'])

{{ '@' }}section('title', '{{ $title }}')
{{ '@' }}section('page-id', '{{ $title }}')

{{ '@' }}section('additional-styles')
<link rel="stylesheet" href="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
<style>
    .delete-form {
        display: inline-block;
    }

    .thumbnail-index {
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        border: 1px solid #f0f0f0 !important;
    }
</style>
{{ '@' }}endsection

{{ '@' }}section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['edit'].'\'' }}))
                <a class="btn btn-xs btn-primary pull-right" href="{{ '{'.'{ route(\''.$controller.'.'.$links['create'].'\') }'.'}' }}">Create New</a>
                {{ '@' }}endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
{{ '@' }}endsection

{{ '@' }}section('additional-scripts')
<script src="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset(config('mager.public_path').'plugins/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $dataTable = $('.dataTable');
        if($dataTable.length > 0) {
            $dataTable.DataTable();
        }
    });
</script>
{{ '@' }}endsection
