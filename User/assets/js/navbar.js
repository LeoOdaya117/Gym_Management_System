function calculateBMI(weightKg, heightCm) {
    // Convert height from centimeters to meters
    let heightM = heightCm / 100;
    // Calculate BMI
    let bmi = weightKg / (heightM * heightM);
    // Limit BMI to two decimal places
    return bmi.toFixed(2);
}


function setProfile() {
    var bmi = "";
    var height = "";


    $.ajax({
        type: "GET",
        url: "fetch_user_details.php", // Replace with your actual PHP file
        dataType: "json",
        success: function (response) {

            var userDetails = response; // Store user details globally
            var position = "User";
            //alert(userDetails.BMI);
            var bmival = userDetails.BMI;
            var height = userDetails.Height;
            bmival = calculateBMI(userDetails.Weight,height);

            var image = document.getElementById("user-picture");
            

            if(userDetails.AccountType === "User"){
                position = "Gym Member";
              }
              else{
                position = "Admin";
              }
           
            // image.src = userDetails.photo;
             document.getElementById("sidebar-username").innerHTML = userDetails.Firstname + " " +userDetails.Lastname ;
            // document.getElementById("navbar-username").innerHTML = userDetails.Firstname + " " +userDetails.Lastname ;
            document.getElementById("navbar-position").innerHTML = position;

    
            

            
        },
        error: function (error) {
            console.error("Error fetching user details:", error);
        }
    });

    
}

document.addEventListener("DOMContentLoaded", setProfile);
window.onload = setProfile();