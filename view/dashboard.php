<?php
include '../config/wajib.php';
include '../include/head.php';
$username = $_SESSION['username'];
?>

    <div class="content-wrapper">
        <div class="pt-3"></div>
        <div class="container">
        <div class="card">
        <div class="card-body">
            
            <h2>Welcome, <?php echo $username; ?>!</h2>
            
            <?php include '../component/album.php' ?>
            
        </div>
    </div>
    </div>
    </div>

<?php include '../include/footer.php'; ?>