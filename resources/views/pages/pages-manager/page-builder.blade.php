<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 04/01/19
 * Time: 10:56
 */
?>

@extends('mager::layouts.main', ['breadcrumb' => 'Page Builder'])

@section('title', 'Page Builder')
@section('page-id', 'page-builder')

@section('content')
    @include('mager::pages.coming-soon')
@endsection