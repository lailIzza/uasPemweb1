<?php
// Ambil nomor pesanan dari URL
$order_number = isset($_GET['order_number']) ? htmlspecialchars($_GET['order_number']) : null;

if (!$order_number) {
    die("Nomor pesanan tidak valid.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Berhasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f9f9f9;
        }
        .container {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #28a745;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout Berhasil!</h1>
        <p>Pesanan dengan nomor: <strong><?php echo $order_number; ?></strong> telah berhasil dibuat.</p>
        <p>Silakan cek <a href="profilU.php">Profil</a> untuk melihat informasi lebih lanjut mengenai pesanan Anda.</p>
    </div>
</body>
</html>
