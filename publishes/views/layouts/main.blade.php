<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:43
 */
?>

@extends('layouts.html-base')

@section('body')
<!-- Site wrapper -->
<div class="wrapper">

    @include('layouts.navbar')

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    @include('layouts.sidebar')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <ol class="breadcrumb">
                @if(isset($breadcrumb))
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">{{ $breadcrumb }}</li>
                @else
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                @endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')
</div>
<!-- ./wrapper -->
@endsection
