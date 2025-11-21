@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/admincss/tablestyle.css')}}">
    <script src="{{ asset('jsfile/userjs/destination.js') }}"></script>
    <title>Document</title>
    <style>
        input[type="text"], input[type="number"],input[type="date"] {
            width:80%;
            border: none;
            outline: none;

            font-size: inherit;
            font-family: inherit;
            text-align: center;
            color: inherit;

            background-color: transparent;
        }
        select {
            width:100%;
            border: none;
            outline: none;

            font-size: inherit;
            font-family: inherit;
            text-align: center;
            color: inherit;

            background-color: transparent;
        }
        input[type="text"]:focus, input[type="number"]:focus,textarea:focus, select:focus {
            background-color: #e0e0e0;
            border:1px solid black;
        }
        
        input[type="submit"]{
            appearance:none;
            height:30px;
            width:50px;

            border:3px solid blue;
            border-radius:10px;
            color:blue;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            padding:3px;
        }
    </style>
</head>
<body>
    <div class="lists">
    <h3>Tourist's Trip Requests List</h3>
    <table>
        <thead>
            <tr>   
                <td>Trip ID</td>
                <td>Tourist ID</td>
                <td>Guide ID</td>
                <td>Place</td>
                <td>Travel Class</td>
                <td>Number of People</td>
                <td>Travel Date</td>
                <td>Travelling Days</td>
                <td>Price</td>
                <td>Request Status</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{$detail->trip_id}}</td>
                <td>{{$detail->tourist_id}}</td>
                <form action="{{url('triprequestupdate',$detail->trip_id)}}" method="POST">
                @csrf
                <td><input type="number" name="guide_id" value="{{$detail->guide_id}}"></td>
                <td>
                    <select name="place" required>
                        @foreach($places as $v)
                            <option value="{{ $v }}" {{$v == $detail->place ? 'selected' : '' }}>
                                {{ $v }} 
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="travel_class" required>
                        @foreach( $travelclass as $v)
                        <option value="{{ $v }}" {{ $v == $detail->travel_class ? 'selected' : '' }}>
                            {{ $v }}
                        </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="num_people" value="{{$detail->no_of_people}}"  min={{$min_people}} max={{$max_people}} required></td>
                <td><input type="date" name="travel_date" value="{{$detail->travel_date}}" id='travel-date' required></td>
                <td>{{$detail->travelling_days}}</td>
                <td>{{$detail->price}}</td>
                <td>
                    @if(is_null($detail->guide_id))
                        Pending
                    @else
                        Guide Confirmed
                    @endif
                </td>
                <td>
                    <input type="submit" value="Submit">
                    </form>
                    <a href="{{url('/tripdelete',$detail->trip_id)}}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
    </div>
</body>
</html>
@endsection()