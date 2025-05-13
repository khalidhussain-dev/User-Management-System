<?php
include 'db.php';

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM users");

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['Company_Id']}</td>
                <td>{$row['Role_Id']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['User']}</td>
                <td>
                    <button class='btn btn-warning btn-sm edit-btn' data-id='{$row['ID']}'>Editar</button>
                    <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['ID']}'>Eliminar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No users found</td></tr>";
}
