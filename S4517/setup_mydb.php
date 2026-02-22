<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS mydb";
$conn->query($sql);

$conn->select_db("mydb");

$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";
$conn->query($sql);

$sql = "CREATE INDEX idx_email ON MyGuests(email)";
$conn->query($sql);

echo "Database and table setup complete!";
$conn->close();
?>