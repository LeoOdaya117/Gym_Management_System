// Function to simulate typing effect
function typeText(element, text, delay) {
    let index = 0;
    const interval = setInterval(function() {
        if (index < text.length) {
            element.innerText += text.charAt(index);
            index++;
        } else {
            clearInterval(interval);
        }
    }, delay);
}

// Start typing when the page loads
window.addEventListener('load', function() {
    const typingText = document.getElementById('typing-text');
    const textToType = typingText.innerText;
    typingText.innerText = ''; // Clear the text initially
    const delay = 50; // Adjust the typing speed (milliseconds per character)

    typeText(typingText, textToType, delay);
});

function reloadPage() {
    location.reload(); // Reload the current web page
}

// JavaScript to toggle the login form visibility
document.addEventListener("DOMContentLoaded", function () {
    var loginLink = document.getElementById("login-link");
    var loginContainer = document.getElementById("login-container");

    loginLink.addEventListener("click", function (e) {
        e.preventDefault();
        if (loginContainer.style.display === "none" || loginContainer.style.display === "") {
            loginContainer.style.display = "block";
        } else {
            loginContainer.style.display = "none";
        }
    });
});

  

