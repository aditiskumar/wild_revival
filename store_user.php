<?php
// Retrieve values from POST request
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// Create a database connection
$mysqli = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Insert user data into the table
$query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
mysqli_stmt_execute($stmt);

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>
