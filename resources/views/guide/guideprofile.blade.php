@extends($dynamic_layout)
@section('content-section')
<html>
    <head>
        <link rel="stylesheet" href="{{asset('cssfile/guidecss/profile.css')}}">
    </head>
    <body>
        <div class="background">
            <div class="profilecontainer">
                <div class="title">
                    <div></div>
                    <div class="profiletitle">
                        Guide Profile
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
                                        {{$guide->phone_no}}
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
                                        <td>Name: {{$guide->first_name}} {{$guide->middle_name}} {{$guide->last_name}}
                                        <td>License No.: {{$guide->license_no}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Gender: {{$guide->gender}}</td>
                                        <td>Guiding Location: {{$guide->guiding_location}}</td>
                                    </tr>
                                    <tr>
                                        <td>Age: {{ Carbon\Carbon::parse($guide->dob)->age}} Years Old</td>
                                        <td>Work Experience:  {{ Carbon\Carbon::parse($guide->work_experience)->age}} Year</td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>Known Languages: {{$guide->known_languages}}</td>
                                    </tr>
                                </table>
                            </td>
                    </tr>
                        <tr>
                                
                            <td rowspan="2" colspan="4" id="bio">
                                BIO:
                                <p>
                                    {{$guide->bio}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
