$(document).ready(function () {  
    $('#login-form').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('login-form'); 
        var formData = new FormData(form); 
        
        $.ajax({ 

            url: 'login.php', 
            method: 'POST', 
            data: formData, 
            processData: false, 
            contentType: false, 
            success: function (response) {                       
                response = response.trim();
            if(response === "Admin"){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Login Successful",
                    showConfirmButton: true,
                }).then(function () {
                    window.location.href = "admin-index.php";
                });
            }
            else if(response === "User"){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Login Successful",
                    showConfirmButton: true,
                }).then(function () {
                    window.location.href = "index.php";
                });
            }
            else{
                Swal.fire({
                    icon: "info",
                    title: "Result",
                    text: response,
                    showConfirmButton: true,
                });
            }
                
            }
            
        }); 

    }); 
}); 