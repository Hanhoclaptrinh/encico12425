<?php
require_once 'server.php';

$stmt = $conn->prepare("SELECT * FROM lop");

if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['malop'] . "'>" . $row['tenlop'] . "</option>";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();