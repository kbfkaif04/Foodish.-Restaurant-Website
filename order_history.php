<?php
session_start();
include 'db.php'; 
include('header.php'); 

// --- SIMULATION: In a real app, this would be retrieved after login ---
// We'll use a placeholder customer name for now, assuming the customer exists in 'orders' table
$customer_name_simulated = $_SESSION['username'] ?? 'Guest Customer'; // If you have a login/session for name

// For this history page to work correctly without a proper login system, 
// we'll fetch orders based on the name used during checkout (less secure but functional for demonstration)
$customer_name_for_query = $conn->real_escape_string($customer_name_simulated); 

// --- 1. Fetch Customer Orders ---
$orders_sql = "SELECT * FROM orders WHERE customer_name = '$customer_name_for_query' ORDER BY order_date DESC";
$orders_result = $conn->query($orders_sql);

// --- 2. Fetch Order Items Function (Reused from admin_orders.php) ---
function getOrderItems($conn, $order_id) {
    $items_sql = "SELECT * FROM order_items WHERE order_id = ?";
    $stmt = $conn->prepare($items_sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $items_result = $stmt->get_result();
    
    $items = [];
    while ($row = $items_result->fetch_assoc()) {
        $items[] = $row;
    }
    $stmt->close();
    return $items;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .history-card {
            border-left: 5px solid #ffc107;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .order-summary-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<section class="container py-5 mt-5">
    <h2 class="text-center mb-5 fw-bold text-dark"><i class="fas fa-receipt me-2"></i>Your Past Orders</h2>

    <p class="text-center text-muted">Showing orders for: <strong><?= htmlspecialchars($customer_name_simulated); ?></strong></p>

    <?php if ($orders_result && $orders_result->num_rows > 0): ?>
        <?php while ($order = $orders_result->fetch_assoc()): 
            $items = getOrderItems($conn, $order['id']);
        ?>
            <div class="card history-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Order #<?= $order['id']; ?></h5>
                        <small class="text-muted">Placed on: <?= date('Y-m-d H:i', strtotime($order['order_date'])); ?></small>
                    </div>

                    <div class="order-summary-box mb-3">
                        <p class="mb-0"><strong>Total Paid:</strong> <span class="text-warning fw-bold fs-5">$<?= number_format($order['billing_amount'], 2); ?></span></p>
                        <p class="mb-0 small">Delivering to: <?= htmlspecialchars($order['customer_address']); ?></p>
                    </div>

                    <h6>Items Ordered:</h6>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($items as $item): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?= $item['quantity']; ?>x <?= htmlspecialchars($item['product_name']); ?></span>
                                <span class="fw-bold">$<?= number_format($item['subtotal'], 2); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            You have not placed any orders yet. Start ordering from the <a href="index.php#menu" class="alert-link">menu</a>!
        </div>
    <?php endif; ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<footer>
    <p>© 2025 Delicious Restaurant | Order History</p>
</footer>
</body>
</html>