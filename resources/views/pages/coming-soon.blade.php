<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 20:18
 */
?>

<div class="row">
    <div class="col-md-2 col-md-offset-5 col-xs-12 coming-soon-header">
        <img class="coming-soon-logo" src="{{ asset(config('mager.public_path').'assets/img/laravel-mager-logo.png') }}" alt="">
    </div>
    <div class="col-md-12 col-xs-12">
        <h3 class="text-center coming-soon-greeting">This page is coming soon</h3>
    </div>
</div>

<script data-main="/faizalami/laravel-mager/assets/js/main" src="{{ asset(config('mager.public_path').'plugins/requirejs/require.min.js') }}"></script>
<script>
    require(['main'], function () {
        require(['adminlte']);
        require(['laravelmager']);
    });
</script>
