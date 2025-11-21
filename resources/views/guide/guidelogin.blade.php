<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/cssfile/guidecss/login.css')}}">
    <script src="{{asset('/jsfile/guidejs/login.js')}}"></script>
</head>
<body>
<div class="background">
        <div class="opacity">
            <div class="container">
                <div class="header">
                    <div>Guide Login</div>
                </div><br>
                <div class="form">
                <form action="{{url('/guidelogin')}}" method="POST" autocomplete="on">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required><br>
                    @error('email')
                     <span>{{ $message }}</span>
                    @enderror<br>

                    <input type="password" name="password" placeholder="Password" required><br>
                    @if ($errors->has('error'))
                        <div>
                            <span>{{ $errors->first('error') }}</span>
                        </div>
                    @endif
                    <br>

                    <input type="submit" value="Submit"required></input><br>
                </form>
                </div>
        </div>
    </div>
</div>

</body>
</html>