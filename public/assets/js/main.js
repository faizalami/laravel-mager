requirejs.config({
    baseUrl: '/faizalami/laravel-mager',
    shim: {
        bootstrap: {
            deps: ['jquery']
        },
        jqueyui: {
            deps: ['jquery']
        },
        jquerymy: {
            deps: ['jquery']
        },
        adminlte: {
            deps: ['jquery']
        },
        laravelmager: {
            deps: ['jquery']
        },
    },
    paths: {
        jquery: [
            '//code.jquery.com/jquery-3.3.1.min',
            'plugins/jquery-3.3.1/jquery-3.3.1.min'
        ],
        bootstrap: 'plugins/bootstrap-3.3.7-dist/js/bootstrap.min',
        adminlte: 'plugins/adminLTE-2.4.5/js/adminlte.min',
        axios: [
            '//unpkg.com/axios/dist/axios.min',
            'plugins/axios/dist/axios.min'
        ],
        lodash: 'plugins/lodash/lodash.min',
        slimscroll: 'plugins/jQuery-slimScroll-1.3.8/jquery.slimscroll.min',
        jqueryui: 'plugins/jquery-ui-1.12.1.custom/jquery-ui.min',
        jquerymy: 'plugins/jquerymy/jqueymy.min',
        sugarjs: 'plugins/sugar.min',
        sweetalert: 'plugins/sweetalert.min',
        laravelmager: 'assets/js/components/laravel-mager'
    }
});