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
    $id = $_POST['id'];
    $value = $_POST['value'];

    // Extract the column name and item number from the id
    preg_match('/([a-z_]+)(\d+)/', $id, $matches);
    $column = $matches[1];
    $item_number = $matches[2];

    // Update the database
    $sql = "UPDATE totals SET $column = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('di', $value, $item_number);
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>