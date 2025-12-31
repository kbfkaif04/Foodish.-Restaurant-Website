<?php 
session_start();
include 'db.php'; 
include 'header.php'; 

// --- 1. Calculate Grand Total from Cart ---
$cart = $_SESSION['cart'] ?? [];
$grand_total = 0;
foreach ($cart as $item) {
    $grand_total += $item['price'] * $item['quantity'];
}

// --- 2. Handle Form Submission (Placing the Order) ---
$order_status_message = '';
$order_placed = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $grand_total > 0 && !empty($cart)) {
    
    // Get form data and sanitize 
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $customer_mobile = $conn->real_escape_string($_POST['customer_mobile']);
    $customer_address = $conn->real_escape_string($_POST['customer_address']);
    $billing_amount = $grand_total;
    $user_id = $_SESSION['user_id'] ?? 'NULL'; // Placeholder for customer ID if you implement login

    // Start a transaction for safe database operation
    $conn->begin_transaction();
    $success = true;

    // A) Insert into the main 'orders' table
    $sql_order = "INSERT INTO orders (user_id, customer_name, customer_mobile, customer_address, billing_amount) 
            VALUES ($user_id, '$customer_name', '$customer_mobile', '$customer_address', $billing_amount)";

    if ($conn->query($sql_order) === TRUE) {
        $order_id = $conn->insert_id;
        
        // B) Insert all items into the 'order_items' table
        $sql_items = "INSERT INTO order_items (order_id, product_id, product_name, quantity, price, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_items);

        foreach ($cart as $item) {
            $product_id = $item['product_id'];
            $name = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $subtotal = $price * $quantity;

            $stmt->bind_param("iisidd", $order_id, $product_id, $name, $quantity, $price, $subtotal);
            if (!$stmt->execute()) {
                $success = false;
                break; // Stop loop on first error
            }
        }
        $stmt->close();

        if ($success) {
            $conn->commit();
            // Order successfully placed and items saved!
            unset($_SESSION['cart']); 
            $order_status_message = "Thank you, $customer_name! Your order #$order_id for $". number_format($billing_amount, 2) ." has been successfully placed.";
            $order_placed = true;
        } else {
            $conn->rollback();
            $order_status_message = "Error saving order items. Please contact support.";
        }

    } else {
        $conn->rollback();
        $order_status_message = "Error placing order: " . $conn->error;
    }
}

// --- 3. HTML Structure and Display (Same as before, just included for completeness) ---
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Delicious Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .checkout-container {
            max-width: 900px;
        }
        .order-summary-card {
            background-color: #fff3cd; /* Light warning color */
            border: 1px solid #ffc107;
        }
    </style>
</head>
<body>

<section class="container py-5 mt-5 checkout-container mx-auto">
    <h2 class="text-center mb-5 fw-bold text-dark">Final Checkout</h2>

    <!-- Display Order Status (Success/Error) -->
    <?php if ($order_status_message): ?>
        <div class="alert <?= $order_placed ? 'alert-success' : 'alert-danger'; ?> text-center mb-4" role="alert">
            <?= $order_status_message; ?>
        </div>
        
        <?php if ($order_placed): ?>
            <!-- If order is placed, show a button to go back home -->
            <div class="text-center">
                <a href="index.html" class="btn btn-warning btn-lg fw-bold">Return to Home</a>
            </div>
        <?php endif; ?>

    <?php endif; ?>
    
    <?php if (!$order_placed && $grand_total > 0): ?>

        <div class="row g-4">
            
            <!-- Left Column: Order Summary -->
            <div class="col-lg-5">
                <div class="card p-4 order-summary-card">
                    <h4 class="card-title text-dark">Your Total Order</h4>
                    <hr>
                    <ul class="list-group list-group-flush mb-4">
                        <?php foreach ($cart as $item): ?>
                            <li class="list-group-item d-flex justify-content-between bg-transparent">
                                <span><?= htmlspecialchars($item['name']); ?> x<?= $item['quantity']; ?></span>
                                <span>$<?= number_format($item['price'] * $item['quantity'], 2); ?></span>
                            </li>
                        <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between fw-bold fs-5 bg-transparent pt-3">
                            <span>Billing Amount</span>
                            <span class="text-warning">$<?= number_format($grand_total, 2); ?></span>
                        </li>
                    </ul>
                </div>
                <!-- Action to adjust cart -->
                <div class="mt-3 text-center">
                    <a href="cart.php" class="btn btn-outline-dark w-100">Review & Edit Cart</a>
                </div>
            </div>
            
            <!-- Right Column: Customer Details Form -->
            <div class="col-lg-7">
                <div class="card p-4 shadow-sm">
                    <h4 class="card-title">Delivery Details</h4>
                    <p class="text-muted">Please confirm your contact and delivery information.</p>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required value="<?= htmlspecialchars($_SESSION['username'] ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="customer_mobile" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" id="customer_mobile" name="customer_mobile" required>
                        </div>
                        <div class="mb-4">
                            <label for="customer_address" class="form-label">Delivery Address</label>
                            <textarea class="form-control" id="customer_address" name="customer_address" rows="3" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold text-dark">
                            Place Order - Pay $<?= number_format($grand_total, 2); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    <?php elseif (!$order_placed && $grand_total == 0): ?>
        <div class="alert alert-warning text-center" role="alert">
            Your cart is empty. Please add items before checking out. <a href="index.html#menu" class="alert-link">Back to Menu</a>
        </div>
    <?php endif; ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<?php include('footer.php'); ?>

</body>
</html>