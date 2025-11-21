@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/admincss/tripadd.css')}}">
    <script src="{{asset('jsfile/adminjs/tripadd.js')}}"></script>
</head>
<body>
<div class="contentbackground">
            <div class="contentcontainer">
                <div class="contentheader">
                    <div class='box1'></div>
                    <div class='box2'>Add Travel Package</div>
                    <div class="box3">
                        <a href="/tripdetail"><img src="/profileimg/profilearrow.png" alt=""></a>
                    </div>
                </div>
                <br>
                    <table>
                        <form action="{{url('/tripadd')}}" method=POST>
                            @csrf
                            <tr>
                                <td>Place: </td><td id="la"><input type="text" name="place" required></td>
                                <td>Activities: </td><td><textarea name="activities" row=2 required></textarea></td>
                            </tr>
                            <tr>
                                <td>Travel Class: </td><td id="la"><select name="travel_class" required>
                                    <option value="Premium Class" >Premium Class</option>
                                    <option value="Economy Class" >Economy Class</option>
                                    </select></td>
                                <td>Travelling Days:</td><td id="la"><input type="number" name="travelling_days" required></td>
                            </tr>
                            <tr>
                                <td>Base Price: </td><td id="la"><input type="text" name="base_price"  required></td>
                                <td>Commission Rate: </td><td id="la"><input type="text" name="commission_rate" min=1 max=2 required></td>
                            </tr>
                            <tr>
                                <td colspan="4"><input type="submit"></td>
                            </tr>
                        </form>
                    </table>
            </div>
</div>
</body>
</html>
@endsection