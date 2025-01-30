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
                    window.location.href = "user-index.php";
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




  // Declare userDetails variable outside the functions
  var userDetails;

  // Function to fetch user details using AJAX
  function fetchUserDetails() {
    $.ajax({
      type: "GET",
      url: "fetch_user_details.php", // Replace with your actual PHP file
      dataType: "json",
      success: function (response) {
        userDetails = response; // Store user details globally
        // Calculate the estimated time to reach the weight goal
        //alert(  userDetails.goalweight);

        // var expectedweights = calculateExpectedWeight(userDetails.weight, userDetails.goalweight, userDetails.dct, userDetails.fitnessgoal);

        // Update the Weight Goal data in the chart with the calculated weeks
        //data.datasets[1].data = Array(expectedweights).fill(userDetails.weight_goal);
        //data.datasets[1].data = expectedweights;
        // Update the chart
        //myLineChart.update();

        document.getElementById("current-weight").innerHTML = userDetails.weight + " kg";
      },
      error: function (error) {
        console.error("Error fetching user details:", error);
      }
    });
  }



  function calculateExpectedWeight(currentWeight, targetWeight, dct, fitnessgoal) {
    
    var targetCal = 0;

    if(fitnessgoal == 'Loss Weight'){
        
    }
    // Calculate the total weight loss required
    var weightToLose = currentWeight - targetWeight;

    // Calculate the total caloric deficit required
    var totalCaloricDeficit = weightToLose * 7700; // Assuming 1 kg of body weight loss requires a caloric deficit of 7700 calories

    // Calculate the estimated time to reach the weight goal in days
    var daysToGoal = totalCaloricDeficit / dct;

    // Convert days to weeks
    var weeksToGoal = Math.ceil(daysToGoal / 7); // Round up to the nearest whole number of weeks

    // Calculate the expected weight for each week
    var expectedWeights = [];
    var currentWeightLoss = 0;
    for (var i = 1; i <= weeksToGoal; i++) {
        // Calculate the expected weight for the current week
        var expectedWeight = currentWeight - (currentWeightLoss / 7700);
        expectedWeights.push({
            week: i,
            expectedWeight: expectedWeight
        });

        // Update current weight loss for the next week
        currentWeightLoss += dct * 7;
    }

    //alert(expectedWeights);
    // console.log(expectedWeights);
    return expectedWeights;
}


  // Function to fetch weight data from the server
  function fetchWeightData() {
    $.ajax({
      type: "GET",
      url: "fetch_weight_data.php", // Create this file to fetch weight data
      dataType: "json",
      success: function (response) {
        // Update the weight data in the 'data' array
        data.labels = response.dates.map(function(date) {
          // Format date to "MMM D" (e.g., "Jan 1")
          return new Date(date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        });
        data.datasets[0].data = response.weights;

        // Update the chart
        myLineChart.update();
      },
      error: function (error) {
        console.error("Error fetching weight data:", error);
      }
    });
  }


  //CHART JS
  var data = {
    labels: [], // Add labels dynamically based on the fetched data
    datasets: [
      {
        label: 'Weight Logs',
        data: [], // Add weight data dynamically based on the fetched data
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2,
        fill: false
      },
      {
        label: 'Weight Goal',
        data: "97.50,96.50,95.50,95".split(","),// Replace with your actual weight goal values
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 2,
        fill: false
      }
    ]
  };

  // Options for the line chart
  var options = {
    scales: {
      y: {
        beginAtZero: false
      }
    },
    plugins: {
      legend: {
        position: 'top'
      }
    },
    scales: {
      x: [{
        ticks: {
          callback: function(value, index, values) {
            // Format tick labels to "MMM D" (e.g., "Jan 1")
            return new Date(value).toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
          },
          maxRotation: 45,
          minRotation: 45,
        },
        gridLines: {
          display: false
        }
      }],
      y: {
        beginAtZero: false
      }
    }
  };

  // Get the context of the canvas element we want to select
  var ctx = document.getElementById('lineChart').getContext('2d');

  // Create the line chart
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });

  // Fetch user details and weight data initially
  fetchUserDetails();
  fetchWeightData();
  setBMI();



