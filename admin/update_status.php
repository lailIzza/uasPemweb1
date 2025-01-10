<?php
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Ambil detail pesanan berdasarkan ID
    $sqlOrder = "
        SELECT 
            o.id AS order_id, 
            o.order_number, 
            os.status_name AS current_status 
        FROM orders o
        LEFT JOIN order_statuses os ON o.order_status_id = os.id
        WHERE o.id = ?
    ";
    $stmt = $conn->prepare($sqlOrder);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if (!$order) {
        die("Pesanan tidak ditemukan.");
    }

    // Ambil semua status yang tersedia
    $sqlStatuses = "SELECT id, status_name FROM order_statuses";
    $resultStatuses = $conn->query($sqlStatuses);
    if (!$resultStatuses) {
        die("Gagal mengambil data status pesanan: " . $conn->error);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update status pesanan
    $order_id = $_POST['order_id'];
    $new_status_id = $_POST['status_id'];

    $sqlUpdate = "UPDATE orders SET order_status_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ii", $new_status_id, $order_id);

    if ($stmt->execute()) {
        header("Location: profil.php?status=updated");
        exit();
    } else {
        die("Gagal memperbarui status pesanan: " . $stmt->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Pesanan</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
        <h2>Ubah Status Pesanan</h2>
        <p>Pesanan No: <strong><?php echo htmlspecialchars($order['order_number']); ?></strong></p>
        <p>Status Saat Ini: <strong><?php echo htmlspecialchars($order['current_status']); ?></strong></p>
        
        <form method="POST" action="">
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
            <label for="status_id">Pilih Status Baru:</label>
            <select name="status_id" id="status_id" required>
                <?php while ($status = $resultStatuses->fetch_assoc()): ?>
                    <option value="<?php echo $status['id']; ?>">
                        <?php echo htmlspecialchars($status['status_name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit">Ubah Status</button>
        </form>
    <?php endif; ?>
</body>
</html>
