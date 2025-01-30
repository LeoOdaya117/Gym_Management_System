// Declare userDetails variable outside the functions
var userDetails;

$(document).ready(function () {
    // Function to fetch user details from the server
    function fetchUserDetails() {
        $.ajax({
            type: "GET",
            url: "fetch_user_details.php",
            dataType: "json",
            success: function (response) {
                userDetails = response;
                setProfile();
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });
    }

    // Function to fetch weight data from the server
    function fetchWeightData() {
        $.ajax({
            type: "GET",
            url: "fetch_weight_data.php",
            dataType: "json",
            success: function (response) {
                console.log("Weight data retrieved:", response);
                renderWeightChart(response.weights, response.dates);
            },
            error: function (error) {
                console.error("Error fetching weight data:", error);
            }
        });
    }

    // Function to set user profile details
    function setProfile() {
        var bmival = userDetails.BMI;
        var height = userDetails.Height;

        if (userDetails.Height != null && userDetails.Weight != null) {
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
    }

    // Function to render weight chart
    function renderWeightChart(weights, dates) {
      var weightLogsSeries = {
          name: 'Weight Logs',
          data: weights
      };

      // Dummy data for weight goal
      var weightGoalData = [97.50, 96.50, 95.50, 95]; // Replace with your actual weight goal values
      var weightGoalSeries = {
          name: 'Weight Goal',
          data: weightGoalData
      };

      var options = {
        chart: {
            type: 'line',
            stacked: false,
            height: 225,
            width: '100%',
            toolbar: {
                show: false,
                position: 'bottom',
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        series: [weightLogsSeries, weightGoalSeries],
        xaxis: {
            type: 'datetime',
            categories: dates, // Use the dates array for x-axis categories
            labels: {
                formatter: function (value) {
                    // Optionally format the date here if needed
                    return new Date(value).toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value.toFixed(2);
                }
            }
        },
        legend: {
            position: 'top'
        }
    };


      var chart = new ApexCharts(document.querySelector("#weightchart"), options);
      chart.render();
    }



    // Function to calculate BMI
    function calculateBMI(weightKg, heightCm) {
        var heightM = heightCm / 100;
        var bmi = weightKg / (heightM * heightM);
        return bmi.toFixed(2);
    }

    // Initial data fetching
    fetchUserDetails();
    fetchWeightData();

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
                // window.location.href = "index.php";
                fetchUserDetails();
                fetchWeightData();
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
                  // window.location.href = "index.php";
                  fetchUserDetails();
                  fetchWeightData();
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


