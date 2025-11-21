<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/admincss/header.css')}}">
    <script src="{{asset('jsfile/userjs/home.js')}}"></script>
</head>
<body>
    <!--........................HEADER........................-->
    <div class="header">
        <div class="container">
            <div class="logo"></div>
            <div class="menubox">
            <a href="{{url('adminhome')}}">Home</a>
            <a href="{{url('admingallery')}}">Gallery</a>
            <a href="{{url('/tripdetail')}}">Travel Packages</a>
            <a href="{{url('/triplist/admin')}}">Trip Requests List</a>
            <a href="{{url('/tourist/detail')}}">Tourist's List</a>
            <a href="{{url('/guide/list')}}">Guide's List</a>
            <a href="{{url('/guide/register')}}">Guide Registration</a>
            <div class="menuicon" onclick=displaymenuitems()>
                <div class="menuitems">
                    <a href="{{url('/editadmin',Auth::guard('admin')->user()->id)}}">Edit Profile</a>
                    @if(Auth::guard('admin')->user()->role=='Super Admin')
                        <a href="{{url('/adminregister')}}">Register</a>
                    @endif
                    <form id="logout-form"action="{{ url('adminlogout') }}" method="POST">
                     @csrf
                    <button onclick="document.getElementById('logout-form').submit();">
                     Log out
                    </button>
                    </form>
                </div>

            </div>
        </div>
    </div>  
</div>
               
