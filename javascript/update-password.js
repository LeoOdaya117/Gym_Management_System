$(document).ready(function () {   
               
    $('#password-change-form').submit(function (event) { 
     
        event.preventDefault();                 
        var form = document.getElementById('password-change-form'); 
        var formData = new FormData(form); 
        Swal.fire({
          icon: "warning",
          title: "Are you sure you want to change password?",
          showCancelButton: true,
          confirmButtonText: "Yes",
  
      }).then((result) => {
      
          if (result.isConfirmed) {



              $.ajax({ 

                url: 'update-password.php', 
                method: 'POST', 
                data: formData, 
                processData: false, 
                contentType: false, 
                success: function (response) {                       
                    
                  if(response === "Success"){
                      Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Password Successfully Updated",
                        showConfirmButton: true,
                      }).then(function () {
                          window.location.href = "change-password.php";
                      });
                  }
                  else{

                      Swal.fire({
                        icon: "error",
                        title: "Result",
                        text: response,
                        showConfirmButton: true,
                      })

                  }
                    
                }, 
                  
              }); 
      
          }
          else
          {
              
          }

      });
 
    }); 
}); 