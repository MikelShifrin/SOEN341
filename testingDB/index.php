<?php
$servername = "ec2-23-21-92-251.compute-1.amazonaws.com";
$username = "tynrrnfvnesgly";
$password = "2ceea303af5c85f704098528a6a4e5e6674ad3f481f41bda62512567522d2cbc";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>