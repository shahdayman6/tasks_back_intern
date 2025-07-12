<?php
include'db.php';
$read=$conn->query("SELECT*FROM users");
if ($read->num_rows > 0) {
    while($row = $read->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - FName: " . $row["fname"]." - LName: " . $row["lname"]. " - Age: " . $row["age"]. "<br>";
    }
} else {
    echo "No data found";
}
?>