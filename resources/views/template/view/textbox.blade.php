<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:27
 */
?>

<div class="form-group">
    <label>{{ $label }}</label>
    <input type="text" class="form-control" id="{{ $id }}" name="{{ $name }}"
           value="{{ '{{$data->' . $name . '}' . '}' }}"
           placeholder="{{ $placeholder }}"
           minlength="{{ $minlength }}"
           maxlength="{{ $maxlength }}">
</div>
