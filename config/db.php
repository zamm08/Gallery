<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "coba"; // Ganti "namadatabase" dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Check koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
