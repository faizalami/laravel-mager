requirejs.config({
    baseUrl: '/faizalami/laravel-mager',
    shim: {
        bootstrap: {
            deps: ['jquery']
        },
        jqueyui: {
            deps: ['jquery']
        },
        waitme: {
            deps: ['jquery']
        },
        jquerymy: {
            deps: ['sugarjs', 'jquery']
        },
        adminlte: {
            deps: ['jquery']
        },
        'datatables.bootstrap': {
            deps: ['jquery', 'bootstrap', 'datatables']
        },
        laravelmager: {
            deps: ['jquery']
        },
    },
    map: {
        '*': {
            'datatables.net': 'datatables',
        }
    },
    paths: {
        jquery: 'plugins/jquery-3.3.1/jquery-3.3.1.min',
        bootstrap: 'plugins/bootstrap-3.3.7-dist/js/bootstrap.min',
        adminlte: 'plugins/adminLTE-2.4.5/js/adminlte.min',
        axios: 'plugins/axios/dist/axios.min',
        lodash: 'plugins/lodash/lodash.min',
        slimscroll: 'plugins/jQuery-slimScroll-1.3.8/jquery.slimscroll.min',
        jqueryui: 'plugins/jquery-ui-1.12.1.custom/jquery-ui.min',
        jquerymy: 'plugins/jquerymy/jquerymy.min',
        sugarjs: 'plugins/sugarjs/sugar.min',
        sweetalert: 'plugins/sweetalert/sweetalert.min',
        waitme: 'plugins/waitMe/waitMe.min',
        promise: 'plugins/requirejs-promise/requirejs-promise',
        moment: 'plugins/moment/moment.min',
        dropzone: 'plugins/dropzone/dropzone-amd-module',
        datatables: 'plugins/DataTables-1.10.18/js/jquery.dataTables.min',
        'datatables.bootstrap': 'plugins/DataTables-1.10.18/js/dataTables.bootstrap.min',
        laravelmager: 'assets/js/components/laravel-mager'
    }
});

requirejs(['jquery', 'axios', 'sweetalert', 'waitme'], function ($, axios, swal) {
    $(document).ready(function () {
        $('#generate-button').click(function () {
            $('body').waitMe({
                effect: 'roundBounce',
                text: 'Loading...',
                bg: 'rgba(255,255,255,0.90)',
                color: '#555'
            });

            axios.get('/laravel-mager/generate').then(function (response) {
                $('body').waitMe('hide');
                if(response.data === 'success') {
                    swal('SUCCESS', 'Files Generated Successfully', 'success');
                } else {
                    console.log(response.data);
                    swal('ERROR', 'Generate Failed', 'error');
                }
            }).catch(function () {
                $('body').waitMe('hide');
                swal('ERROR', 'Generate Failed', 'error');
            })
        });
    });
});
