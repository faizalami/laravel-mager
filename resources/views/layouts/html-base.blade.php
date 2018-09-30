<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 30/09/18
 * Time: 17:02
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>@yield('title') | Laravel Mager</title>

    <!-- STYLES -->
    @foreach(config('mager.css_assets') as $css_file)
        <link rel="stylesheet" href="{{ asset(config('mager.public_path').$css_file) }}">
    @endforeach
    @yield('additional-styles')
    <!-- /STYLES -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Custom Style -->
    <style>

    </style>
    <!-- /Custom Style -->
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->

<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-red fixed {{ isset($layout)?$layout:'' }} sidebar-mini @yield('page-id')">

@yield('body')

<!-- SCRIPTS -->
@foreach(config('mager.js_assets') as $js_file)
    <script src="{{ asset(config('mager.public_path').$js_file) }}"></script>
@endforeach
@yield('additional-scripts')
<!-- /SCRIPTS -->
<!--Custom scripts-->
<script>

</script>
<!--/Custom scripts-->
</body>
</html>
