<?php
require_once('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO cobatabel (user, pw, email, namaLengkap, alamat) VALUES ('$username', '$password', '$email', '$fullname', '$address')";

    if ($conn->query($sql) === TRUE) {
        // Pendaftaran berhasil
        header("Location: ../index.php");
        exit;
    } else {
        // Pendaftaran gagal
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>