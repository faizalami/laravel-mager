define([], function () {
    var controllerConfig = function (controllerName) {
        var url = '/' + controllerName + '.controller.json';
        var config = {
            "page":"PageName",
            "name":"NameController",
            "namespace":"App\\Http\\Controllers",
            "url":"name",
            "defaultPage":"index",
            "web":true,
            "rest":true,
            "pages":{
                "index":{
                    "web":true,
                    "rest":true,
                    "methods":[
                        "get"
                    ],
                    "url":"index"
                },
                "view":{
                    "web":true,
                    "rest":true,
                    "methods":[
                        "get"
                    ],
                    "url":"view"
                },
                "create":{
                    "web":true,
                    "rest":true,
                    "methods":[
                        "get",
                        "post"
                    ],
                    "url":"create"
                },
                "update":{
                    "web":true,
                    "rest":true,
                    "methods":[
                        "get",
                        "post"
                    ],
                    "url":"update"
                },
                "delete":{
                    "web":true,
                    "rest":true,
                    "methods":[
                        "post",
                        "delete"
                    ],
                    "url":"delete"
                }
            }
        };

        return {
            url: url,
            config: config,
        }
    };

    return controllerConfig;
});