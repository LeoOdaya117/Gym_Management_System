$(document).ready(function() {
    new DataTable('#example');
    
    $('#walkinbtn').on('click', function() {
        const customer_name = $('#customer_name').val(); // Using jQuery to get value
        walkinID(customer_name); // Call function with customer name
    });

    function walkinID(customer_name) {
        $.ajax({
            url: 'API/create_walkin_id.php',
            success: function(response) {
                const id = response; // Assuming response from server is the ID
                console.log(id, customer_name);
                const url = `transact.php?walkinno=${id}&walkinname=${customer_name}`;
                window.location.href = url;
            },
            error: function(xhr, status, error) {
                console.error('Error fetching GYM WALK IN ID:', error);
            }
        });
    }

    // Function to populate the table with data
    function populateWalkInTable(searchTerm = '') {
        $.ajax({
            url: 'API/get_walkin_list.php',
            success: function(response) {
                console.log(response); // Debug: Log the response to inspect
    
                // Ensure response is parsed correctly as JSON (if needed)
                if (typeof response === 'string') {
                    try {
                        response = JSON.parse(response); // Try parsing the response
                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                        response = []; // Set empty array as fallback
                    }
                }
    
                // Get reference to the table body
                var tableBody = $('#walkin_table_body');
    
                // Clear existing rows
                tableBody.empty();
    
                // Filtered response based on search term
                var filteredResponse = response.filter(function(item) {
                    // Add null checks before accessing properties
                    if (item.FullName && item.dueDate) {
                        return (
                            item.FullName.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            item.dueDate.toLowerCase().includes(searchTerm.toLowerCase())
                        );
                    }
                    return false;
                });
    
                // Check if filtered response contains any data
                if (filteredResponse.length > 0) {
                    // Data is available, populate the table with rows
                    filteredResponse.forEach(function(item, index) {
                        var row = $('<tr>');
    
                        // Convert dueDate string to Date object
                        var dueDate = new Date(item.dueDate);
                        var today = new Date();
    
                        console.log('Due Date:', dueDate);
                        console.log('Today:', today);
    
                        // Compare dueDate with today's date
                        var isPastDue = dueDate < today;
                        console.log('Is Past Due?', isPastDue);
    
                        // Append cells (columns) to the row with item data
                        row.append($('<td>').text(index + 1)); // Display row number (1-based)
                        row.append($('<td>').text(item.FullName)); // Display Full Name
                        var dueDateCell = $('<td>').text(item.dueDate);
                        
                        // Add the bg-danger class if past due
                        if (isPastDue) {
                            dueDateCell.addClass('bg-danger');
                        }
    
                        row.append(dueDateCell); // Append the table cell (Due Date) to the row
    
                        var buttonCell = $('<td>'); // Create a new table cell
                        var buttonLink = $('<a>'); // Create a new <a> tag for the button
                        buttonLink.addClass('btn btn-sm btn-success approve-button mr-1'); // Add classes to the <a> tag
                        buttonLink.attr('href', `transact.php?walkinno=${item.membershipid}&walkinname=${item.FullName}`); // Set href attribute for the link
                        buttonLink.attr('title', 'Add Subscription'); // Set title attribute for the link
                        buttonLink.text('Add Plan'); // Set text content for the link
                        buttonCell.append(buttonLink); // Append the <a> tag to the table cell
    
                        row.append(buttonCell); // Append the table cell (containing the button) to the row
                        tableBody.append(row); // Append the row to the table body
                    });
                } else {
                    // No matching data found, display a message in the table
                    var messageRow = $('<tr>');
                    var messageCell = $('<td colspan="3" class="text-center">').text('No matching records found');
                    messageRow.append(messageCell);
                    tableBody.append(messageRow);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching walk-in list:', error);
            }
        });
    }
    
    

    // Event listener for modal shown event
    $('#list').on('shown.bs.modal', function() {
        // Populate the table when modal is shown initially
        populateWalkInTable();

        // Event listener for keyup event in the search input
        $('#search_walkin').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            // Update the table based on the search term
            populateWalkInTable(searchTerm);
        });
    });

    // Optional: Event listener for Transact button click
    $('#walkinbtn').on('click', function() {
        // Add your transact functionality here
        // This will execute when the Transact button is clicked
        console.log('Transact button clicked');
    });
});
