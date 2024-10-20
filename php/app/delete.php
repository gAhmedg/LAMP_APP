<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE SQL statement
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the main page after deletion
        header("Location: index.php");
        exit(); // Exit after header redirection
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
