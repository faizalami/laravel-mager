<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 17/03/19
 * Time: 20:08
 */
?>

@isset($data)
<textarea name="data[0][{{ $name }}]" class="form-control input-{{ $name }}">{{ $data->{$name} }}</textarea>
@else
<textarea name="data[0][{{ $name }}]" class="form-control input-{{ $name }}"></textarea>
@endisset
