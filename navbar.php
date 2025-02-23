<?php
require 'koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Cek apakah user sudah login
$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
$profile_picture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture']:
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user'; // Default ke 'user' jika role tidak di-set

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>navbar</title>
    <style>
        body{
            margin: 0;
            font-family: Arial,  sans-serif;
        }
        .top-navbar {
            background-color: #f7f7f7;
            padding: 10px 20px;
        }

        .top-navbar .nav-links {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }

        .top-navbar .nav-links a {
            color: #222d3c;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }
        .top-navbar .nav-links a:hover{
            color: #ca6105;
        }

        .main-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1d2939;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .main-navbar .logo {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
        }
        .main-navbar .search-bar {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 5px 10px;
            width: 50%;
        }
        .main-navbar .search-bar input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 100%;
        }
        .main-navbar .search-bar input::placeholder {
            color: #888;
        }
        .main-navbar .search-bar button {
            background: none;
            border: none;
            cursor: pointer;
            color: #555;
        }
        .main-navbar .search-bar button i {
            font-size: 18px;
            color: #888;
        }
        .main-navbar .user-icon {
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
        }
        .main-navbar .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #f7f7f7;
        }
        .main-navbar .profile-container img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }
        .main-navbar .profile-container a span {
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            color: #ffffff;
        }
        .main-navbar .profile-container a span:hover{
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            color: #fcbf49;
        }
        .main-navbar .login-link {
            color: #f7f7f7;
            font-size: 20px;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="top-navbar">
        <!-- Navbar 1-->
        <div class="nav-links">
            <a href="../produk.php">Produk</a>
            <a href="../panduan.php">Panduan Belanja</a>
            <a href="../tentang_kami.php">Tentang Kami</a>
        </div>
    </div>
    <nav class="main-navbar">
        <!-- Navbar 2-->
        <a href="../home.php" class="logo">Bekas.<span style="color: #fcbf49;">Id</span></a>

        <div class="search-bar">
            <form action="../produk.php" method="GET" style="display: flex; width: 100%;">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari produk" 
                    id="searchInput" 
                    style="flex: 1; border: none; outline: none; font-size: 14px;"
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                >
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <i class='bx bx-search' style="font-size: 18px; color: #888;"></i>
                </button>
            </form>
        </div>

        <?php if ($isLoggedIn): ?>
            <!-- Tampilkan username dan gambar profil -->
            <div class="profile-container">
                <img src="../gambar/<?php echo htmlspecialchars($userData['profile_picture']); ?>" alt="Foto Profil">
                <a href="<?php echo $role === 'admin' ? '../admin/profil.php' : '../user/profilU.php'; ?>" style="text-decoration: none;"><span><?php echo htmlspecialchars($username); ?></span></a>
                <a href="../login/logout.php" class="login-link"><i class='bx bx-log-out'></i></a>
            </div>
        <?php else: ?>
            <!-- Jika belum login -->
            <a href="../login/login.php" class="login-link"><i class='bx bx-user'></i></a>
        <?php endif; ?>
    </nav>
</body>
</html>