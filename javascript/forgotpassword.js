$(document).ready(function () {  
    $('#forgotpassword-form').submit(function (event) { 
        event.preventDefault();     
                   
        var form = document.getElementById('forgotpassword-form'); 
        var formData = new FormData(form);

        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get('email');
        const token = urlParams.get('token');
        formData.append('email', email);
        formData.append('token', token);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to change your password?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, update it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 
                    url: 'update-password.php', 
                    method: 'POST', 
                    data: formData,
                    processData: false, 
                    contentType: false, 
                    success: function (response) {                       
                        response = response.trim();
                        if(response === "Success"){
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Password Updated Successfully!",
                                showConfirmButton: true,
                            }).then(function () {
                                // Get the current URL parameters
                                var urlParams = new URLSearchParams(window.location.search);

                                // Remove the 'email' parameter
                                urlParams.delete('email');

                                // Construct the new URL without the 'email' parameter
                                var newUrl = window.location.pathname + '?' + urlParams.toString();

                                // Change the URL without reloading the page
                                history.replaceState(null, null, newUrl);


                                window.location.href = "successpage.php"
                            });
                        }
                        else{
                            Swal.fire({
                                icon: "warning",
                                title: "Result",
                                text: response,
                                showConfirmButton: true,
                            });
                        }
                    }
                }); 
            }
        });
    }); 


});
