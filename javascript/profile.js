function loadUserData() {
    $.ajax({
        url: 'get_user_data.php', // Replace with the actual PHP script URL
        method: 'POST', // You can use POST or GET, depending on your PHP script
        dataType: 'json', // Assuming the response is JSON
        success: function (data) {
            // Correct the property names
           
            $('#user-profile').attr('src', data.photo);
           
        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
        }
    });
}

// Call the function when the page loads
$(document).ready(function () {
    loadUserData();
});