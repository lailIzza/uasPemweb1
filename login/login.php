<?php
// Memulai sesi
session_start();

// Menyambungkan ke database
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "your_database_name"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli("localhost", "root" , "" , "bekasid" );

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menangani login saat formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form login
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Menyiapkan query untuk mencari pengguna berdasarkan username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Mengecek apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        // Mendapatkan data pengguna
        $user = $result->fetch_assoc();
        
        // Verifikasi password menggunakan password_hash dan password_verify
        if (password_verify($input_password, $user['password'])) {
            // Menyimpan data pengguna dalam session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            
            // Arahkan ke halaman profil
            header("Location:admin/profil.php");
            exit();
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Username tidak ditemukan!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="container">
        <div class="welcome-text">Selamat Datang di Bekas.Id</div>
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="POST" id="loginForm">
                <div class="input-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit">Login</button>

                <?php
                // Menampilkan pesan error jika ada
                if (isset($error_message)) {
                    echo "<div class='error-message'>$error_message</div>";
                }
                ?>

                <div class="register-link">
                    Belum punya akun? <a href="register.php">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
