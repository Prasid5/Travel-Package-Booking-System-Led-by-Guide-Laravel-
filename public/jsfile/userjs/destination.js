document.addEventListener("DOMContentLoaded", function () {
        const dateInput = document.getElementById('travel-date');
        
        if (dateInput) {

            const today = new Date();
            const minDate = new Date(today);

            minDate.setDate(today.getDate() + 4);
            
            const formattedMinDate = minDate.toISOString().split('T')[0];
    
            // Set the min attribute to the calculated date
            dateInput.setAttribute('min', formattedMinDate);
        }
});
    