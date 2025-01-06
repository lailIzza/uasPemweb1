<?php

session_start();

require "../koneksi.php"; //koneksi database

// Menangani login saat formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        

        if (password_verify($input_password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role']; // Menyimpan role ke session
            
           // Arahkan ke halaman berdasarkan role
           if ($user['role'] === 'admin') {
                header("Location: ../admin/profil.php");
            } elseif ($user['role'] === 'customer') {
                header("Location: ../user/profilU.php");
            } else {
                // Default jika role tidak dikenali
                header("Location: login.php?error=unknown_role");
            }
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
