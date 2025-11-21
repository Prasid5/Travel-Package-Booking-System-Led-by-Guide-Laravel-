@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/admincss/guidereg.css')}}">
    @if($title=="Update Guide")
        <script src="{{asset('jsfile/guidejs/updateguide.js')}}"></script>
    @elseif($title=="Guide Registration")
        <script src="{{asset('jsfile/guidejs/guidereg.js')}}"></script>
    @endif

</head>
<body>
<div class="background">
<div class="form-container">
<form action="{{$url}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-header">{{$title}}</div>
    <div>
    <table id="form-table">
        <tr>
            <td><div class="inputControl">
                <label for="photo" class="file-upload-label">Upload Your Photo:<span id="photo-name"></span></label>
                <input type="file" name="photo" id="photo" accept="image/*" class="file-upload-input" onchange="updateFileName('photo')">
                <div class="error"></div>
            </td>
            <td><div class="inputControl"><input id="email" type="Email" name="email" placeholder="Email" value="{{$guide->email}}" required>
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl"><input id="password" type="password" name="passwd" placeholder="Password">
                <div class="error"></div>
            </div></td>
        </tr>
        <tr>
            <td><div class="inputControl"><input id="fname"  type="text" name="fname" placeholder="First Name" value="{{$guide->first_name}}" required>
                                 <div class="error"></div>
            </div></td>
            <td><div class="inputControl"><input id="mname"  type="text" name="mname" placeholder="Middle Name (Optional)" value="{{$guide->middle_name}}" >
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl"><input id="lname"  type="text" name="lname" placeholder="Last Name" value="{{$guide->last_name}}" required>
                                <div class="error"></div>
            </div></td>
        </tr>
        <tr>
            <td><div class="inputControl"><label>DOB</label>&nbsp;&nbsp;<input type="date" name="date" value="{{$guide->dob}}" id="dob" placeholder="date">
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl">
                <div class="gender">
                    <label>Male</label>&nbsp;<input type="radio" name="gender" value="Male" {{$guide->gender=="Male" ? "checked" : ""}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Female</label>&nbsp;<input type="radio" name="gender" value="Female" {{$guide->gender=="Female" ? "checked" : ""}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Others</label>&nbsp;<input type="radio" name="gender" value="Others" {{$guide->gender=="Others" ? "checked" : ""}}><br><br>
                </div>
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl"><input id="lang"  type="text" placeholder="Known Languages" name="lang" value="{{$guide->known_languages}}">
                                <div class="error"></div>
            </div></td>
        </tr>
        <tr>
            <td><div class="inputControl"><input id="address"  type="text" name="address" placeholder="Address" value="{{$guide->address}}" required>
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl"></div></td>
            <td><div class="inputControl"><input id="phone"  type="text" name="phone" placeholder="Mobile Number" value="{{$guide->phone_no}}" required>
                                <div class="error"></div>
            </div></td>                    
        </tr>
        <tr>
            <td><div class="inputControl"><input  id="license_no" type="text" name="license" placeholder="License No." value="{{$guide->license_no}}" required>
                                <div class="error"></div>
            </div></td>
            <td><div class="inputControl"><label for="worK_exp" id="lwexp">Started Working as Guide Since:</label></div></td>
            <td><div class="inputControl"><input type="date" name="work_exp" id="wexp" value="{{$guide->work_experience}}" required></div>
                                <div class="error"></div></td>
        </tr>

        <tr>
            <td><div class="inputControl">
                <select name="location"  id="guiding_location" required>
                    <option value="" disabled {{ is_null($guide->guiding_location) ? 'selected' : '' }}>Select the location you guide in:</option>
                    @foreach($places as $v)
                    <option value="{{$v}}" {{ $guide->guiding_location == $v ? 'selected' : '' }}>{{ $v }}</option>
                    @endforeach
                </select>        <div class="error"></div>
            </div></td>
            <td></td>
            <td><div class="inputControl">
                <label for="document" class="file-upload-label">Upload Document:<span id="document-name"></span></label>
                <input type="file" name="document" id="document" accept="application/pdf,application/msword" class="file-upload-input" onchange="updateFileName('document')">
                <div class="error"></div>
            </div></td>
        </tr>
        <tr>
            <td colspan="3">
                <textarea name="bio" rows="4" cols="50" placeholder="Enter a brief bio about yourself (Optional)">{{$guide->bio}}</textarea>
            </div></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"></td>
            <td></td>
        </tr>
    </table>
    </div>
</div>
</form>
</div>
</body>
</html>
@endsection
