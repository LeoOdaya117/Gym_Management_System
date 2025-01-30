$(document).ready(function () {  
    $('#edit-form-exercise').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('edit-form-exercise'); 
        var formData = new FormData(form); 

        formData.append('exerciseid', exerciseid);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to Update this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'update-exercise.php', 
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
                            text: "Exercise Updated successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "exercise.php";
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
            }
        });
        
        

    }); 
}); 



$(document).ready(function () {  
    $('#edit-form-subscription').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('edit-form-subscription'); 
        var formData = new FormData(form); 

        formData.append('id', subscriptioID);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to Update this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'update-subscription.php', 
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
                            text: "Subscription Updated successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "subscription_list.php";
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
            }
        });
        
        

    }); 
}); 


$(document).ready(function () {  
    $('#edit-form-equipment').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('edit-form-equipment'); 
        var formData = new FormData(form); 

        formData.append('equipmentID', equipmentID);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to Update this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'update-equipment.php', 
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
                            text: "Equipment Updated Successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "equipment.php";
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
            }
        });
        
        

    }); 
}); 

$(document).ready(function () {  
    $('#edit-form-food').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('edit-form-food'); 
        var formData = new FormData(form); 

        formData.append('foodID', foodID);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to Update this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'update-food.php', 
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
                            text: "Equipment Updated Successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "Food.php";
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
            }
        });
        
        

    }); 
}); 

$(document).ready(function () {  
    $('#edit-staff-form').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('edit-staff-form'); 
        var formData = new FormData(form); 

        formData.append('edit_id', staffid);

        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to Update this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'update-staff.php', 
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
                            text: "Data Updated Successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "staff_list.php";
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
            }
        });
        
        

    }); 
}); 
