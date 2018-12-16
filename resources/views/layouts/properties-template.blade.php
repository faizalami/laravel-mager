<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/10/18
 * Time: 4:56
 */

$options = '';
for ($i = 1; $i <= 12; $i++) {
    $options .= '<option value="' . $i . '">' . $i . '</option>';
}

?>

<template id="template-property-input">
    <div class="sidebar-item">
        <div class="form-group">
            <label class="col-sm-6 control-label property-label"></label>

            <div class="col-sm-6 property-input">

            </div>
        </div>
    </div>
</template>

<template id="template-property-textbox">
    <input type="text" class="form-control">
</template>

<template id="template-property-numberbox">
    <input type="number" class="form-control">
</template>

<template id="template-property-textarea">
    <textarea rows="3" class="form-control"></textarea>
</template>

@foreach(['xs', 'sm', 'md', 'lg'] as $col)
<template id="template-property-{{ $col }}">
    <select class="form-control">
        {!! $options !!}
    </select>
</template>
@endforeach