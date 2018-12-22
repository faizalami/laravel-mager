<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:28
 */
?>

<div class="form-group">
    <label>{{ $label }}</label>
    <input type="password" class="form-control" id="{{ $dataId }}" name="{{ $name }}"
           value="{{ '{{$' . $name . '}' . '}' }}"
           placeholder="{{ $placeholder }}"
           minlength="{{ $minlength }}"
           maxlength="{{ $maxlength }}">
</div>