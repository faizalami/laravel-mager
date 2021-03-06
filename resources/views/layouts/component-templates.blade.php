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
    <table class="table table-bordered table-striped dataTable component-table">
        <thead>
            <tr>
                <th>Item1</th>
                <th>Item2</th>
                <th>Item3</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>
                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Item Detail" href="#"><i class="far fa-eye"></i></a>
                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Item" href="#"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Item" href="#"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                <td>
                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Item Detail" href="#"><i class="far fa-eye"></i></a>
                    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Item" href="#"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Item" href="#"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<template id="template-table-detail">
    <table class="table table-bordered table-striped component-table">
        <tbody>
            <tr>
                <th>Item1</th>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
            </tr>
            <tr>
                <th>Item2</th>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
            </tr>
            <tr>
                <th>Item3</th>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
            </tr>
        </tbody>
    </table>
</template>

<template id="template-thumbnail">
    <div class="component-thumbnail row" style="width: 500px">
        <div class="thumbnail-col col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title</h4>
                    <p><span>[Content]</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="btn btn-primary btn-block" type="button">Detail</button>
                </div>
            </div>
        </div>
        <div class="thumbnail-col col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title</h4>
                    <p><span>[Content]</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="btn btn-primary btn-block" type="button">Detail</button>
                </div>
            </div>
        </div>
        <div class="thumbnail-col col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4>Title</h4>
                    <p><span>[Content]</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="btn btn-primary btn-block" type="button">Detail</button>
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

<template id="template-select">
    <div class="form-group">
        <label class="component-label">Select Label</label>
        <select class="form-control component-input">
            <option class="option-placeholder" disabled selected>Select Placeholder</option>
        </select>
    </div>
</template>
