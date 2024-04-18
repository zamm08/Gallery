<?php
require_once '../config/wajib.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar_id = $_POST['gambar_id'];
    // Anda juga perlu mengambil user_id dari sesi atau dari formulir tergantung pada cara Anda menangani otentikasi pengguna
    $user_id = $_POST['user_id']; // Misalnya, user dengan id 1
    $album_id = $_POST['album_id'];
    
    // Prevent SQL Injection
    $gambar_id = mysqli_real_escape_string($conn, $gambar_id);
    $user_id = mysqli_real_escape_string($conn, $user_id);
    
    // Periksa apakah pengguna telah memberikan like sebelumnya
    $check_query = "SELECT * FROM likefoto WHERE gambar_id = '$gambar_id' AND user_id = '$user_id'";
    $check_result = $conn->query($check_query);
    
    if ($check_result->num_rows == 0) {
        // Jika pengguna belum memberikan like, tambahkan like
        $insert_query = "INSERT INTO likefoto (gambar_id, user_id, tanggal) VALUES ('$gambar_id', '$user_id', NOW())";
        if ($conn->query($insert_query) === TRUE) {
            echo "Like berhasil ditambahkan";
            header("Location: ../view/lihat_album.php?id=" . $album_id); // Ganti '../view/lihat_album.php' dengan URL halaman "lihat album" Anda.
            exit(); // Exit script after redirection
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error; // Use $conn->error instead of $mysqli->error
        }
    } else {
        echo "Anda sudah memberikan like pada gambar ini";
        header("Location: ../view/lihat_album.php?id=" . $album_id); // Ganti '../view/lihat_album.php' dengan URL halaman "lihat album" Anda.
        exit(); // Exit script after redirection
    }
}
?>
