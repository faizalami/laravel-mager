<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 22/12/18
 * Time: 13:16
 */
?>

<div class="form-group">
    <label>{{ $label }}</label>
    <textarea class="form-control"  id="{{ $dataId }}" name="{{ $name }}"
              placeholder="{{ $placeholder }}"
              minlength="{{ $minlength }}"
              maxlength="{{ $minlength }}"
              rows="{{ $rows }}"
              cols="{{ $cols }}">{{ '{{$' . $name . '}' . '}' }}</textarea>
</div>
