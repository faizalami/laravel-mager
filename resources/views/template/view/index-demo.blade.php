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
        <a href="{{ '{'.'{ route(\''.$controller.'.create\') }'.'}' }}" class="btn btn-primary">Create New</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    {{ '@' }}foreach($columnLabels as $label)
                    <th>{{ '{'.'{ $label }'.'}' }}</th>
                    {{ '@' }}endforeach
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{ '@' }}foreach(${{ lcfirst($model) }} as $item)
                <tr>
                    {{ '@' }}foreach($columnLabels as $column => $label)
                    <td>{{ '{'.'{ $item->{$column} }'.'}' }}</td>
                    {{ '@' }}endforeach
                    <td><a href="{{ '{'.'{ route(\''.$controller.'.update\', $item->id) }'.'}' }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ '{'.'{ route(\''.$controller.'.delete\', $item->id) }'.'}' }}" method="post">
                            {{ '@' }}csrf
                            {{ '@' }}method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                {{ '@' }}endforeach
            </tbody>
        </table>
    </div>
</div>
{{ '@' }}endsection