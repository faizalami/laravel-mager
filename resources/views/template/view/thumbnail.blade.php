<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/03/19
 * Time: 11:09
 */
?>

<div id="{{ $id }}" class="row">
    {{ '@' }}foreach(${{ lcfirst($model) }} as $item)
    <div class="col-xs-{{ $xs }} col-sm-{{ $sm }} col-md-{{ $md }} col-lg-{{ $lg }}">
        <div class="thumbnail-index box box-solid">
            <div class="box-body">
                <h4>{{ '{'.'{ $item->'.$title.' }'.'}' }}</h4>
                <p>{{ '{'.'{ $item->'.$content.' }'.'}' }}</p>

                {{ '@' }}if(Route::has({{ '\''.$controller.'.'.$links['show'].'\'' }}))
                <a class="btn btn-primary btn-block" href="{{ '{'.'{ route(\''.$controller.'.'.$links['show'].'\', $item->id) }'.'}' }}">Detail</a>
                {{ '@' }}endif
            </div>
        </div>
    </div>
    {{ '@' }}endforeach
</div>
