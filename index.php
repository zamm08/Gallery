 <?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: view/dashboard.php");
    exit;
}

// Masukkan pesan kesalahan jika ada
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'config/db.php'; // Sesuaikan dengan path ke file db.php
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan sanitasi terhadap input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT id FROM cobatabel WHERE user = '$username' AND pw = '$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            // Login berhasil
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        
            header("Location: view/dashboard.php");
            exit;
        } else {
            // Login gagal
            $error_message = "Invalid username or password!";
        }
    } else {
        // Error saat menjalankan kueri SQL
        $error_message = "Database query error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="anakstan - sinergi bersama">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>galeriweb</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.png">
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/baguetteBox.min.css">
    <link rel="stylesheet" href="css/rangeslider.css">
    <link rel="stylesheet" href="css/vanilla-dataTables.min.css">
    <link rel="stylesheet" href="css/apexcharts.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="manifest.json">
</head>

<body>
    <div class="container">
        <div class="pt-3"></div>
        <div class="card">
            <div class="card-body text-center">
                <h2>Login</h2>
                <!-- Tambahkan pesan kesalahan jika ada -->
                <?php if (!empty($error_message)): ?>
                <p><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form action="index.php" method="post">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Login">
                </form>
                <p>Belum punya akun? <a href="view/register.php">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>