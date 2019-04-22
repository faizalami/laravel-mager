<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 22/04/19
 * Time: 20:39
 */
?>

{
    "swagger": "2.0",
    "info": {
        "title": "{{ config('app.name') }}",
        "version": ""
    },
    "host": "localhost:8000/",
    "basePath": "api/",
    "tags": [
    @php($i = 1)
    @foreach($pages as $page)
        {
            "name": "{{ $page['controller']['url'] }}",
            "description": "{{ $page['controller']['restDesc'] }}"
        }
        @if($i != count($pages)),@endif
        @php($i++)
    @endforeach
    ],
    "schemes": [
        "http"
    ],
    "paths": {
    @php($i = 1)
    @foreach($pages as $page)
        @php($j = 1)
        @foreach($page['controller']['pages'] as $requestName => $controllerPage)
        @switch($controllerPage->resource)
        @case('index')
        "/{{ $page['controller']['url'] }}/{{ $controllerPage->url }}": {
            "get": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}",
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Collection"
                        }
                    }
                }
            }
        }
        @break
        @case('show')
        "/{{ $page['controller']['url'] }}/{{ $controllerPage->url }}/{id}": {
            "get": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}",
                "parameters": [
                    {
                        "name": "id",
                        "in": "path",
                        "description": "Item ID",
                        "required": true,
                        "type": "integer",
                        "format": "int64"
                    }
                ],
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            }
        }
        @break
        @case('create')
        "/{{ $page['controller']['url'] }}/{{ $controllerPage->url }}": {
            "get": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}Get",
                "produces": [
                    "application/json"
                ],
                "responses": {
                        "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            },
            "post": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}Post",
                "parameters": [
                    {
                        "in": "body",
                        "name": "body",
                        "required": true,
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}"
                        }
                    }
                ],
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            }
        }
        @break
        @case('edit')
        "/{{ $page['controller']['url'] }}/{{ $controllerPage->url }}/{id}": {
            "get": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}Get",
                "parameters": [
                    {
                        "name": "id",
                        "in": "path",
                        "description": "Item ID",
                        "required": true,
                        "type": "integer",
                        "format": "int64"
                    }
                ],
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            },
            "put": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}Put",
                "parameters": [
                    {
                        "name": "id",
                        "in": "path",
                        "description": "Item ID",
                        "required": true,
                        "type": "integer",
                        "format": "int64"
                    },
                    {
                        "in": "body",
                        "name": "body",
                        "required": true,
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}"
                        }
                    }
                ],
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            }
        }
        @break
        @case('destroy')
        "/{{ $page['controller']['url'] }}/{{ $controllerPage->url }}/{id}": {
            "delete": {
                "tags": [
                    "{{ $page['controller']['url'] }}"
                ],
                "summary": "{{ $controllerPage->restDesc }}",
                "description": "{{ $controllerPage->restDesc }}",
                "operationId": "{{ $page['controller']['url'] }}{{ $controllerPage->url }}",
                "parameters": [
                    {
                        "name": "id",
                        "in": "path",
                        "description": "Item ID",
                        "required": true,
                        "type": "integer",
                        "format": "int64"
                    }
                ],
                "produces": [
                    "application/json"
                ],
                "responses": {
                    "200": {
                        "description": "successful operation",
                        "schema": {
                            "$ref": "#/definitions/{{ $page['controller']['model'] }}Resource"
                        }
                    }
                }
            }
        }
        @break
        @endswitch

        @if($j != count((array) $page['controller']['pages'])),@endif
        @php($j++)

        @endforeach

        @if($i != count($pages)),@endif
        @php($i++)
    @endforeach
    },
    "definitions": {
    @php($i = 1)
    @foreach($pages as $page)
        "{{ $page['controller']['model'] }}Resource": {
            "type": "object",
            "properties": {
                "status": {
                    "type": "boolean",
                    "description": "Response Status"
                },
                "message": {
                    "type": "string",
                    "description": "Response Message"
                },
                "length": {
                    "type": "integer",
                    "format": "int64",
                    "description": "Response Data Length"
                },
                "data": {
                    "type": "object",
                    "$ref": "#/definitions/{{ $page['controller']['model'] }}",
                    "description": "Response Data"
                }
            }
        },
        "{{ $page['controller']['model'] }}Collection": {
            "type": "object",
            "properties": {
                "status": {
                    "type": "boolean",
                    "description": "Response Status"
                },
                "message": {
                    "type": "string",
                    "description": "Response Message"
                },
                "length": {
                    "type": "integer",
                    "format": "int64",
                    "description": "Response Data Length"
                },
                "data": {
                    "type": "array",
                    "items": {
                        "$ref": "#/definitions/{{ $page['controller']['model'] }}"
                    },
                    "description": "Response Data"
                }
            }
        },
        "{{ $page['controller']['model'] }}": {
            "type": "object",
            "properties": {
                "id": {
                    "type": "integer",
                    "format": "int64",
                    "description": "ID"
                },
                @foreach($page['model'] as $column => $model)
                "{{ $column }}": {
                    "type": "{{ $model->type }}",
                    "description": "{{ $model->label }}"
                },
                @endforeach
                "created_at": {
                    "type": "string",
                    "format": "date-time",
                    "description": "Created At"
                },
                "updated_at": {
                    "type": "string",
                    "format": "date-time",
                    "description": "Created At"
                }
            }
        }
        @if($i != count($pages)),@endif
        @php($i++)
    @endforeach
    },
    "externalDocs": {
        "description": "Find out more about Swagger",
        "url": "http://swagger.io"
    }
}
