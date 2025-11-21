<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/cssfile/usercss/login.css')}}">
    <script src="{{asset('jsfile/userjs/login.js')}}"></script>

</head>
<body>

<div class="background">
        <div class="opacity">
            <div class="container">

                <div class="header">
                    <div class="container1"></div>
                    <div class="container2">Login</div>
                    <div class="container3"><a href="home"><img src="/loginimg/back3.png" alt=""></a></div>
                </div><br>
                <div class="form">
                <form action="{{url('/login')}}" method="POST" autocomplete="off">
                    @csrf
                    <input type="email" name="email" placeholder="Email"><br><br>

                    <input type="password" name="password" placeholder="Password"><br>
                    @if ($errors->has('error'))
                        <div>
                            <span>{{ $errors->first('error') }}</span>
                        </div>
                    @endif
                    <br>

                    <input type="submit" value="Submit"required></input><br>
                    <a href="tourist/registration">Haven't registered an account.</a>
                </form>
                </div>
        </div>
    </div>
</div>

</body>
</html>