// adminRegister.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        const name = form.name.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const role = form.role.value;

        const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Basic email pattern

        if (!name) {
            event.preventDefault();
            alert("Name is required.");
            return;
        } else if (!namePattern.test(name)) {
            event.preventDefault();
            alert("Name must contain only letters and spaces.");
            return;
        }

        if (!email) {
            event.preventDefault();
            alert("Email is required.");
            return;
        } else if (!emailPattern.test(email)) {
            event.preventDefault();
            alert("Please enter a valid email address.");
            return;
        }

        if (!password) {
            event.preventDefault();
            alert("Password is required.");
            return;
        } else if (password.length < 6) {
            event.preventDefault();
            alert("Password must be at least 6 characters long.");
            return;
        }

        if (!role) {
            event.preventDefault();
            alert("Please select a role.");
            return;
        }
    });
});