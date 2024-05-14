document.getElementById('donationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission.

    var formData = new FormData(this); // Create a FormData object passing in the form itself.
    var xhr = new XMLHttpRequest(); // Create a new instance of XMLHttpRequest.

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Check if the request is complete.
            if (xhr.status === 200) { // Check if the request was successful.
                alert("Thank you for your donation!"); // Show a success message.
                window.location.href = "home2.html"; // Redirect to the homepage.
            } else {
                alert("Failed to process donation. Please try again later."); // Show an error message if something went wrong.
            }
        }
    };

    xhr.open("POST", "index.php?route=equipment", true); // Initialize a request with the URL to where the form should be submitted.
    xhr.send(formData); // Send the form data.
});
