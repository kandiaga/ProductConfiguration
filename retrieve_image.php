<?php
session_start();

// Retrieve file name based on session ID from the database
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

// Prepare and execute SQL statement to retrieve file name
$stmt = $conn->prepare("SELECT file_name FROM saved_images WHERE session_id = ?  ORDER BY id_temp DESC");
$session_id = session_id(); // Storing session_id() in a variable
$stmt->bind_param("s", $session_id); // Pass the variable by reference
$stmt->execute();
$stmt->bind_result($file_name);

// Array to store file names
$saved_images = array();

// Fetch all file names
while ($stmt->fetch()) {
    $saved_images[] = $file_name;
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Saved Designs</title>
</head>
<body>

<h1>Saved Designs</h1>

<div class="designs">
<?php
// Display the saved image if it exists
// Loop through saved images array and display each image

foreach ($saved_images as $image) {
  //if ($file_name) {
    echo '<img src="designs/' . $image. '" alt="Saved Design"><br>';
  //}
}
?>
</div>

</body>
</html>

