<!DOCTYPE html>
<html>
<head>
        <title>@yield('title')</title>
        @include('meta')
</head>
<body>
@include('header')
<div class="container">
    @yield('content')
</div>
@include('footer')
</body>
</html>