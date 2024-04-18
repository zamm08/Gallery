<?php
//waktu jakarta
date_default_timezone_set('Asia/Jakarta');
//koneksi ke database
require_once '../config/db.php';
//biar $_SESSION bisa dipakai
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}
?>