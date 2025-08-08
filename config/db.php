<?php
$conn = mysqli_connect(
    "localhost", // Hostname
    "root", // Username
    "", // Password
    "simple_math_game" // Database Name
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>