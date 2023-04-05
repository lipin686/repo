<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
    @include('admin.layouts.header')
    @include('admin.layouts.css')
</head>

<body>
    @include('admin.layouts.navbar')
    <div id="main">
        @yield('content')
    </div>
    @include('admin.layouts.js')
</body>

</html>