define(['axios'], function () {
    var baseGuiBuilder = function (url) {
        const reqJson = async function () {
            return axios.get(url);
        };

        (async function() {
            const getJson = await reqJson();

            baseGuiBuilder.data = getJson.data;
        })();

        return this;
    };

    return baseGuiBuilder;
});