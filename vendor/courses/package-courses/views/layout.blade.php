<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Document</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="  {!! asset('packages/courses/package-courses/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="  {!! asset('packages/courses/package-courses/fonts/fontawesome-all.min.css') !!}">
    <link rel="stylesheet" href="  {!! asset('packages/courses/package-courses/fonts/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="  {!! asset('packages/cansa/package-courses/fonts/fontawesome5-overrides.min.css') !!}">
</head>
    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    {!! Html::script('packages/courses/package-courses/js/jquery-3.6.0.min.js') !!}
    {!! Html::script('packages/courses/package-courses/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('packages/courses/package-courses/js/bs-init.js') !!}
    {!! Html::script('packages/courses/package-courses/js/theme.js') !!}
    <script id="bs-live-reload" data-sseport="50639" data-lastchange="1625067528989" src="{!! asset('packages/courses/package-courses//js/livereload.js') !!}"></script>
</html>