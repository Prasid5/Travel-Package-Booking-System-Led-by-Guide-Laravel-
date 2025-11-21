    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{asset('/cssfile/admincss/register.css')}}">
        <script src="{{asset('jsfile/adminjs/register.js')}}"></script>
    </head>
    <body>
        <div class="background">
            <div class="opacity">
                <div class="container">
                    <div class="header">
                        <div class="container1"></div>
                        <div class="container2">Admin Register</div>
                        <div class="container3"></div>
                    </div><br>
                <div class="form">
                    <form action="{{url('/adminregister')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Name" required><br><br>

                        <input type="text" name="email" placeholder="Email" required><br>
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror<br>
                        
                        <input type="password" name="password" placeholder="Password" required><br><br>

                        <select name="role" id="">
                            <option disabled>Choose Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                        @if ($errors->has('error'))
                        <div>
                            <span>{{ $errors->first('error') }}</span>
                        </div>
                        @endif
                        <br>
                            <a href="{{url('/adminlogin')}}">Already have an account.</a>
                            <input type="submit" value="Submit"required></input><br>
                            <!-- <a href="tourist/registration">Haven't registered an account.</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>