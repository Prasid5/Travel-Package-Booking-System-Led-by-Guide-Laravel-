// validation.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        // Prevent form submission
        event.preventDefault();

        // Get the input values
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        let valid = true;

        // Regular expression for validating email format
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validate email
        if (email === "") {
            valid = false;
            alert("Email is required.");
        } else if (!emailPattern.test(email)) {
            valid = false;
            alert("Please enter a valid email address.");
        }

        // Validate password
        if (password.length < 6) {
            valid = false;// validation.js

            document.addEventListener("DOMContentLoaded", function() {
                const form = document.querySelector("form");
                
                form.addEventListener("submit", function(event) {
                    // Prevent form submission
                    event.preventDefault();
            
                    // Get the input values
                    const email = form.email.value.trim();
                    const password = form.password.value.trim();
                    let valid = true;
            
                    // Regular expression for validating email format
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
                    // Validate email
                    if (email === "") {
                        valid = false;
                        alert("Email is required.");
                    } else if (!emailPattern.test(email)) {
                        valid = false;
                        alert("Please enter a valid email address.");
                    }
            
                    // Validate password
                    if (password.length < 6) {
                        valid = false;
                        alert("Password must be at least 6 characters long.");
                    }
            
                    // If valid, submit the form
                    if (valid) {
                        form.submit();
                    }
                });
            });
            alert("Password must be at least 6 characters long.");
        }

        // If valid, submit the form
        if (valid) {
            form.submit();
        }
    });
});