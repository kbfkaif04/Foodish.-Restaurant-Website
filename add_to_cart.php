<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Get and validate data, including the new 'name' field
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.00;
    
    // *** FIX IS HERE: Get the submitted name ***
    $product_name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Unknown Item';
    
    if ($product_id > 0 && $quantity > 0 && $price > 0.00) {
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // 2. Define the new item structure using the submitted name
        $new_item = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price,
            'name' => $product_name // <-- Now using the correct name
        ];

        // 3. Add the item to the cart (simple append)
        $_SESSION['cart'][] = $new_item;
        
        // 4. Redirect back to the menu or a success page
         header('Location: cart.php');
        exit;

    } else {
        // Handle invalid data
        header('Location: index.php?status=error');
        exit;
    }

} else {
    // Handle direct access
    header('Location: index.php');
    exit;
}
?>