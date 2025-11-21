@extends('admin.adminmain')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/admincss/tripadd.css')}}">
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
                        <form action="{{url('/discountadd')}}" method=POST>
                            @csrf
                            <tr>

                                <td>Minimum People: </td><td id="la"><input type="number" name="min_people" min=1 max=25 required></td>
                                <td>Maximum People: </td><td> <input type="number" name="max_people" min=1 max=25 required></td>
                            </tr>
                            <tr>
                                <td>Discount Rate: </td><td id="la"><input type="text" name="discount_rate" min=0 max=1 required></td>
                                <td></td>
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