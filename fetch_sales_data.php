<?php 

include('config.php');

$months = [];
$total_sales = [];
$sql ="";
// Define the default option if not provided
$option = isset($_GET['option']) ? $_GET['option'] : 'month';

// Fetch data from the sales table and group by the selected option
if ($option === 'week') {
    // Modify the SQL query to group by week
    $sql = "SELECT YEAR(payment_date) AS year, WEEK(payment_date, 1) AS week, SUM(price) AS total_sales 
            FROM sales WHERE `status` = 'Complete'
            GROUP BY YEAR(payment_date), WEEK(payment_date, 1)";
} elseif ($option === 'month') {
    // Modify the SQL query to group by month
    $sql = "SELECT DATE_FORMAT(payment_date, '%Y-%m') AS month, SUM(price) AS total_sales 
            FROM sales WHERE `status` = 'Complete'
            GROUP BY DATE_FORMAT(payment_date, '%Y-%m')";
} elseif ($option === 'year') {
    // Modify the SQL query to group by year
    $sql = "SELECT YEAR(payment_date) AS year, SUM(price) AS total_sales 
            FROM sales WHERE `status` = 'Complete'
            GROUP BY YEAR(payment_date)";
}
else{
    $sql = "SELECT DATE_FORMAT(payment_date, '%Y-%m') AS month, SUM(price) AS total_sales 
            FROM sales WHERE `status` = 'Complete'
            GROUP BY DATE_FORMAT(payment_date, '%Y-%m')";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$sales_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Extracting month names and total sales
foreach ($sales_data as $data) {
    if ($option === 'week') {
        // Format week as "Week Year"
        $months[] = 'Week ' . $data['week'] . ' ' . $data['year'];
    } elseif ($option === 'month') {
        // Format month as "Month Year"
        $months[] = date("F Y", strtotime($data['month'] . '-01'));
    } elseif ($option === 'year') {
        // Format year as "Year"
        $months[] = $data['year'];
    }
    else{
        $months[] = date("F Y", strtotime($data['month'] . '-01'));
    }
    $total_sales[] = $data['total_sales']; // Extract total sales
}

$data = [
    'months' => $months,
    'total_sales' => $total_sales,
];

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);

?>
