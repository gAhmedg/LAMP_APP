<?php
// Check if an ID is provided via GET (this assumes you pass the user ID in the URL as a query parameter)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection (adjust with your actual credentials)
    $servername = "db";
    $username = "myuser";
    $password = "mypassword";
    $dbname = "myappdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the DELETE SQL statement
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the main page after deletion
        header("Location: index.php");
        exit(); // Make sure to exit after header redirection
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided.";
}
?>
