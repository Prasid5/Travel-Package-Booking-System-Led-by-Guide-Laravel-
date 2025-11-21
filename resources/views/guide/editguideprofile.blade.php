@extends($dynamic_layout)
@section('content-section')
<html>
    <head>
        <link rel="stylesheet" href="{{asset('cssfile/guidecss/editprofile.css')}}">
    </head>
    <body>
        <div class="background">
            <div class="profilecontainer">
                <div class="title">
                    <div></div>
                    <div class="profiletitle">
                        Edit Your Profile
                    </div>
                    <div class="backarrow">
                    @if($dynamic_layout=="guide.guidemain")
                        <a href="/guidehome"><img src="/profileimg/profilearrow.png" alt=""></a>
                    @elseif($dynamic_layout=="user.main")
                        <a href="/destination"><img src="/profileimg/profilearrow.png" alt=""></a>
                    @endif
                    </div>
                </div>
                <div class="profile">
                <form action="{{$url}}" method=POST enctype="multipart/form-data">
                    @csrf
                <table class="maintable" cellpadding="10">
                    <tr>
                            <td rowspan="3" id="pic-con">
                                <div class="profile pic"><img src="{{asset('storage/' . $guide->photo)}}" alt="Guide Image" id="profilepic"></div>
                                <table class="contact-table">
                                    <tr><td>
                                        <img src="/profileimg/home.png">
                                        <br>
                                        {{$guide->address}}
                                    </td></tr>
                                    <tr><td>
                                        <img src="/profileimg/phone.png">
                                        <br>
                                        <input type="text" name="phone" value="{{$guide->phone_no}}">
                                        
                                    </td></tr>
                                    <tr><td style="padding-bottom:0px">
                                        <img src="/profileimg/mail.png">
                                        <br>
                                        {{$guide->email}}
                                        
                                    </td></tr>
                                </table>
                            </td>
                            <td id="guidedetails">
                                <table>
                                    <tr>
                                        <td>First Name: </td><td><input type="text" name="fname" value="{{$guide->first_name}}"></td>
                                        <td>License No.: </td><td>{{$guide->license_no}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Middle Name: </td><td><input type="text" name="mname" value="{{$guide->middle_name}}"></td> <td>Age:</td><td>{{ Carbon\Carbon::parse($guide->dob)->age}} Years Old</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Last Name: </td><td><input type="text" name="lname" value="{{$guide->last_name}}"></td>
                                        <td>Password: </td><td><input type="password" name="passwd"></td>
                                    </tr>
                                    <tr>
                                        <td>Languages: </td> <td colspan=3><input type="text" name="lang" value="{{$guide->known_languages}}"></td>
                                    </tr>
                                </table>
                            </td>
                    </tr>
                        <tr>
                                
                            <td rowspan="2" colspan="4" id="bio">
                                BIO:
                                <p>
                                    <textarea name="bio" rows="4">{{$guide->bio}}</textarea>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <input type="submit">
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
