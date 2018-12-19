define(['axios'], function (axios) {
    var jsonIO = async function (url) {
        url = localStorage.getItem('baseUrl')+'json/'+url;
        const reqJson = async function () {
            return axios.get(url);
        };

        const getJson = await reqJson();

        var data = getJson.data;

        const updateJson = async function (updateData) {
            var response = await axios.post(url, updateData);

            data = response.data;
        };

        return {
            url: url,
            data: data,
            updateJson: updateJson
        };
    };

    return jsonIO;
});
