<?php
require_once '../config/wajib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi inputan
    $gambar_id = mysqli_real_escape_string($conn, $_POST['gambar_id']);
    $komentar = mysqli_real_escape_string($conn, $_POST['comment']);
    // Anda juga perlu mengambil user_id dari sesi atau dari formulir tergantung pada cara Anda menangani otentikasi pengguna
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']); // Misalnya, user dengan id 1
    $album_id = mysqli_real_escape_string($conn, $_POST['album_id']);
    
    // Persiapkan statement SQL dengan parameterized query
    $insert_query = "INSERT INTO komen (gambar_id, user_id, komen, tanggal) VALUES (?, ?, ?, NOW())";
    
    // Persiapkan statement
    $statement = $conn->prepare($insert_query);
    
    // Bind parameter dan eksekusi statement
    $statement->bind_param("iis", $gambar_id, $user_id, $komentar);
    if ($statement->execute()) {
        echo "Komentar berhasil ditambahkan";
        header("Location: ../view/lihat_album.php?id=" . $album_id); // Ganti '../view/lihat_album.php' dengan URL halaman "lihat album" Anda.
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>
