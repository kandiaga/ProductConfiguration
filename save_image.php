<?php
session_start();
$image_data = $_POST['image'];
$image_data = str_replace('data:image/png;base64,', '', $image_data);
$image_data = str_replace(' ', '+', $image_data);
$image_data = base64_decode($image_data);
$file_name = 'design_' . date('YmdHis') . '_' . session_id() . '.png';
$file_path = 'designs/' . $file_name;
file_put_contents($file_path, $image_data);

// Save file name in database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voitures";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL statement to save file name and session ID
$stmt = $conn->prepare("INSERT INTO saved_images (session_id, file_name) VALUES (?, ?)");
$stmt->bind_param("ss", session_id(), $file_name);
$stmt->execute();
$stmt->close();

$conn->close();
?>