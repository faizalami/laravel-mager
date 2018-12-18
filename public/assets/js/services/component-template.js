define([], function () {
    var componentTemplate = (function () {
        var url = '/component-template.json';
        var config = {
            "page":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "title":{
                        "label":"Text",
                        "type":"textbox",
                        "value":"Page Name"
                    }
                }
            },
            "label":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "text":{
                        "label":"Text",
                        "type":"textarea",
                        "value":"Label Text"
                    }
                }
            },
            "textbox":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "label":{
                        "label":"Label",
                        "type":"textbox",
                        "value":"Textbox Label"
                    },
                    "name":{
                        "label":"Name",
                        "type":"textbox"
                    },
                    "value":{
                        "label":"Value",
                        "type":"textbox"
                    },
                    "minLength":{
                        "label":"Min Length",
                        "type":"numberbox",
                        "value":0
                    },
                    "maxLength":{
                        "label":"Max Length",
                        "type":"numberbox",
                        "value":255
                    }
                },
                "db": {
                    "type": "string",
                    "length": 255
                }
            },
            "numberbox":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "label":{
                        "label":"Label",
                        "type":"textbox",
                        "value":"Numberbox Label"
                    },
                    "name":{
                        "label":"Name",
                        "type":"textbox"
                    },
                    "value":{
                        "label":"Value",
                        "type":"textbox"
                    },
                    "minLength":{
                        "label":"Min Length",
                        "type":"numberbox",
                        "value":0
                    },
                    "maxLength":{
                        "label":"Max Length",
                        "type":"numberbox",
                        "value":255
                    }
                },
                "db": {
                    "type": "integer",
                    "length": 255
                }
            },
            "emailbox":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "label":{
                        "label":"Label",
                        "type":"textbox",
                        "value":"Emailbox Label"
                    },
                    "name":{
                        "label":"Name",
                        "type":"textbox"
                    },
                    "value":{
                        "label":"Value",
                        "type":"textbox"
                    },
                    "minLength":{
                        "label":"Min Length",
                        "type":"numberbox",
                        "value":0
                    },
                    "maxLength":{
                        "label":"Max Length",
                        "type":"numberbox",
                        "value":255
                    }
                },
                "db": {
                    "type": "string",
                    "length": 255
                }
            },
            "passwordbox":{
                "property": {
                    "id":{
                        "label":"ID",
                        "type":"textbox"
                    },
                    "label":{
                        "label":"Label",
                        "type":"textbox",
                        "value":"Passwordbox Label"
                    },
                    "name":{
                        "label":"Name",
                        "type":"textbox"
                    },
                    "value":{
                        "label":"Value",
                        "type":"textbox"
                    },
                    "minLength":{
                        "label":"Min Length",
                        "type":"numberbox",
                        "value":0
                    },
                    "maxLength":{
                        "label":"Max Length",
                        "type":"numberbox",
                        "value":255
                    }
                },
                "db": {
                    "type": "string",
                    "length": 255
                }
            },
            "button":{
                "property": {
                    "id": {
                        "label":"ID",
                        "type":"textbox"
                    },
                    "text": {
                        "label":"Text",
                        "type":"textbox",
                        "value":"Button"
                    }
                }
            },
            "row": {
                "property": {
                    "id": {
                        "label":"ID",
                        "type":"textbox"
                    }
                }
            },
            "col":{
                "property": {
                    "xs":{
                        "label":"Choose col-xs",
                        "type":"xs",
                        "value":6
                    },
                    "sm":{
                        "label":"Choose col-sm",
                        "type":"sm",
                        "value":6
                    },
                    "md":{
                        "label":"Choose col-md",
                        "type":"md",
                        "value":4
                    },
                    "lg":{
                        "label":"Choose col-lg",
                        "type":"lg",
                        "value":4
                    },
                }
            }
        };

        return {
            url: url,
            config: config,
        }
    })();

    return componentTemplate;
});