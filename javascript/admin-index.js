function set_Dashboard_VAL(){
    $.ajax({
        url: 'index_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update the respective HTML elements with the fetched data
            $('#todaysEarningValue').text('₱ ' + response.today_sales_sum);
            $('#thimonthEarningValue').text('₱ ' + response.this_month_sum);
            $('#active_members').text(response.total_users);
            $('#total_pending').text(response.total_pending_registration);
            $('#total_request').text(response.total_pending_request);
            $('#present_member').text(response.present_Today);
            
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
  }
  // Function to fetch data from the server
  function fetchData(option) {
    // Send AJAX request to fetch data from fetch_sales_data.php with selected option
    $.ajax({
      url: 'fetch_sales_data.php?option=' + option,
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Update chart with new data
        updateChart(response.months, response.total_sales);
      },
      error: function(xhr, status, error) {
        console.error('Error fetching data:', error);
      }
    });
  }

  // Function to update the chart with new data
  function updateChart(months, total_sales) {
    // Update chart data and x-axis categories
    chart.updateOptions({
      xaxis: {
        categories: months
      },
    });

    // Update series data
    chart.updateSeries([{
      data: total_sales
    }]);
  }

  // Initial chart configuration
  var options = {
    chart: {
      type: 'area',
      height: '350px',
      toolbar: {
        show: true, // Show the toolbar
        tools: {
          zoom: false, // Hide the zoom icon
          pan: false, // Hide the pan icon
          download: true, // Show the download icon
          selection: true, // Show the selection icon
          reset: true, // Show the reset icon
          customIcons: [] // Hide any custom icons (if present)
        }
      }
    },
    series: [{
      name: 'Total Sales',
      data: [], // Initial empty data
    }],
    xaxis: {
      categories: [], // Initial empty categories
    },
  };

  // Create the chart
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();

  // Fetch data initially and every 5 seconds for the selected option
  var selectedOption = $('#optionSelect').val(); // Default option is 'Month'
  fetchData(selectedOption); // Fetch data initially for the default option

  $('#optionSelect').on('change', function() {
    selectedOption = $(this).val(); 
    fetchData(selectedOption);
  });

  // // Event listener for dropdown options
  // $('#weekOption').on('click', function() {
  //   selectedOption = 'week';
  //   fetchData(selectedOption);
  // });

  // $('#monthOption').on('click', function() {
  //   selectedOption = 'month';
  //   fetchData(selectedOption);
  // });

  // $('#yearOption').on('click', function() {
  //   selectedOption = 'year';
  //   fetchData(selectedOption);
  // });



  function goTo(location){
    if(location == "forApproval"){
      window.location.href = 'forApproval.php';

    }
    else if(location == "member_status"){
      window.location.href = 'member_status.php';

    }
    else if(location == "exercise"){
      window.location.href = 'exercise.php';

    }
    else if(location == "food"){
      window.location.href = 'food.php';

    }
    else if(location == "subscription"){
      window.location.href = 'paymentRequest.php';

    }
    else if(location == "sales"){
      window.location.href = 'sales_list.php';

    }
    else if(location == "attendance"){
      window.location.href = 'attendance.php';

    }
    else{
      window.location.href = 'admin-index.php';

    }
    
  }
   
  set_Dashboard_VAL();
  setInterval(function() {
    var selectedOption = $('#optionSelect').val();
    fetchData(selectedOption);
  }, 3000);

  setInterval(set_Dashboard_VAL, 3000); 
