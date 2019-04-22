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
    <textarea class="form-control"  id="{{ $id }}" name="{{ $name }}"
              placeholder="{{ $placeholder }}"
              minlength="{{ $minlength }}"
              maxlength="{{ $maxlength }}"
              rows="{{ $rows }}"
              cols="{{ $cols }}">{{ '{{$data->' . $name . '}' . '}' }}</textarea>
</div>
