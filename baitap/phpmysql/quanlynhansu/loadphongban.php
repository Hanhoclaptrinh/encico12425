<?php
require_once 'server.php';

$stmt = $conn->prepare("SELECT * FROM phongban");

if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['phg'] . "'>" . $row['tenphg'] . "</option>";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();