@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/admincss/tablestyle.css')}}">
</head>
<body>
<div class="lists">
    <h3>Tourists Lists</h3>
    <table>
        <thead>
            <tr>
                <td>Tourist ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Country</td>
                <td>Phone</td>
                <td>DOB</td>
                <td>Status</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{$detail->tourist_id}}</td>
                <td>{{$detail->fullname}}</td>
                <td>{{$detail->email}}</td>
                <td>{{$detail->gender}}</td>
                <td>{{$detail->country}}</td>
                <td>{{$detail->phone_no}}</td>
                <td>{{$detail->dob}}</td>
                <td>
                    @if($detail->status=='1')
                    Active
                    @else
                    Inactive
                    @endif
                </td>
                <td>
                    <a href="{{url('/deletetourist',$detail->tourist_id)}}"><button>Delete</button></a>
                    <a href="{{url('/touristedit',$detail->tourist_id)}}"><button id='edit'>Edit</button></a>
                </td>
            </tr>
            @endforeach()
        </tbody>
</body>
</html>
@endsection()