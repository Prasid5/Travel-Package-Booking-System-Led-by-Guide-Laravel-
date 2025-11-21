@extends('guide.guidemain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/admincss/tablestyle.css')}}">
    <title>Document</title>
    <style>
        input[type="text"], input[type="number"],textarea,select {
            width: 100%;
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
    <h3>Trip Details</h3>
    <table>
        <thead>
            <tr>
                <td>S.N</td>
                <td>Place</td>
                <td>Activities</td>
                <td>Travel Class</td>
                <td>Travelling Days</td>
                <td>Price</td>
                <td>Guide's commission Rate</td>
            </tr>
        </thead>
        <tbody>
        @php
            $count=0
        @endphp
        @foreach($tripdetails as $tripdetail)
        @php
            $count=$count+1;
        @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{ $tripdetail->place }}</td>
                <td>{{ $tripdetail->activities }}</td>
                <td>{{ $tripdetail->travel_class}}</td>
                <td>{{ $tripdetail->travelling_days }}</td>
                <td>{{ $tripdetail->base_price }}</td>
                <td>{{ $tripdetail->commission_rate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <h3>Discount Details</h3>
    <table>
        <thead>
            <tr>
                <td>S.N</td>
                <td>Minimum People</td>
                <td>Maximum People</td>
                <td>Discount Rate</td>
            </tr>
        </thead>
        <tbody>
        @php
            $count=0
        @endphp
        @foreach($discounts as $discount)
        @php
            $count=$count+1
        @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{ $discount->min_people }}</td>
                <td>{{ $discount->max_people }}</td>
                <td>{{ $discount->discount_rate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