$(document).ready(function () {
// Submit weight log form using AJAX
    $("#submitWeightBtn").click(function () {
    // Get the weight input value
    var weight = $("#weightInput").val();

    // AJAX request to save the weight
    $.ajax({
        type: "POST",
        url: "save_weight.php", // Replace with the actual PHP file to handle the saving logic
        data: {
        weight: weight
        },
        success: function (response) {
        // Handle the response, if needed
        
            console.log(response);
            Swal.fire({
                icon: "success",
                title: "Success",
                text: response,
                showConfirmButton: true,
            }).then(function () {
                
                fetchUserDetails();
                fetchWeightData();
                setBMI();
            });

            // Close the modal
            $("#weightLogModal").modal("hide");
        },
        error: function (error) {
        // Handle the error, if needed
        //console.error("Error saving weight:", error);
        Swal.fire({
            icon: "error",
            title: "Result",
            text: error,
            showConfirmButton: true,
        }).then(function () {
            
        });
        }
    });
    });
});

$(document).ready(function () {
    // Submit weight log form using AJAX
        $("#submitHeighttBtn").click(function () {
        // Get the weight input value
        var height = $("#heighttInput").val();
    
        // AJAX request to save the weight
        $.ajax({
            type: "POST",
            url: "save_height.php", // Replace with the actual PHP file to handle the saving logic
            data: {
            height: height
            },
            success: function (response) {
                // Handle the response, if needed
                
                //console.log(response);
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response,
                    showConfirmButton: true,
                }).then(function () {
                    
                    fetchUserDetails();
                    fetchWeightData();
                    setBMI();
                });
        
                // Close the modal
                $("#heightChangeModal").modal("hide");
            },
            error: function (error) {
            // Handle the error, if needed
            //console.error("Error saving weight:", error);
            Swal.fire({
                icon: "error",
                title: "Result",
                text: error,
                showConfirmButton: true,
            }).then(function () {
                
            });
            }
        });
        });
    });

    function calculateBMI(weightKg, heightCm) {
        // Convert height from centimeters to meters
        let heightM = heightCm / 100;
        // Calculate BMI
        let bmi = weightKg / (heightM * heightM);
        // Limit BMI to two decimal places
        return bmi.toFixed(2);
    }
    

    function setBMI() {
        var bmi = "";
        var height = "";


        $.ajax({
            type: "GET",
            url: "fetch_user_details.php", // Replace with your actual PHP file
            dataType: "json",
            success: function (response) {
                userDetails = response; // Store user details globally
                
                bmi = userDetails.bmi;
                height = userDetails.height;
                bmi =calculateBMI(userDetails.weight,height);

                if (bmi < 18.5) {
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Underweight";
                    document.getElementById("bmi-color").style.backgroundColor  = "#036bfc";
                    document.getElementById("current-bmi").innerHTML = bmi;
                } else if (bmi >= 18.5 && bmi <= 24.9) {
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Normal";
                    document.getElementById("bmi-color").style.backgroundColor  = "#007bff";
                    document.getElementById("current-bmi").innerHTML = bmi;
                } else if (bmi >= 25 && bmi <= 29.9) {
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Overweight";
                    document.getElementById("bmi-color").style.backgroundColor  = "#03b5fc";
                    document.getElementById("current-bmi").innerHTML = bmi;
                } else if (bmi >= 30 && bmi <= 34.9) {
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Obesity Class I";
                    document.getElementById("bmi-color").style.backgroundColor  = "#fcce03";
                    document.getElementById("current-bmi").innerHTML = bmi;
                } else if (bmi >= 35 && bmi <= 39.9) {
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Obesity Class II";
                    document.getElementById("bmi-color").style.backgroundColor  = "#fc7703";
                    document.getElementById("current-bmi").innerHTML = bmi;
                } else {
                    // BMI is 40 or greater, indicating Extreme Obesity
                    document.getElementById("current-height").innerHTML = height + " cm";
                    document.getElementById("weight-status").innerHTML = "Extreme Obesity";
                    document.getElementById("bmi-color").style.backgroundColor  = "#fc1c03";
                    document.getElementById("current-bmi").innerHTML = bmi;
                }
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });

        
    }
    