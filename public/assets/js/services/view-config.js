define([], function () {
    var viewConfig = function (viewName) {
        var url = '/' + viewName + '.view.json';
        var config = {
            "page":"PageName",
            "id":"page-id",
            "name":"ViewName",
            "title":"PageTitle",
            "routes":[
                "index"
            ],
            "components":{
                // "textbox1":{
                //     "id":"textbox1",
                //     "label":"Name",
                //     "name":"name",
                //     "value":"",
                //     "minlength":"0",
                //     "maxlength":"255",
                //     "parent":"container"
                // },
                // "row1":{
                //     "id":"row1",
                //     "parent":"container"
                // },
                // "col1":{
                //     "id":"col1",
                //     "xs":"12",
                //     "sm":"6",
                //     "md":"6",
                //     "lg":"6",
                //     "parent":"row1"
                // },
                // "textbox2":{
                //     "id":"textbox2",
                //     "label":"Phone",
                //     "name":"phone",
                //     "value":"",
                //     "minlength":"0",
                //     "maxlength":"255",
                //     "parent":"col1"
                // }
            }
        };

        return {
            url: url,
            config: config,
        }
    };

    return viewConfig;
});