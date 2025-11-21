<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Explore Nepal')</title>
    <link rel="stylesheet" href="{{asset('/cssfile/usercss/style.css')}}">
</head>
<body>
    @include('user.header')
    <div class="container">
        @yield('content-section')
    </div>

    @include('user.footer')
</body>
</html>
