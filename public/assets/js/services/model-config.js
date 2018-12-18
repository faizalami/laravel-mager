define([], function () {
    var modelConfig = function (modelName) {
        var url = '/' + modelName + '.model.json';
        var config = {
            "page":"PageName",
            "name":"ModelName",
            "table":"TableName",
            "timestamp":true,
            "columns":{
                "name":{
                    "type":"string",
                    "size":255
                },
                "phone":{
                    "type":"string",
                    "size":255
                }
            }
        };

        return {
            url: url,
            config: config,
        }
    };

    return modelConfig;
});