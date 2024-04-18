<?php
require_once "../config/wajib.php";
include '../include/head.php';

// Validasi parameter URL
if (!isset($_GET['id']) || !isset($_GET['album_id'])) {
    // Handle error or redirect to error page
    exit("Parameter tidak valid");
}

$id_gambar = $_GET['id'];
$id_album = $_GET['album_id'];

// Query untuk mengambil informasi gambar berdasarkan ID
$query = "SELECT * FROM gambar WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_gambar);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah gambar ditemukan
if ($result->num_rows === 0) {
    // Handle error or redirect
    exit("Gambar tidak ditemukan");
}

$gambar = $result->fetch_assoc();

// Proses formulir pengeditan jika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan
    $deskripsi = $_POST['deskripsi'];
    
    // Jika ada file yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
        // Hapus gambar lama
        unlink($gambar['url']);
        
        // Upload gambar baru
        $nama_file = $_FILES['gambar']['name'];
        $tujuan = '../uploads/' . $nama_file;
        $tmp_file = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp_file, $tujuan);
    } else {
        // Gunakan gambar yang sudah ada
        $nama_file = $gambar['nama'];
        $tujuan = $gambar['url'];
    }
    
    // Query untuk mengupdate deskripsi gambar
    $query_update = "UPDATE gambar SET nama = ?, deskripsi = ?, url = ? WHERE id = ?";
    $stmt_update = $conn->prepare($query_update);
    $stmt_update->bind_param("sssi", $nama_file, $deskripsi, $tujuan, $id_gambar);
    $stmt_update->execute();

    // Redirect kembali ke halaman album setelah pengeditan
    header("Location: ../view/lihat_album.php?id=" . $id_album);
    exit;
}
?>
<div class="pt-3"></div>
        <div class="container">
        <div class="card">
        <div class="card-body">
    <h1>Edit Gambar</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="gambar"><br><br>
        <textarea style="padding: 4px;" placeholder="Deskripsi" name="deskripsi"><?php echo htmlspecialchars($gambar['deskripsi']); ?></textarea><br>
        <input type="submit" value="Simpan">
    </form>
    </div>
    </div>
    </div>
<?php include '../include/footer.php'; ?>