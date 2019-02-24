<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 19/01/19
 * Time: 14:53
 */
?>

@extends('layouts.main')

@section('title', 'Dashboard')
@section('page-id', 'Dashboard')

@section('content')
    <div class="row">
        <br><br>
        <div class="col-md-2 col-md-offset-5 col-xs-12">
            <img class="dashboard-logo" src="{{ asset(config('global.main.logo')) }}" alt="">
        </div>
        <div class="col-md-12 col-xs-12">
            <h3 class="text-center">Welcome to {{ config('app.name') }}</h3>
        </div>
    </div>
@endsection
