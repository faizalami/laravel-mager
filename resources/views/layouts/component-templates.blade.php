<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/10/18
 * Time: 4:15
 */
?>

<template id="template-component">
    <div class="drag-component component-container full-width">
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

<template id="template-heading">
    <h1 class="component-heading">Heading</h1>
    <h2 class="component-heading">Heading</h2>
    <h3 class="component-heading active">Heading</h3>
    <h4 class="component-heading">Heading</h4>
    <h5 class="component-heading">Heading</h5>
    <h6 class="component-heading">Heading</h6>
</template>

<template id="template-paragraph">
    <p class="component-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ea veniam voluptate. Asperiores assumenda commodi harum hic id inventore laboriosam nisi odit, perspiciatis placeat provident repellendus sed, sint suscipit tenetur?
    </p>
</template>

<template id="template-label-data">
    <label class="component-label-data">Label Text</label>
</template>

<template id="template-heading-data">
    <h1 class="component-heading">Heading</h1>
    <h2 class="component-heading">Heading</h2>
    <h3 class="component-heading active">Heading</h3>
    <h4 class="component-heading">Heading</h4>
    <h5 class="component-heading">Heading</h5>
    <h6 class="component-heading">Heading</h6>
</template>

<template id="template-paragraph-data">
    <p class="component-paragraph-data">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ea veniam voluptate. Asperiores assumenda commodi harum hic id inventore laboriosam nisi odit, perspiciatis placeat provident repellendus sed, sint suscipit tenetur?
    </p>
</template>

<template id="template-row">
    <div class="drag-component component-row full-width">
        <div class="component-buttons btn-group" role="group">
            <button class="config-button button-property btn btn-primary btn-xs" data-toggle="tooltip" title="Properties"><i class="fas fa-wrench"></i></button>
            <button class="config-button button-remove btn btn-danger btn-xs" data-toggle="tooltip" title="Remove"><i class="fas fa-trash-alt"></i></button>
        </div>
        <div class="row nested-sortable">

        </div>
    </div>
</template>

<template id="template-col">
    <div class="col-md-4 drag-component component-col">
        <div class="component-buttons btn-group" role="group">
            <button class="config-button button-property btn btn-primary btn-xs" data-toggle="tooltip" title="Properties"><i class="fas fa-wrench"></i></button>
            <button class="config-button button-remove btn btn-danger btn-xs" data-toggle="tooltip" title="Remove"><i class="fas fa-trash-alt"></i></button>
        </div>
        <div class="col-container nested-sortable">

        </div>
    </div>
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

<template id="template-textarea">
    <div class="form-group">
        <label class="component-label">Textarea Label</label>
        <textarea class="form-control component-input" placeholder="Textarea placeholder" rows="3"></textarea>
    </div>
</template>

<template id="template-button">
    <div class="form-group">
        <button class="btn btn-default component-button">Button</button>
    </div>
</template>

<template id="template-table">
    <div class="component-table">
        <table class="table table-bordered table-striped component-input">
            <tr>
                <th>Item1</th>
                <th>Item2</th>
                <th>Item3</th>
            </tr>
            <tr>
                <td>Table Value</td>
                <td>Table Value</td>
                <td>Table Value</td>
            </tr>
            <tr>
                <td>Table Value</td>
                <td>Table Value</td>
                <td>Table Value</td>
            </tr>
        </table>
    </div>
</template>

<template id="template-table-detail">
    <div class="component-table">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Item1</th>
                <td>Table Value</td>
            </tr>
            <tr>
                <th>Item2</th>
                <td>Table Value</td>
            </tr>
            <tr>
                <th>Item3</th>
                <td>Table Value</td>
            </tr>
        </table>
    </div>
</template>

<template id="template-thumbnail">
    <div class="component-thumbnail row" style="width: 500px">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title1</h4>
                    <p>[Content1] Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title2</h4>
                    <p>[Content2] Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title3</h4>
                    <p>[Content3] Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="template-number">
    <span class="component-number">1234567890</span>
</template>

<template id="template-email">
    <a class="component-email" href="mailto:someone@mail.com">someone@mail.com</a>
</template>
