@extends('user.main')
@section('title', 'Choose Your Destination')

@section('content-section')
<html>
    <head>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('alert'))
                    alert("{{ session('alert') }}");
                @endif
            });
        </script>
        @if(isset($trip) && ($trip->status == '1' || $trip->status == '2'))
            <link rel="stylesheet" href="{{ asset('cssfile/usercss/usertripstatus.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('cssfile/usercss/destination.css') }}">
            <script src="{{ asset('jsfile/userjs/destination.js') }}"></script>
        @endif  
    </head>
    <body>
        <div class="background">
            @if(isset($trip) && ($trip->status == '1' || $trip->status == '2'))
                <div class="container">
                    <div class="title">
                        @if($trip->status == '1')
                            Trip Request Pending
                        @else
                            Trip Confirmed
                        @endif
                    </div>
                    <br>
                    <table>
                        <tr>
                            <td>Destination: {{ $trip->place }}</td>
                            <td>Number of People: {{ $trip->no_of_people }}</td>
                        </tr>
                        <tr>
                            <td>Travel Class: {{ $trip->travel_class }}</td>
                            <td>Travel Date: {{ $trip->travel_date }}</td>
                        </tr>
                        <tr>
                            <td>Price: Rs.{{ $trip->price }}</td>
                            <td>Travelling Days: {{ $trip->travelling_days }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if($trip->status == '1')
                                    Status: Pending Guide Confirmation
                                @else
                                    Status: Guide Confirmed
                                @endif
                            </td>
                        </tr>
                        <tr>
                            @if($trip->status == '1')
                                <td></td>
                                <td><a href="{{ url('tripcancel') }}"><button>Cancel The Trip</button></a></td>
                            @else
                                <td><a href="/guideprofile/tourist"><button id='profile'>View Profile</button></a></td>
                                <td><a href="{{ url('tripcancel') }}"><button>Cancel The Trip</button></a></td>
                            @endif
                        </tr>
                    </table>
                </div>
            @else
                <div class="webpage-title">Explore<br>Your Dream<br>Destination</div>
                <p>Are you ready for an unforgettable adventure? Our carefully selected destinations offer you the perfect blend of relaxation, adventure, and cultural discovery. 
                    Whether you're seeking a serene getaway or an exciting exploration, we have something for everyone. 
                    Step into a world of stunning destinations, exciting activities, and unforgettable experiences. 
                    Start planning your dream vacation today!
                </p>
                
                <span id="title1">Detailed Trip Information</span>
                <p>Each destination offers a unique experience, with scenic landscapes, historical sites, and rich local culture to explore. 
                    Enjoy a variety of activities, from guided tours to thrilling outdoor adventures, all included in the package. Our transparent pricing caters to different budgets, ensuring you get great value, with clear cost breakdowns for easy planning. 
                    Plus, select trips that fit your schedule, whether it's a weekend getaway or an extended holiday.
                </p>
                
                <div class="tripdetail">
                    <table>
                        <thead>
                            <tr>
                                <td>Places</td>
                                <td colspan="2">Activities</td>
                                <td>Travel Class</td>
                                <td>Travelling Days</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tripdetails as $tripdetail)
                            <tr>
                                <td>{{ $tripdetail->place }}</td>
                                <td colspan="2">{{ $tripdetail->activities }}</td>
                                <td>{{ $tripdetail->travel_class }}</td>
                                <td>{{ $tripdetail->travelling_days }}</td>
                                <td>{{ $tripdetail->base_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p><span style="font-weight: bold">Note:</span> The prices listed above are per individual.</p>
                
                <span id="title2">Ready to Explore?</span>
                <p>
                    Booking your next destination has never been easier! Simply fill out the form to register your trip, and get access to detailed trip information like places to visit, activities, pricing, and travel days. 
                    No matter where you're going, we've got you covered. <br><br>
                    <span style="font-weight:bold">NOTE:</span>Once a travel package is booked, the booking can be only canceled up to 48 hours before the travel date.
                </p>
                
                    @if(Auth::check())
                    <div class="form-container">
                        <form action="{{ url('destination') }}" method="POST" autocomplete="off">  
                            @csrf
                            <div class="form-header">Choose Your Destination:</div>
                            <table id="form-table">
                                <tr>
                                    <td><label>Places you want to visit:</label></td>
                                    <td>
                                        <select name="place" required>
                                            @foreach($places as $v)
                                                <option value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>No. of People:</label></td>
                                    <td><input type="number" name="num_people" min={{$min_people}} max={{$max_people}} required></td>
                                </tr>
                                <tr>
                                    <td><label>Travel Class:</label></td>
                                    <td>
                                        <select name="travel_class" required>
                                            @foreach($travelclass as $v)
                                                <option value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>When do you want to go?</label></td>
                                    <td><input type="date" name="travel_date" id='travel-date' required></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btn"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    @else
                    <div class="form-container2">
                        <div class="register">
                            <span id="title4">To Choose Your Destination</span>
                            <br>
                            <span id="title5"><a href="{{url('tourist/registration')}}">Register Here</a></span>
                        </div>
                    </div>
                    @endif
                <span id="title3">Why Choose Us?</span>
                <p style="margin-bottom: 20px;">We believe that every great journey begins with knowing exactly what to expect. 
                    Here’s what you’ll find when you book with us:</p>
                
                <div class='list'>
                    <ul type="square">
                        <li><span style="font-weight: bold">Handpicked Destinations:</span> We’ve selected only the best locations to provide you with the most memorable experiences.</li>
                        <li><span style="font-weight: bold">Affordable Packages:</span> We cater to all budgets, ensuring that everyone can embark on their dream vacation.</li>
                        <li><span style="font-weight: bold">Easy Booking:</span> The process is simple, secure, and quick. Just fill out the form, and we’ll take care of the rest.</li>
                        <li><span style="font-weight: bold">Seamless Travel Experience:</span> From booking to your return, we’re here to make sure everything goes smoothly.</li>
                    </ul>
                </div>
            @endif
        </div>
    </body>
</html>
@endsection
