<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/10/18
 * Time: 4:15
 */
?>

<template id="template-component">
    <div class="drag-component component-container">
        <div class="component-buttons btn-group" role="group">
            <button class="config-button button-property btn btn-primary btn-xs" data-toggle="tooltip" title="Properties"><i class="fas fa-wrench"></i></button>
            <button class="config-button button-remove btn btn-danger btn-xs" data-toggle="tooltip" title="Remove"><i class="fas fa-trash-alt"></i></button>
        </div>
        <div class="component-body"></div>
    </div>
</template>

<template id="template-label">
    <label class="component-label">Label Text</label>
</template>

<template id="template-textbox">
    <div class="form-group">
        <label class="component-label">Textbox Label</label>
        <input type="text" class="form-control component-input" placeholder="Textbox placeholder">
    </div>
</template>

<template id="template-numberbox">
    <div class="form-group">
        <label class="component-label">Numberbox Label</label>
        <input type="number" class="form-control component-input" placeholder="Numberbox placeholder">
    </div>
</template>

<template id="template-emailbox">
    <div class="form-group">
        <label class="component-label">Emailbox Label</label>
        <input type="email" class="form-control component-input" placeholder="Emailbox placeholder">
    </div>
</template>

<template id="template-passwordbox">
    <div class="form-group">
        <label class="component-label">Passwordbox Label</label>
        <input type="password" class="form-control component-input" placeholder="Passwordbox placeholder">
    </div>
</template>

<template id="template-button">
    <div class="form-group">
        <button class="btn btn-default component-button">Button</button>
    </div>
</template>
