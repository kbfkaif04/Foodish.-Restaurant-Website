<?php
session_start();
include 'db.php'; 
include('header.php'); 

// --- 1. Fetch All Orders ---
// Fetch all orders, ordered by most recent (assuming 'order_date' or 'id' exists)
$orders_sql = "SELECT * FROM orders ORDER BY id DESC";
$orders_result = $conn->query($orders_sql);

// --- 2. Fetch Order Items Function ---
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

// Function to map status to Bootstrap badge class
function getStatusBadgeClass($status) {
    switch ($status) {
        case 'Pending':
            return 'bg-danger';
        case 'Processing':
            return 'bg-warning text-dark';
        case 'Completed':
            return 'bg-success';
        case 'Cancelled':
            return 'bg-secondary';
        default:
            return 'bg-info text-dark';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Modern Card Styling */
        .order-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Softer shadow */
            margin-bottom: 25px;
            transition: transform 0.2s;
        }
        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .order-header {
            background-color: #343a40; /* Darker header */
            color: white;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-body {
            padding: 20px;
        }
        .order-info strong {
            display: inline-block;
            width: 100px;
            color: #495057;
        }
        .details-toggle {
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<section class="container py-5 mt-5">
    <h2 class="text-center mb-4 fw-bolder text-dark"><i class="fas fa-chart-line me-2"></i>Order Management Dashboard</h2>
    <p class="text-center text-muted mb-5">Review, filter, and manage all customer orders efficiently.</p>

    <!-- Search and Filter Bar -->
    <div class="card p-3 mb-5 shadow-sm">
        <div class="row g-3 align-items-center">
            <div class="col-md-8">
                <input type="text" class="form-control" id="orderSearch" onkeyup="filterOrders()" placeholder="Search by Order ID, Customer Name...">
            </div>
            <div class="col-md-4">
                <select id="statusFilter" class="form-select" onchange="filterOrders()">
                    <option value="all">Filter by Status (All)</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        </div>
    </div>
    <!-- End Search and Filter Bar -->

    <div id="ordersContainer">
    <?php if ($orders_result && $orders_result->num_rows > 0): ?>
        <?php while ($order = $orders_result->fetch_assoc()): 
            $items = getOrderItems($conn, $order['id']);
            $status_class = getStatusBadgeClass($order['order_status']);
        ?>
            <div class="order-card" data-order-id="<?= $order['id']; ?>" data-customer-name="<?= htmlspecialchars($order['customer_name']); ?>" data-status="<?= $order['order_status']; ?>">
                <div class="order-header">
                    <h5 class="mb-0">#<?= $order['id']; ?></h5>
                    <span class="badge <?= $status_class; ?> fs-6 py-2 px-3"><?= htmlspecialchars($order['order_status']); ?></span>
                </div>
                
                <div class="order-body">
                    <div class="row mb-3">
                        <div class="col-md-4 order-info">
                            <strong>Customer:</strong> <?= htmlspecialchars($order['customer_name']); ?>
                        </div>
                        <div class="col-md-4 order-info">
                            <strong>Total:</strong> <span class="text-warning fw-bold">$<?= number_format($order['billing_amount'], 2); ?></span>
                        </div>
                        <div class="col-md-4 order-info">
                            <strong>Placed:</strong> <?= date('M d, H:i', strtotime($order['order_date'] ?? 'now')); ?>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12 order-info">
                            <strong>Address:</strong> <?= htmlspecialchars($order['customer_address']); ?>
                        </div>
                    </div>

                    <!-- Status Updater -->
                    <div class="row align-items-center mb-3">
                        <div class="col-md-6">
                            <label class="form-label small mb-0">Update Status:</label>
                            <select class="form-select form-select-sm status-changer" data-order-id="<?= $order['id']; ?>" onchange="updateOrderStatus(this)">
                                <option value="Pending" <?= $order['order_status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="Processing" <?= $order['order_status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                                <option value="Completed" <?= $order['order_status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="Cancelled" <?= $order['order_status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-6 text-end">
                            <span class="details-toggle" data-bs-toggle="collapse" data-bs-target="#collapseItems<?= $order['id']; ?>">
                                View Items <i class="fas fa-chevron-down ms-1"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Order Items (Collapsible) -->
                    <div class="collapse" id="collapseItems<?= $order['id']; ?>">
                        <hr class="mt-0">
                        <h6 class="mb-2">Order Details:</h6>
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['product_name']); ?></td>
                                        <td class="text-center"><?= $item['quantity']; ?></td>
                                        <td class="text-end fw-bold">$<?= number_format($item['subtotal'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-info text-center">No orders have been placed yet.</div>
    <?php endif; ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // --- Client-Side Filtering ---
    function filterOrders() {
        const searchInput = document.getElementById('orderSearch').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const orders = document.querySelectorAll('.order-card');

        orders.forEach(card => {
            const orderId = card.getAttribute('data-order-id');
            const customerName = card.getAttribute('data-customer-name').toLowerCase();
            const status = card.getAttribute('data-status');

            const passesSearch = (
                orderId.includes(searchInput) ||
                customerName.includes(searchInput)
            );
            
            const passesStatus = (
                statusFilter === 'all' || 
                status === statusFilter
            );

            if (passesSearch && passesStatus) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // --- Simulated Status Update (Requires a small AJAX endpoint like update_status.php to be fully functional) ---
    function updateOrderStatus(selectElement) {
        const orderId = selectElement.getAttribute('data-order-id');
        const newStatus = selectElement.value;
        const card = selectElement.closest('.order-card');
        const badge = card.querySelector('.badge');
        
        // 1. SIMULATE DATABASE UPDATE (In a real application, you would use fetch() here)
        console.log(`Simulating status update for Order #${orderId} to: ${newStatus}`);

        // 2. Update Card Data Attribute for filtering
        card.setAttribute('data-status', newStatus);

        // 3. Update Badge Visuals
        badge.textContent = newStatus;
        badge.className = 'badge fs-6 py-2 px-3'; // Reset classes
        
        let newClass = '';
        switch (newStatus) {
            case 'Pending': newClass = 'bg-danger'; break;
            case 'Processing': newClass = 'bg-warning text-dark'; break;
            case 'Completed': newClass = 'bg-success'; break;
            case 'Cancelled': newClass = 'bg-secondary'; break;
            default: newClass = 'bg-info text-dark';
        }
        badge.classList.add(newClass);

        // Optional: Re-filter after update to hide completed/cancelled orders if filter is active
        // filterOrders(); 

        alert(`Order #${orderId} status updated to ${newStatus} (Simulation complete).`);
    }

    // Toggle icon on collapse (visual enhancement)
    document.addEventListener('DOMContentLoaded', () => {
        const toggles = document.querySelectorAll('.details-toggle');
        toggles.forEach(toggle => {
            const collapseTarget = document.querySelector(toggle.getAttribute('data-bs-target'));
            collapseTarget.addEventListener('show.bs.collapse', () => {
                toggle.querySelector('i').classList.replace('fa-chevron-down', 'fa-chevron-up');
            });
            collapseTarget.addEventListener('hide.bs.collapse', () => {
                toggle.querySelector('i').classList.replace('fa-chevron-up', 'fa-chevron-down');
            });
        });
    });

</script>
<footer>
    <p>© 2025 Delicious Restaurant | Admin Panel</p>
</footer>
</body>
</html>