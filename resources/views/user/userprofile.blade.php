@extends($dynamic_layout)
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/usercss/usertripstatus.css')}}">
    <style>
        .title{
            display: flex;
            flex-direction:row;
            align-items: center;
            justify-content:space-between;
        }
        .title div{
            height:100%;
            width:33.3%;
        }
        .title>.backarrow{
            display:flex;
            align-items:center;
            justify-content:flex-end;
        }
        .title>.backarrow img{
            height:30px;
            width:30px; 
            background-position:center;
            background-repeat:no-repeat;    
        }
    </style>
</head>
<body>
<div class="background">
            <div class="container">
                <div class="title">
                    <div></div>
                    <div>Tourist Profile</div>
                    <div class="backarrow">
                    @if($dynamic_layout=="guide.guidemain")
                        <a href="/triplist?role=guide"><img src="/profileimg/profilearrow.png" alt=""></a>
                    @elseif($dynamic_layout=="user.main")
                        <a href="/home"><img src="/profileimg/profilearrow.png" alt=""></a>
                    @endif
                    </div>
                </div>
                <br>
                    <table>
                        <tr>
                            <td>Tourist Name: {{$tourist->fullname}}</td>
                            <td>Email: {{$tourist->email}}</td>
                        </tr>
                        <tr>
                            <td>Gender: {{$tourist->gender}}</td>
                            <td>Country: {{$tourist->country}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number: {{$tourist->phone_no}}</td>
                            <td>Age: {{\Carbon\Carbon::parse($tourist->dob)->age}}</td>
                        </tr>
                    </table>
            </div>
</div>
</body>
</html>
@endsection