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
    <h3>Guide's Lists</h3>
    <table>
        <thead>
            <tr>
                <td>Guide ID</td>
                <td>License No.</td>
                <td>Name</td>
                <td>Gender</td>
                <td>DOB</td>
                <td>Address</td>
                <td>Guiding Location</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{$detail->guide_id}}</td>
                <td>{{$detail->license_no}}</td>
                <td>{{$detail->first_name}}
                @if($detail->middle_name)
                    {{$detail->middle_name}}
                @endif
                {{$detail->last_name}}</td>
                <td>{{$detail->gender}}</td>
                <td>{{$detail->dob}}</td>
                <td>{{$detail->address}}</td>
                <td>{{$detail->guiding_location}}</td>
                <td>{{$detail->email}}</td>
                <td>{{$detail->phone_no}}</td>
                <td>
                    @if($detail->status==1)
                        Active
                    @else
                        Inactive
                    @endif
                </td>
                <td>
                    <a href="{{url('/guide/delete',$detail->guide_id)}}"><button>Delete</button></a>
                    <a href="{{url('/guide/edit',$detail->guide_id)}}"><button id='edit'>Edit</button></a>
                </td>

            </tr>
            @endforeach()
        </tbody>
    </table>
    </div>
</body>
</html>
@endsection()