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
    <input type="text" class="form-control" id="{{ $dataId }}" name="{{ $name }}"
           value="{{ '{{$' . $name . '}' . '}' }}"
           placeholder="{{ $placeholder }}"
           minlength="{{ $minlength }}"
           maxlength="{{ $maxlength }}">
</div>