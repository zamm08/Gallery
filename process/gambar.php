<?php
require_once '../config/wajib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $album_id = $_POST['album_id'];
    $user_id = $_POST['user_id'];
    $nama_file = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // Cek apakah file telah diunggah tanpa masalah
    if ($error === 0) {
        
        // Lokasi penyimpanan file gambar di server (misalnya folder 'uploads')
        $tujuan = '../uploads/' . $nama_file;

        // Pindahkan file yang diunggah ke folder tujuan
        if (move_uploaded_file($tmp_file, $tujuan)) {
            //Hash Password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Query untuk menyimpan informasi gambar ke dalam tabel "gambar"
            $sql = "INSERT INTO gambar (nama, url, deskripsi, tanggal, album_id, user_id) VALUES ('$nama_file', '$tujuan', '$deskripsi', '$tanggal', '$album_id', '$user_id')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Gambar berhasil diunggah.";
                header("Location: ../view/../view/lihat_album.php?id=" . $album_id); // Ganti '../view/lihat_album.php' dengan URL halaman "lihat album" Anda.
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Maaf, terjadi kesalahan: " . $error;
    }
} else {
    echo "Akses tidak diizinkan.";
}
