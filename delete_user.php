<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $id = intval($_POST['id']); // Ensure the ID is an integer

    // Check if the ID is valid
    if (empty($id)) {
        die("Error: ID is required.");
    }

    // Prepare the SQL statement with a placeholder
    $sql = "DELETE FROM users WHERE ID = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the variable to the placeholder
        $stmt->bind_param("i", $id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "User deleted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
