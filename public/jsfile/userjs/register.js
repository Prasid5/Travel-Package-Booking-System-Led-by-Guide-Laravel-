document.addEventListener("DOMContentLoaded", function () {
    const select_dob = document.getElementById('date');

    const today = new Date();
    const minDate = new Date(today);
    const maxDate = new Date(today);

    minDate.setFullYear(today.getFullYear() - 65);
    maxDate.setFullYear(today.getFullYear() - 18);

    const formattedMinDate = minDate.toISOString().split('T')[0];
    const formattedMaxDate = maxDate.toISOString().split('T')[0];

    select_dob.setAttribute('min', formattedMinDate);
    select_dob.setAttribute('max', formattedMaxDate);

    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const fullname = form.fullname.value.trim();
        const email = form.email.value.trim();
        const password = form.passwd.value.trim();
        const phone = form.phone.value.trim();
        const gender = form.gender.value;
        const country = form.country.value;
        const dob = form.dob.value;
        let valid = true;

        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!/^[a-zA-Z\s]+$/.test(fullname)) {
            valid = false;
            alert("Full name must contain only letters.");
        }

        if (email === "") {
            valid = false;
            alert("Email is required.");
        } else if (!emailPattern.test(email)) {
            valid = false;
            alert("Please enter a valid email address.");
        }

        if (password === "") {
            valid = false;
            alert("Password is required.");
        }
        if (password.length < 6) {
            valid = false;
            alert("Password must be at least 6 characters long.");
        }
        if (!/^(97|98)\d{8}$/.test(phone)) {
            valid = false;
            alert("Phone number must be 10 digits long and start with 97 or 98.");
        }

        if (!gender) {
            valid = false;
            alert("Please select your gender.");
        }

        if (country === "") {
            valid = false;
            alert("Please select your country.");
        }

        if (dob === "") {
            valid = false;
            alert("Date of Birth is required.");
        }

        if (valid) {
            form.submit();
        }
    });
});