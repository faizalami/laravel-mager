<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:25
 */
?>

{{ '@' }}extends('layouts.main', ['breadcrumb' => '{{ $title }}'])

{{ '@' }}section('title', '{{ $title }}')
{{ '@' }}section('page-id', '{{ $title }}')

{{ '@' }}section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post">
                    {{ '@' }}csrf
                    {{ $content }}
                </form>
            </div>
        </div>
    </div>
</div>
{{ '@' }}endsection
