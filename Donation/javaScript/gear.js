document.getElementById('gearDonationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Thank you for your donation!");
            window.location.href = "home2.html";
        } else if (xhr.readyState === 4) {
            alert("Failed to process donation. Please try again later.");
        }
    };
    xhr.open("POST", "index.php?route=gear", true);
    xhr.send(formData);
});
