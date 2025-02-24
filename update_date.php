<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "financial_dues";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_date = $_POST['report_date'];

    // Update the report date in the database
    $sql = "INSERT INTO report_dates (report_date) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $report_date);
    if ($stmt->execute()) {
        echo "Date updated successfully";
    } else {
        echo "Error updating date: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
