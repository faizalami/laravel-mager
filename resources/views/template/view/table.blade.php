<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/03/19
 * Time: 11:08
 */
?>

<table id="{{ $id }}" class="table table-bordered table-striped dataTable">
    <thead>
    <tr>
        @foreach(explode(',', $columns) as $column)
            <th>{{ $modelColumns->{$column}->label }}</th>
        @endforeach
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    {{ '@' }}foreach($data as $item)
    <tr>
        @foreach(explode(',', $columns) as $column)
            <td>{{ '{'.'{ $item->'.$column.' }'.'}' }}</td>
        @endforeach
        <td>
            {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['show'].'\'' }}))
            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Item Detail" href="{{ '{'.'{ route(\''.$controller.'.'.$links['show'].'\', $item->id) }'.'}' }}"><i class="far fa-eye"></i></a>
            {{ '@' }}endif

            {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['edit'].'\'' }}))
            <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Item" href="{{ '{'.'{ route(\''.$controller.'.'.$links['edit'].'\', $item->id) }'.'}' }}"><i class="fas fa-edit"></i></a>
            {{ '@' }}endif

            {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['destroy'].'\'' }}))
            <form class="delete-form" action="{{ '{'.'{ route(\''.$controller.'.'.$links['destroy'].'\', $item->id) }'.'}' }}" method="post">
                {{ '@' }}csrf
                {{ '@' }}method('DELETE')
                <button class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Item" type="submit"><i class="far fa-trash-alt"></i></button>
            </form>
            {{ '@' }}endif
        </td>
    </tr>
    {{ '@' }}endforeach
    </tbody>
</table>
