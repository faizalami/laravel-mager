<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 17/03/19
 * Time: 20:02
 */
?>

@isset($data)
<input name="{{ $name }}" type="number" class="form-control input-{{ $name }}" value="{{ $data->{$name} }}">
@else
<input name="data[0][{{ $name }}]" type="number" class="form-control input-{{ $name }}">
@endisset
