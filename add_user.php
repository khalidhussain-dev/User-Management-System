<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $name = trim($_POST['name']);
    $company_id = intval($_POST['company_id']);
    $role_id = intval($_POST['role_id']);
    $username = trim($_POST['username']);
    $pwd = trim($_POST['pwd']);

    // Check if mandatory fields are provided
    if (empty($name) || empty($company_id) || empty($role_id) || empty($username) || empty($pwd)) {
        die("Error: All fields are required.");
    }

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO users (Company_Id, Role_Id, Name, User, pwd) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the variables to the placeholders
        $stmt->bind_param("iisss", $company_id, $role_id, $name, $username, $pwd);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "User added successfully";
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
