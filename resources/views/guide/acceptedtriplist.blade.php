@extends('guide.guidemain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/guidecss/triplist.css')}}">
</head>
<body>
<div class="triplist">
    <h3>Accepted Trip List</h3>
    <table>
        <thead>
            <tr>
                <td>Trip No.</td>
                <td>Place</td>
                <td>Travel Class</td>
                <td>Number of People</td>
                <td>Travel Date</td>
                <td>Request Status</td>
                <td>Request</td>
                <td>Profile</td>
            </tr>
        </thead>
        <tbody>
        @foreach($trips as $trip)
    <tr>
        <td>{{$trip->trip_id}}</td>
        <td>{{$trip->place}}</td>
        <td>{{$trip->travel_class}}</td>
        <td>{{$trip->no_of_people}}</td>
        <td>{{$trip->travel_date}}</td>
        <td>
            @if(is_null($trip->guide_id))
                Pending...
            @else
                Accepted
            @endif
        </td>
        <td>
            <a href="{{ url('/trip/cancelled/' . $trip->trip_id) }}">
                <button>Cancel</button>
            </a>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
@endsection()