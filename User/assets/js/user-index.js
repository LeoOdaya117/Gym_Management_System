
  // Declare userDetails variable outside the functions
  var userDetails;

  function setProfile() {
    $.ajax({
        type: "GET",
        url: "fetch_user_details.php",
        dataType: "json",
        success: function (response) {
            var userDetails = response;

            var bmival = userDetails.BMI;
            var height = userDetails.Height;

            if (userDetails.Height != null && userDetails.Weight != null) {
                // Calculate BMI only if it's not null
                bmival = calculateBMI(userDetails.Weight, height);
                document.getElementById("current-bmi").innerHTML = bmival;

                // Set weight status and BMI color based on BMI value
                if (bmival < 18.5) {
                    document.getElementById("weight-status").innerHTML = "Underweight";
                    document.getElementById("bmi-color").style.backgroundColor = "#036bfc";
                } else if (bmival >= 18.5 && bmival <= 24.9) {
                    document.getElementById("weight-status").innerHTML = "Normal";
                    document.getElementById("bmi-color").style.backgroundColor = "#007bff";
                } else if (bmival >= 25 && bmival <= 29.9) {
                    document.getElementById("weight-status").innerHTML = "Overweight";
                    document.getElementById("bmi-color").style.backgroundColor = "#03b5fc";
                } else if (bmival >= 30 && bmival <= 34.9) {
                    document.getElementById("weight-status").innerHTML = "Obesity Class I";
                    document.getElementById("bmi-color").style.backgroundColor = "#fcce03";
                } else if (bmival >= 35 && bmival <= 39.9) {
                    document.getElementById("weight-status").innerHTML = "Obesity Class II";
                    document.getElementById("bmi-color").style.backgroundColor = "#fc7703";
                } else {
                    document.getElementById("weight-status").innerHTML = "Extreme Obesity";
                    document.getElementById("bmi-color").style.backgroundColor = "#fc1c03";
                }
            } else {
                document.getElementById("current-bmi").innerHTML = "No Data";
                document.getElementById("weight-status").innerHTML = "No Data";
                document.getElementById("bmi-color").style.backgroundColor = "#000000";
            }

            // Set current weight and height, handling null values
            document.getElementById("current-weight").innerHTML = userDetails.Weight != null ? userDetails.Weight + " kg" : "No Data";
            document.getElementById("current-height").innerHTML = height != null ? height + " cm" : "No Data";
        },
        error: function (error) {
            console.error("Error fetching user details:", error);
        }
    });
}


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
        //alert(userDetails.AccountType);


        fetchWeightData();
        setProfile();
      
    
        
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
  var ctx = document.getElementById('weightchart').getContext('2d');

  // Create the line chart
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });

  // Fetch user details and weight data initially
  fetchUserDetails();
  fetchWeightData();
  setProfile();


  $(document).ready(function () {
    $("#submitHeighttBtn").click(function () {
        var height = $("#heighttInput").val();
        $.ajax({
            type: "POST",
            url: "save_height.php",
            data: { height: height },
            success: function (response) {

              if(response == "Success"){
                Swal.fire({
                  icon: "success",
                  title: "Success",
                  text: "Height saved successfully!",
                  showConfirmButton: true,
                }).then(function () {
                  window.location.href = "index.php";
              });
              
                
              }
              else{
                Swal.fire({
                  icon: "error",
                  title: "Result",
                  text: response,
                  showConfirmButton: true,
              });
              }
                
                $("#heightChangeModal").modal("hide");
                
            }
        
        });
    });

    $("#submitWeightBtn").click(function () {
        var weight = $("#weightInput").val();
        $.ajax({
            type: "POST",
            url: "save_weight.php",
            data: { weight: weight },
            success: function (response) {

              response = response.trim();
              if(response == "Success"){
                  Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Weight saved successfully!",
                    showConfirmButton: true,
                  }).then(function () {
                    window.location.href = "index.php";
                  });

                  
                  
              }
              else{
                  Swal.fire({
                    icon: "error",
                    title: "Result",
                    text: response,
                    showConfirmButton: true,
                });
              }

              $("#weightLogModal").modal("hide");
              
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
    
    function test(){
      alert("alert");
    }


    document.addEventListener("DOMContentLoaded", onPageLoad);
    window.onload = setProfile();
    