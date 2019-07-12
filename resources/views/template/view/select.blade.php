<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 12/07/19
 * Time: 12:24
 */
?>

<div class="form-group">
    <label>{{ $label }}</label>
    <select class="form-control component-input" id="{{ $id }}" name="{{ $name }}">
        {{ '@' }}isset($data->{{ $name }})
        <option disabled>{{ $placeholder }}</option>
    @foreach(json_decode($option, true) as $optionItem)
        <option value="{{ $optionItem['value'] }}" {{ '@' }}if($data->{{ $name }} == '{{ $optionItem['value'] }}') selected {{ '@' }}endif >{{ $optionItem['display'] }}</option>
    @endforeach
        {{ '@' }}else
        <option disabled selected>{{ $placeholder }}</option>
    @foreach(json_decode($option, true) as $optionItem)
        <option value="{{ $optionItem['value'] }}">{{ $optionItem['display'] }}</option>
    @endforeach
        {{ '@' }}endisset
    </select>
</div>
