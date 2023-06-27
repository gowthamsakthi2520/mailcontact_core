<?php
$name = $_POST["name"];
$email = $_POST["email"];
$qualification = $_POST["qualification"];
$number = $_POST["number"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maildata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO formdatas (id, name, email,qualification,number)
VALUES ('NULL','$name','$email', '$qualification', '$number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  
  

?>