<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/usercss/header.css')}}">
    <script src="{{asset('jsfile/userjs/home.js')}}"></script>
</head>
<body>
    <!--........................HEADER........................-->
    <div class="header">
        <div class="header-container">
            <div class="logo"></div>
            <div class="menubox">
            <a href="home">Home</a>
            <a href="gallery">Gallery</a>
            <a href="{{url('destination')}}">Destination</a>
            @if(Auth::check())
                <a href="{{url('/touristprofile')}}">{{Auth::user()->fullname}}</a>
                <div class="menuicon" onclick=displaymenuitems()>
                <div class="menuitems">
                    <a href="/touristedit">Edit Profile</a>
                    <form id="logout-form"action="{{ url('touristlogout') }}" method="POST">
                     @csrf
                    <button type="button" onclick="document.getElementById('logout-form').submit();">
                     Log out
                    </button>
                    </form>
                </div>

                </div>
            @else
                <a href="{{url('tourist/registration')}}">Login/Register</a>
            @endif
        </div>
    </div>
</div>