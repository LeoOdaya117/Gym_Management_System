$(document).ready(function() {
    $('#myprofile_form').submit(function(e) {
        e.preventDefault();
        

        

        // Serialize form data
        var fileInput = document.getElementById('imageInput');
        var imageFile = fileInput.files[0];
        
        var formData = new FormData(this);
        formData.append('myprofile-photo', imageFile);


        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to save this?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'update-user-profile.php',
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting content type
                    success: function(response) {

                        if(response == "Success"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Successfully Updated!',
                                showConfirmButton: true
                                }).then(function() {
                                    // window.location.href = 'myprofile.php';
                                    loadUserData();
                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response,
                                showConfirmButton: true
                                }).then(function() {
                                    // window.location.href = 'myprofile.php';
                            });
                        }
                    
                        
                    }
                });
            }
        });


        
    });
});

$(document).ready(function () {
// Trigger the file dialog when the button is clicked
$('#chooseImageBtn').click(function () {
    $('#imageInput').click();
});

// Handle file selection when the input changes
$('#imageInput').change(function () {
    var selectedFile = this.files[0];
    if (selectedFile) {
        // You can do something with the selected file here
        console.log('Selected file:', selectedFile);
        var imageUrl = URL.createObjectURL(selectedFile);
        $('#profileImage').attr('src', imageUrl);
    }
});
});

function loadUserData() {
$.ajax({
    url: 'admin/api/get_user_data.php', // Replace with the actual PHP script URL
    method: 'POST', // You can use POST or GET, depending on your PHP script
    dataType: 'json', // Assuming the response is JSON
    success: function (data) {
        // Correct the property names
       
        $('#myprofile-username').val(data.Username);
        $('#myprofile-Fname').val(data.Firstname); // Use 'Firstname' instead of 'FastName'
        $('#myprofile-Lname').val(data.Lastname); // Use 'Lastname' instead of 'LastName'
        $('#myprofile-Age').val(data.Age);
        $('#myprofile-Gender').val(data.Gender);
        $('#myprofile-AccountType').val(data.AccountType);
        // $('#myprofile-Height').val(data.Height);
        // $('#myprofile-BMR').val(data.BMR);
        // $('#myprofile-DCT').val(data.DCT);
        $('#profileImage').attr('src', data.photo);
        // $('#myprofile-ActLvl').val(data.ActLvl);
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