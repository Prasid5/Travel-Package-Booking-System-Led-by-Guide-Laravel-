@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/admincss/tablestyle.css')}}">
    <script src="{{asset('jsfile/adminjs/tripadd.js')}}"></script>
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
    <div class="header-section">
        <h3>Trip Details</h3>
        <a href="{{url('/tripadd')}}"><button>Add Travel Package</button></a>
    </div>
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
                <td>Actions</td>
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
            <form action="{{ url('/admin/tripdetailupdate',$tripdetail->id) }}" method="POST">
                    @csrf
                <td>{{$count}}</td>
                <td><input type="text" name="place" value="{{ $tripdetail->place }}" required></td>
                <td><textarea name="activities" row=2 required>{{ $tripdetail->activities }}</textarea></td>
                <td>
                    <select name="travel_class" required>
                    <option value="Premium Class" {{ $tripdetail->travel_class == 'Premium Class' ? 'selected' : '' }}>Premium Class</option>
                    <option value="Economy Class" {{ $tripdetail->travel_class == 'Economy Class' ? 'selected' : '' }}>Economy Class</option>
                    </select>
                </td>
                <td><input type="number" name="travelling_days" value="{{ $tripdetail->travelling_days }}"></td>
                <td><input type="text" name="base_price" value="{{ $tripdetail->base_price }}"></td>
                <td><input type="text" name="commission_rate" value="{{ $tripdetail->commission_rate }}"></td>
                <td>
                    <!-- <a href=""><button id='edit'>Edit</button></a> -->
                    <input type="submit" value="Submit">
                </form>
                    <a href="{{ url('/admin/deletetripdetail',$tripdetail->id) }}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <div class="header-section">
        <h3>Discount Details</h3>
        <a href="discountadd"><button>Add Discount</button></a>
    </div>
    <table>
        <thead>
            <tr>
                <td>S.N</td>
                <td>Minimum People</td>
                <td>Maximum People</td>
                <td>Discount Rate</td>
                <td>Actions</td>
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
            <form action="{{url('admin/discountupdate',$discount->id)}}" method="POST">
            @csrf
                <td>{{$count}}</td>
                <td><input type="number" name="min_people" min=1 max=25 value="{{ $discount->min_people }}"></td>
                <td><input type="number" name="max_people" min=1 max=25 value="{{ $discount->max_people }}"></td>
                <td><input type="text" name="discount_rate" min=0 max=1 value="{{ $discount->discount_rate }}"></td>
                <td>
                    <!-- <a href=""><button id='edit'>Edit</button></a> -->
                    <input type="submit" value="Submit">
                </form>
                    <a href="{{url('admin/deletediscount',$discount->id)}}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
