<?php

// Proses tambah album jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_album"])) {
    // Ambil data input
    $nama_album = $_POST["nama_album"];
    $deskripsi_album = $_POST["deskripsi_album"];
    $tanggal_album = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];

    // Masukkan data album ke dalam tabel album
    $sql_album = "INSERT INTO album (nama, deskripsi, tanggal, user_id) VALUES ('$nama_album', '$deskripsi_album', '$tanggal_album', '$user_id')";
    if ($conn->query($sql_album) === TRUE) {
        echo "Album berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql_album . "<br>" . $conn->error;
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3 style='margin-left: 30px;'>Ayo Buat Albummu Sendiri !</h3>
        <input style="margin-bottom: 10px; padding: 5px;" type="text" name="nama_album" placeholder="Nama Album" required><br>
        <textarea style="padding-left: 5px; padding-top: 4px;" name="deskripsi_album" placeholder="Deskripsi Album" rows="4" cols="40" required></textarea><br>
        <input class="btn-danger btn" type="submit" value="Tambahkan Album" name="tambah_album">
    </form>

    <h3 style="margin-top: 15px;">Daftar Album Saya</h3>
<?php
// Ambil data album dari tabel album
$sql_album = "SELECT * FROM album WHERE user_id = '" . $_SESSION['user_id'] . "'";
$result_album = $conn->query($sql_album);

if ($result_album->num_rows > 0) {
    // Output data dari setiap baris
    $nomor =1;
    while ($row_album = $result_album->fetch_assoc()) {
        echo "<button class='btn-danger btn album-card mb-1' data-album-id='" . $row_album["id"] . "'>" .$nomor.". ". $row_album["nama"] . "</button><br>";
        $nomor++;
    }
} else {
    echo "Belum ada album.";
}
?>
 <h3 style="margin-top: 15px;">Daftar Album Orang Lain</h3>
<?php
// Ambil data album dari tabel album
$sql_album = "SELECT * FROM album WHERE user_id != '" . $_SESSION['user_id'] . "'";
$result_album = $conn->query($sql_album);
if ($result_album->num_rows > 0) {
    // Output data dari setiap baris
    $nomor =1;
    while ($row_album = $result_album->fetch_assoc()) {
        echo "<button class='btn-danger btn album-card mb-1' data-album-id='" . $row_album["id"] . "'>" .$nomor.". ". $row_album["nama"] . "</button><br>";
        $nomor++;
    }
} else {
    echo "Belum ada album.";
}
?>

<script>
    // Menangani klik pada card album
    document.querySelectorAll('.album-card').forEach(item => {
        item.addEventListener('click', event => {
            const albumId = item.getAttribute('data-album-id');
            window.location.href = '../view/lihat_album.php?id=' + albumId; // Ganti '../view/lihat_album.php' dengan URL halaman "lihat album" Anda.
        });
    });
</script>
