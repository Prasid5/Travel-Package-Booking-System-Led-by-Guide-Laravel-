<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/cssfile/usercss/otp.css')}}">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            form.addEventListener("submit", function(event) {
                const otpCode = form.otpcode.value.trim();
                const otpPattern = /^\d{6}$/; // Regex for exactly 6 digits

                if (!otpPattern.test(otpCode)) {
                    event.preventDefault(); // Prevent form submission
                    alert("Please enter a valid OTP code consisting of exactly 6 digits.");
                }
            });
        });
    </script>
</head>
<body>
    <div class="background">
            <div class="container">

                <div class="header">Email Confirmation</div>

                <div class="form">
                <form action="{{url('/otp')}}" method="post">
                    @csrf
                    <div><p style="display:inline-block; text-align:center;">The code has been sent to your email address</p></div>

                    <input type="text" name="otpcode" placeholder="OTP Code" required><br><br>
                    @if(session('error'))
                    <span style="color:red; font-size:14px;">{{ session('error') }}</span>
                    @endif
                    <input type="submit" value="Submit"required></input><br>
                </form>
                @if(session('alert'))
                    <script>
                        alert("{{ session('alert') }}");
                    </script>
                @endif
                </div>
            </div>
    </div>
    @if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
    @endif
</body>
</html>
