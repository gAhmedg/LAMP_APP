<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

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

    // Insert user into the database
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        // Redirect to the index page after successful creation
        header("Location: index.php");
        exit();  // Always exit after sending a header
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
