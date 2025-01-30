var qr = "";

function setProfile() {
    $.ajax({
        type: "GET",
        url: "fetch_user_details.php",
        dataType: "json",
        success: function (response) {
            var userDetails = response;

            var fullname = userDetails.Firstname + " " + userDetails.Lastname;
            var userPhoto = userDetails.photo;
            qr = userDetails.qr;
            var position = "";
            
            if (userDetails.AccountType === "User") {
                position = "Gym Member";
            }

            document.getElementById("fullname").innerHTML = fullname;
            document.getElementById("position").innerHTML = position;
            document.getElementById("Userpic").src = userPhoto;
            document.getElementById("qrcodeimage").src = qr;
            
        },
        error: function (error) {
            console.error("Error fetching user details:", error);
        }
    });
}

function showQRCode() {
    var qrCodeContainer = document.getElementById("qrCodeContainer");
    qrCodeContainer.style.display = "block"; // Show the qrCodeContainer
}

function hideqr(){
    var qrCodeContainer = document.getElementById("qrCodeContainer");
    qrCodeContainer.style.display = "none"; // Show the qrCodeContainer
}

// Add event listener to qrCodeIcon
document.getElementById("qrCodeIcon").addEventListener("click", showQRCode);

// Call setProfile() to fetch user details
setProfile();
