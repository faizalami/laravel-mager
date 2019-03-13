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
<style>
    .delete-form {
        display: inline-block;
    }
</style>
{{ '@' }}endsection

{{ '@' }}section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                <span class="pull-right">
                    {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['edit'].'\'' }}))
                    <a class="btn btn-xs btn-primary" href="{{ '{'.'{ route(\''.$controller.'.'.$links['edit'].'\', $'.lcfirst($model).'->id) }'.'}' }}">Edit</a>
                    {{ '@' }}endif

                    {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['destroy'].'\'' }}))
                    <form class="delete-form" action="{{ '{'.'{ route(\''.$controller.'.'.$links['destroy'].'\', $'.lcfirst($model).'->id) }'.'}' }}" method="post">
                        {{ '@' }}csrf
                        {{ '@' }}method('DELETE')
                        <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                    </form>
                    {{ '@' }}endif
                </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
{{ '@' }}endsection
