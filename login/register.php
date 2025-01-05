<?php
// Memulai sesi
session_start();

// Menyambungkan ke database
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "your_database_name"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli("localhost", "root", "", "bekasid");

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menangani proses pendaftaran saat formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form register
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Validasi jika password dan konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Hash password menggunakan bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Memeriksa apakah email atau username sudah ada di database
        $sql_check = "SELECT * FROM users WHERE email = ? OR username = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ss", $email, $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $error_message = "Email atau Username sudah terdaftar!";
        } else {
            // Menghandle upload gambar profil
            $profile_picture = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
                $file_tmp = $_FILES['profile_picture']['tmp_name'];
                $file_name = $_FILES['profile_picture']['name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

                // Validasi ekstensi file
                if (in_array($file_ext, $allowed_ext)) {
                    // Membuat nama file baru untuk menghindari konflik
                    $profile_picture = uniqid('profile_', true) . '.' . $file_ext;
                    $upload_dir = 'uploads/';
                    if (move_uploaded_file($file_tmp, $upload_dir . $profile_picture)) {
                        // Gambar berhasil diupload
                    } else {
                        $error_message = "Gagal mengunggah gambar profil!";
                    }
                } else {
                    $error_message = "Ekstensi file tidak valid! Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
                }
            }

            // Menyimpan data pengguna baru ke database
            $sql_insert = "INSERT INTO users (email, username, password, profile_picture, role) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sssss", $email, $username, $hashed_password, $profile_picture, $role);
            $stmt_insert->execute();

            // Redirect ke halaman login setelah berhasil registrasi
            header("Location: login.php");
            exit();
        }
    }

    $stmt_check->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .container {
            text-align: center;
        }
        .welcome-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .register-box {
            background-color: #e0e7ef;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .register-box h2 {
            background-color: #5a6d8a;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .register-box .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .register-box .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #5a6d8a;
        }
        .register-box .input-group input,
        .register-box .input-group select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-box .input-group i {
            margin-right: 10px;
            color: #5a6d8a;
        }
        .register-box button {
            width: 100%;
            padding: 10px;
            background-color: #f0f2f5;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .register-box button:hover {
            background-color: #d8dfe8;
        }
        .login-link {
            margin-top: 20px;
        }
        .login-link a {
            color: #ff6600;
            text-decoration: none;
        }
        .error-message {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-text">Selamat Datang di Bekas.Id</div>
        <div class="register-box">
            <h2>Register</h2>
            <form action="register.php" method="POST" enctype="multipart/form-data" id="registerForm">
                <div class="input-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="input-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password"><i class="fas fa-lock"></i> Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                </div>
                <div class="input-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="profile_picture">Upload Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                </div>
                <button type="submit">Daftar</button>

                <?php
                // Menampilkan pesan error jika ada
                if (isset($error_message)) {
                    echo "<div class='error-message'>$error_message</div>";
                }
                ?>

                <div class="login-link">
                    Sudah punya akun? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
