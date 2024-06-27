<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$newUsername = $_POST['newUsername'];
$newEmail = $_POST['newEmail'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

if ($newPassword === $confirmPassword) {
  // Insert new user data into the database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$newUsername', '$newEmail', '$newPassword')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: login_page.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "Passwords do not match";
}

$conn->close();
?>
