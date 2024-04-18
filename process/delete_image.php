<?php
require_once '../config/wajib.php';

if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['album_id']) || empty($_GET['album_id'])) {
    header("Location: ../index.php");
    exit;
}

$id_gambar = $_GET['id'];
$id_album = $_GET['album_id'];

// Query untuk mengambil URL gambar berdasarkan ID
$query_select_gambar = "SELECT url FROM gambar WHERE id = ?";
$stmt_select = $conn->prepare($query_select_gambar);
if (!$stmt_select) {
    die("Error dalam query: " . $conn->error);
}
$stmt_select->bind_param("i", $id_gambar);
if (!$stmt_select->execute()) {
    die("Error dalam mengeksekusi query: " . $stmt_select->error);
}
$result = $stmt_select->get_result();
$gambar = $result->fetch_assoc();
$url_gambar = $gambar['url'];

// Hapus file gambar dari sistem file
if (unlink($url_gambar)) {
    // Setelah file dihapus, baru hapus data gambar dari database
    $query_delete = "DELETE FROM gambar WHERE id = ?";
    $stmt_delete = $conn->prepare($query_delete);
    if (!$stmt_delete) {
        die("Error dalam query: " . $conn->error);
    }
    $stmt_delete->bind_param("i", $id_gambar);
    if ($stmt_delete->execute()) {
        // Redirect kembali ke halaman album setelah penghapusan
        header("Location: ../view/../view/lihat_album.php?id=" . $id_album);
        exit;
    } else {
        echo "Error: Gagal menghapus data gambar dari database.";
    }
} else {
    echo "Error: Gagal menghapus file gambar.";
}