<?php
require_once('../config/wajib.php');
include '../include/head.php';

// Periksa apakah parameter ID album ada dalam URL
if (isset($_GET['id'])) {
    $album_id = $_GET['id'];

    // Query untuk mengambil detail album berdasarkan ID
    $sql = "SELECT * FROM album WHERE id = $album_id";
    $result = $conn->query($sql);

    // Query untuk mengambil gambar-gambar dalam album
    $sql_gambar = "SELECT * FROM gambar WHERE album_id = $album_id and user_id = " . $_SESSION['user_id'] . " ORDER BY id DESC";
    $result_gambar = $conn->query($sql_gambar);

    $sql_gambar1 = "SELECT * FROM gambar WHERE album_id = $album_id and user_id != " . $_SESSION['user_id'] . " ORDER BY id DESC";
    $result_gambar1 = $conn->query($sql_gambar1);


    // Jika album ditemukan
    if ($result->num_rows > 0) {
        $album = $result->fetch_assoc();
?>

<div class="pt-3"></div>
        <div class="container">
        <div class="card">
        <div class="card-body">
    <h1><?php echo $album["nama"]; ?></h1>
    <p>Deskripsi: <?php echo $album["deskripsi"]; ?></p>
    <!-- Tambahkan tautan atau tampilan lainnya sesuai kebutuhan -->

    <form action="../process/gambar.php" method="post" enctype="multipart/form-data">


        <label for="gambar">Pilih Foto :</label><br>
        <input class='btn btn-danger' type="file" id="gambar" name="gambar"><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi"></textarea><br><br>
        <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="album_id" value="<?php echo $album_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input class="btn btn-danger" type="submit" value="Upload Foto">
    </form>
    </div>
    </div>
    </div>

    <div class="pt-3"></div>
        <div class="container">
        <div class="card">
        <div class="card-body">
    <?php
            // Tampilkan gambar-gambar saya dalam album
            if ($result_gambar->num_rows > 0) {
                echo "foto saya: <br>";
                while ($gambar = $result_gambar->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $gambar['url'] . "' alt='" . $gambar['deskripsi'] . "'></td><br>";
                    echo "<td>" . $gambar['deskripsi'] . "</td>";

                    // Tampilkan form like button
                    echo "<td><form action='../process/like.php' method='post'>";
                    echo "<input type='hidden' name='gambar_id' value='" . $gambar['id'] . "'>";
                    ?>
                    <input type='hidden' name='user_id' value='<?php echo $_SESSION['user_id']; ?>'>
                    <input type='hidden' name='album_id' value='<?php echo $album_id; ?>'>
                    <?php
                    // Tampilkan jumlah like
                    $query_like = "SELECT COUNT(*) AS jumlah_like FROM likefoto WHERE gambar_id = " . $gambar['id'];
                    $result_like = $conn->query($query_like);
                    $row_like = $result_like->fetch_assoc();
                    echo "<td>" . $row_like['jumlah_like'] . " </td>";
                    echo "<button class='btn-sm btn-danger mt-2 mb-1' type='submit' name='like'>Like</button>";
                    echo "</form></td>";

                    // Tampilkan form input text untuk komentar
                    echo "<td><form action='../process/comment.php' method='post'>";
                    echo "<input type='hidden' name='gambar_id' value='" . $gambar['id'] . "'>";
                    echo "<input type='text' style='margin-top: 4px;' name='comment' placeholder='Tambahkan komentar...'>";
                    ?>
                    <input type='hidden' name='user_id' value='<?php echo $_SESSION['user_id']; ?>'>
                    <input type='hidden' name='album_id' value='<?php echo $album_id; ?>'>
                    <?php
                    echo "<button class='btn-sm btn-danger' type='submit' name='submit_comment'>Komentar</button>";
                    echo "</form></td>";

                    // Tampilkan tombol edit dan hapus gambar
                    
                    echo "<td><a style='margin-right: 5px;' href='../view/edit_image.php?id=" . $gambar['id'] . "&album_id=" . $album_id . "'>Edit</a></td>";
                    echo "<td><a style='margin-right: 6px' href='#" . $gambar['id'] . "&album_id=" . $album_id . "'>Hapus</a></td>";


                    echo "</tr>";

                    // Tampilkan semua komentar
                    $query_comment = "SELECT * FROM komen WHERE gambar_id = " . $gambar['id'];
                    $result_comment = $conn->query($query_comment);
                    echo "<tr><td colspan='5'><strong>Komentar:</strong></td></tr><br>";
                    if ($result_comment->num_rows > 0) {
                        while ($comment = $result_comment->fetch_assoc()) {
                            echo "<tr><td colspan='5'>" . $comment['user_id'] . ": " . $comment['komen'] . "</td></tr><br>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Belum ada komentar untuk gambar ini.</td></tr><br>";
                    }
                }
            } else {
                echo "<tr><td colspan='5'>belum ada foto saya dalam album ini.</td></tr><br><br>";
            }
            ?>
            </div>
    </div>
    </div>

    <div class='pt-3'></div>
                <div class='container'>
                <div class='card'>
                <div class='card-body'>
    <?php
            
            

            // Tampilkan gambar-gambar orang lain dalam album
            if ($result_gambar1->num_rows > 0) {
                echo "foto orang lain: <br>";
                while ($gambar = $result_gambar1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $gambar['url'] . "' alt='" . $gambar['deskripsi'] . "'></td><br>";
                    echo "<td>" . $gambar['deskripsi'] . "</td>";


                    // Tampilkan form like button
                    echo "<td><form action='../process/like.php' method='post'>";
                    echo "<input type='hidden' name='gambar_id' value='" . $gambar['id'] . "'>";
                    ?>
                    <input type='hidden' name='user_id' value='<?php echo $_SESSION['user_id']; ?>'>
                    <input type='hidden' name='album_id' value='<?php echo $album_id; ?>'>
                    <?php
                    // Tampilkan jumlah like
                    $query_like = "SELECT COUNT(*) AS jumlah_like FROM likefoto WHERE gambar_id = " . $gambar['id'];
                    $result_like = $conn->query($query_like);
                    $row_like = $result_like->fetch_assoc();
                    echo "<td>" . $row_like['jumlah_like'] . " </td>";
                    echo "<button class='btn-sm btn-danger mt-2 mb-1' type='submit' name='like'>Like</button>";
                    echo "</form></td>";

                    // Tampilkan form input text untuk komentar
                    echo "<td><form action='../process/comment.php' method='post'>";
                    echo "<input type='hidden' name='gambar_id' value='" . $gambar['id'] . "'>";
                    echo "<input type='text' style='margin-top: 4px;' name='comment' placeholder='Tambahkan komentar...'>";
                    ?>
                    <input type='hidden' name='user_id' value='<?php echo $_SESSION['user_id']; ?>'>
                    <input type='hidden' name='album_id' value='<?php echo $album_id; ?>'>
                    <?php
                    echo "<button class='btn-sm btn-danger' type='submit' name='submit_comment'>Komentar</button>";
                    echo "</form></td>";

                    // Tampilkan tombol edit dan hapus gambar
                    if ($gambar['user_id'] == $_SESSION['user_id']) {
                        echo "<td><a href='../view/edit_image.php?id=" . $gambar['id'] . "&album_id=" . $album_id . "'>Edit</a></td>";
                        echo "<td><a href='../process/delete_image.php?id=" . $gambar['id'] . "&album_id=" . $album_id . "'>Hapus</a></td>";
                    }


                    echo "</tr>";

                    // Tampilkan semua komentar
                    $query_comment = "SELECT * FROM komen WHERE gambar_id = " . $gambar['id'];
                    $result_comment = $conn->query($query_comment);
                    echo "<tr><td colspan='5'><strong>Komentar:</strong></td></tr><br>";
                    if ($result_comment->num_rows > 0) {
                        while ($comment = $result_comment->fetch_assoc()) {
                            echo "<tr><td colspan='5'>" . $comment['user_id'] . ": " . $comment['komen'] . "</td></tr><br>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Belum ada komentar untuk gambar ini.</td></tr><br>";
                    }
                }
            } else {
                echo "<tr><td colspan='5'>belum ada foto orang lain dalam album ini.</td></tr><br><br>";
            }
            ?>
            </div>
    </div>
    </div>


    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 150px;
        max-height: 150px;
    }
    </style>



<?php
    } else {
        // Jika album tidak ditemukan
        echo "Album tidak ditemukan.";
    }
} else {
    // Jika parameter ID album tidak ada dalam URL
    echo "ID album tidak diberikan.";
}
?>
<?php include '../include/footer.php'; ?>