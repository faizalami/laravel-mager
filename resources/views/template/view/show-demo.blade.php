<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 24/12/18
 * Time: 17:34
 */
?>

{{ '@' }}extends('layouts.main', ['breadcrumb' => 'Database Manager'])

{{ '@' }}section('title', '{{ $title }}')
{{ '@' }}section('page-id', '{{ $title }}')

{{ '@' }}section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-bordered table-striped">
            {{ '@' }}foreach($columnLabels as $column => $label)
            <tr>
                <th>{{ '{'.'{ $label }'.'}' }}</th>
                <td> : </td>
                <td>{{ '{'.'{ $'.lcfirst($model).'->{$column} }'.'}' }}</td>
            </tr>
            {{ '@' }}endforeach
            <tr>
                {{ '@' }}if(Route::has({{ '\''.$controller.'.update\'' }}))
                <td colspan="2"><a href="{{ '{'.'{ route(\''.$controller.'.update\', $'.lcfirst($model).'->id) }'.'}' }}" class="btn btn-primary">Edit</a></td>
                {{ '@' }}else
                <td>&nbsp;</td>
                {{ '@' }}endif

                {{ '@' }}if(Route::has({{ '\''.$controller.'.delete\'' }}))
                <td>
                    <form action="{{ '{'.'{ route(\''.$controller.'.delete\', $'.lcfirst($model).'->id) }'.'}' }}" method="post">
                        {{ '@' }}csrf
                        {{ '@' }}method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                {{ '@' }}else
                <td>&nbsp;</td>
                {{ '@' }}endif
            </tr>
        </table>
    </div>
</div>
{{ '@' }}endsection
