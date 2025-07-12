<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<h2>Users List</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['age']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

echo "<br><br><a href='./index.php'><button>🔙 Back to User Management</button></a>";

$conn->close();
?>