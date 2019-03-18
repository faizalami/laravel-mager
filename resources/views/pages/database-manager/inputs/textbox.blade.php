<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 17/03/19
 * Time: 19:55
 */
?>

@isset($data)
<input name="{{ $name }}" type="text" class="form-control input-{{ $name }}" value="{{ $data->{$name} }}">
@else
<input name="data[0][{{ $name }}]" type="text" class="form-control input-{{ $name }}">
@endisset
