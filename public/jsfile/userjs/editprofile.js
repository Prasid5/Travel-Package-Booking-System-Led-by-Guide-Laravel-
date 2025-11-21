document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        const fullname = form.fullname.value.trim();
        const phone = form.phone.value.trim();
        const password = form.passwd.value.trim();
        const country = form.country.value;

        const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
        const phonePattern = /^(97|98)\d{8}$/; // 10 digits starting with 97 or 98

        if (!namePattern.test(fullname)) {
            event.preventDefault();
            alert("Full name must contain only letters and spaces.");
            return;
        }

        if (!phonePattern.test(phone)) {
            event.preventDefault();
            alert("Phone number must be 10 digits long and start with 97 or 98.");
            return;
        }

        if (password && password.length < 6) {
            event.preventDefault();
            alert("Password must be at least 6 characters long.");
            return;
        }

        if (!country) {
            event.preventDefault();
            alert("Please select a country.");
            return;
        }
    });
});