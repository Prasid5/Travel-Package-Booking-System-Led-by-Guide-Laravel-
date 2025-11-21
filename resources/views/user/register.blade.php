<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('cssfile/usercss/register.css')}}">
        <script src="{{asset('jsfile/userjs/register.js')}}"></script>
        
</head>
<body>
    <div class="background">
        <div class="opacity">
            <div class="container">

                <div class="header">{{$title}}</div>

                <div class="form">
                <form action="{{$url}}" method="post" autocomplete="off">
                    @csrf
                    <input type="text" name="fullname" placeholder="Fullname" value="{{$tourist->fullname}}"><br><br>

                    <input type="Email" name="email" placeholder="Email" value="{{$tourist->email}}" ><br><br>
            
                    <input type="password" name="passwd" placeholder="Password" value="{{$tourist->password}}"><br><br>

                    <div class="gender">
                        <label style="font-family: Pangea Afrikan Text Trial; font-size: 18px;">Male</label>
                        <input type="radio" name="gender" value="Male" {{$tourist->gender=="Male" ? "checked" : ""}}>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label style="font-family: Pangea Afrikan Text Trial; font-size: 18px;">Female</label>
                        <input type="radio" name="gender" value="Female" {{$tourist->gender=="Female" ? "checked" : ""}}>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label style="font-family: Pangea Afrikan Text Trial; font-size: 18px;">Others</label>
                        <input type="radio" name="gender" value="Others" {{$tourist->gender=="Others" ? "checked" : ""}}><br><br>
                    </div>
                    <label for="dob">DOB: </label><input type="date" name="dob" id="date" value="{{$tourist->dob}}"><br><br>
                    <input type="text" name="phone" placeholder="Phone Number" value="{{$tourist->phone_no}}" ><br><br>
                    @php
                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                    @endphp
                    <select name="country" >
                        <option value="" disabled {{ is_null($tourist->guiding_location) ? 'selected' : '' }}>Country</option>
                        @foreach($countries as $i)
                            <option value="{{$i}}" {{ $tourist->country == $i ? 'selected' : '' }}>{{$i}}</option>
                        @endforeach
                    </select><br><br>

                    <input type="submit" value="Submit"><br>
                    <a href="{{url('login')}}">Already have an account.</a>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const dateInput = document.getElementById('date');    
        dateInput.addEventListener('focus', () => {dateInput.showPicker();});
    </script>
</body>
</html>
