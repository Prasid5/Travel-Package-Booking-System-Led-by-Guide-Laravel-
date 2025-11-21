document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function (event) {
        // Prevent form submission
        event.preventDefault();

        // Get form elements
        const place = document.querySelector('input[name="place"]');
        const activities = document.querySelector('textarea[name="activities"]');
        const travellingDays = document.querySelector('input[name="travelling_days"]');
        const basePrice = document.querySelector('input[name="base_price"]');
        const commissionRate = document.querySelector('input[name="commission_rate"]');

        // Regular expressions for validation
        const noDigitsRegex = /^[^0-9]*$/;
        let isValid = true;

        // Validate Place
        if (!place.value || !noDigitsRegex.test(place.value)) {
            alert('Place must not contain digits.');
            isValid = false;
            place.focus(); // Set focus to the input field
        }

        // Validate Activities
        else if (!activities.value || !noDigitsRegex.test(activities.value)) {
            alert('Activities must not contain digits.');
            isValid = false;
            activities.focus(); // Set focus to the textarea
        }

        // Validate Travelling Days
        else if (travellingDays.value <= 0) {
            alert('Travelling days must be a positive number.');
            isValid = false;
            travellingDays.focus(); // Set focus to the input field
        }

        // Validate Base Price
        else if (basePrice.value < 0) {
            alert('Base price cannot be negative.');
            isValid = false;
            basePrice.focus(); // Set focus to the input field
        }

        // Validate Commission Rate
        else if (commissionRate.value < 0) {
            alert('Commission rate cannot be negative.');
            isValid = false;
            commissionRate.focus(); // Set focus to the input field
        }

        // If valid, submit the form
        if (isValid) {
            form.submit();
        }
    });
});