<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:25
 */
?>

{{ '@' }}extends('layouts.main', ['breadcrumb' => 'Database Manager'])

{{ '@' }}section('title', '{{ $title }}')
{{ '@' }}section('page-id', '{{ $title }}')

{{ '@' }}section('content')
<form method="post">
    {{ '@' }}csrf
    {{ $content }}
</form>
{{ '@' }}endsection
