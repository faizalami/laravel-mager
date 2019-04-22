<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/03/19
 * Time: 11:08
 */
?>

<table id="{{ $id }}" class="table table-bordered table-striped">
    <tbody>
    @foreach(explode(',', $columns) as $column)
        <tr>
            <th>{{ $modelColumns->{$column}->label }}</th>
            <td>{{ '{'.'{ $data->'.$column.' }'.'}' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
