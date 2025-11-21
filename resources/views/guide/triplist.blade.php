@extends('guide.guidemain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if($status)
    <link rel="stylesheet" href="{{asset('cssfile/usercss/usertripstatus.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('cssfile/guidecss/triplist.css')}}">
    @endif
</head>
<body>
@if($status)
<div class="background">
            <div class="container">
                <div class="title">
                    Trip Request Accepted
                </div>
                <br>
                    <table>
                        <tr>
                            <td>Destination: {{$trip->place}}</td>
                            <td>Number of People: {{$trip->no_of_people}}</td>
                        </tr>
                        <tr>
                            <td>Travel Class: {{$trip->travel_class}}</td>
                            <td>Travel Date: {{$trip->travel_date}}</td>
                        </tr>
                        <tr>
                            <td>Price: Rs.{{$trip->price}}</td>
                            <td>Days Of Traveling: {{$trip->travelling_days}}</td>
                        </tr>
                        <tr>
                            
                                @if($trip->status=='1')
                                <td colspan="2">Status: Pending Guide Confirmation</td>
                                @else
                                <td>Commission Amount: {{$trip->commission_amt}}</td><td>Status: Guide Confirmed</td>
                                @endif
                            
                        </tr>
                        <tr>
                            @if($trip->status=='1')
                            <td></td>
                            <td><a href="{{ url('/trip/cancelled/'.$trip->trip_id) }}"><button>Cancel The Trip</button></a></td>
                            @else
                            <td><a href="/touristprofile/guide"><button id='profile'>View Profile</button></a></td>
                            @endif
                        </tr>
                    </table>
            </div>
</div>
@else
<div class="triplist">
    <h3>Trip Requests List</h3>
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
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
            @if($trip->guide_id==NULL)
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
                    @if(is_null($trip->guide_id))
                        <a href="{{ url('/trip/accepted/' . $trip->trip_id .'/'.Auth::guard('guide')->user()->guide_id) }}">
                        <button id="accept">Accept</button>
                        </a>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach()
        </tbody>
    </table>
    </div>
@endif
</body>
</html>
@endsection()