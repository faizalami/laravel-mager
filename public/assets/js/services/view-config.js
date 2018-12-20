define(['assets/js/services/json-io'], function (ServiceJsonIO) {
    var viewConfig = async function () {
        const controller = localStorage.getItem('controller');
        const view = localStorage.getItem('view');

        var url = 'view/' + controller + '/' + view;

        const jsonIO = await ServiceJsonIO(url);

        return {
            url: url,
            config: jsonIO.data,
            update: jsonIO.updateJson
        }
    };

    return viewConfig();
});