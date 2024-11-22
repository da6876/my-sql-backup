<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';

// Connect to MySQL server
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all database names
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $count=0;
    while ($row = $result->fetch_assoc()) {
        $count++;
        echo $count." => ".$row['Database'] . "<br>";
    }
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>