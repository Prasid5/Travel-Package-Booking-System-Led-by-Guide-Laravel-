@extends('user.main')
@section('content-section')
<html>
    <head>
        <link rel="stylesheet" href="{{asset('cssfile/usercss/usertripstatus.css')}}"> 
    </head>
    <body>
        <div class="background">
            <div class="container">
                <div class="title">Trip Request Pending</div>
                <br>
                    <table>
                        <tr>
                            <td>Destination:{{$trip->place}}</td>
                            <td>Number of People:{{$trip->no_of_people}}</td>
                        </tr>
                        <tr>
                            <td>Travel Class:{{$trip->travel_class}}</td>
                            <td>Travel Date:{{$trip->travel_date}}</td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td>Days Of Traveling:</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if($trip->status=='1')
                                Status: Pending Guide Confirmation
                                @else
                                Status: Guide Confirmed
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button>Cancel The Trip</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>
</html>
@endsection