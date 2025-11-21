// updateAdmin.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        const name = form.name.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value.trim();

        const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Basic email pattern

        if (!namePattern.test(name)) {
            event.preventDefault();
            alert("Name must contain only letters and spaces.");
            return;
        }

        if (!emailPattern.test(email)) {
            event.preventDefault();
            alert("Please enter a valid email address.");
            return;
        }

        if (password && password.length < 6) {
            event.preventDefault();
            alert("Password must be at least 6 characters long.");
            return;
        }
    });
});