<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Explore Nepal')</title>
    <link rel="stylesheet" href="{{asset('/cssfile/style.css')}}">
</head>
<body>
    @include('admin.header')
    <div class="container">
        @yield('content-section')
    </div>
</body>
</html>
