

<?php 
session_start();
include 'db.php'; 

// Initialize variables
$cart = $_SESSION['cart'] ?? [];
$grand_total = 0;

// Handle quantity update
if (isset($_POST['update_quantity'])) {
    $index = $_POST['index'];
    $qty = max(1, intval($_POST['quantity']));
    $_SESSION['cart'][$index]['quantity'] = $qty;
    header("Location: cart.php");
    exit;
}

// Handle item remove
if (isset($_GET['remove'])) {
    $removeIndex = $_GET['remove'];
    unset($_SESSION['cart'][$removeIndex]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex
    header("Location: cart.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Starter Page - Yummy Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content=""> 

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



 <style>
        .cart-table th {
            background-color: #f8f9fa;
        }
        .cart-summary {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }
        .update-btn {
            border: none;
            background: none;
            color: #0d6efd;
            cursor: pointer;
            font-size: 14px;
        }
        .remove-btn {
            color: red;
            font-size: 18px;
            text-decoration: none;
        }
        .remove-btn:hover {
            color: darkred;
        }
        button.btn-warning a {
            text-decoration: none;
            color: black;
        }
        button.btn-warning a:hover {
            color: black;
        }
    </style>


</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Foodish</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html##hero">Home<br></a></li>
          <li><a href="index.html##about">About</a></li>
          <li><a href="index.html#menu">Menu</a></li>
          <li><a href="index.html##events">Events</a></li>
          <li><a href="index.html##chefs">Chefs</a></li>
          <li><a href="index.html##gallery">Gallery</a></li>
       
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a>

    </div>
  </header>





  <section class="container py-5 mt-5">
    <h2 class="text-center mb-5 fw-bold text-dark">Your Order Summary</h2>

    <?php if (empty($cart)): ?>
        <div class="alert alert-info text-center">
            Your cart is currently empty. 
            <a href="index.html#menu" class="alert-link">Start ordering here!</a>
        </div>
    <?php else: ?>

        <div class="row">

            <div class="col-lg-8">

                <div class="table-responsive">
                    <table class="table table-hover cart-table">
                        <thead>
                            <tr class="text-center">
                                <th>Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($cart as $index => $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $grand_total += $subtotal;
                        ?>
                            <tr class="align-middle text-center">

                                <td class="text-start fw-bold"><?= htmlspecialchars($item['name']); ?></td>
                                <td>$<?= number_format($item['price'], 2); ?></td>

                                <td>
                                    <form method="POST" class="d-flex flex-column align-items-center">
                                        <input type="hidden" name="index" value="<?= $index; ?>">
                                        <input type="number" name="quantity" 
                                               value="<?= $item['quantity']; ?>" 
                                               min="1"
                                               class="form-control form-control-sm"
                                               style="width: 70px;">
                                        <button type="submit" name="update_quantity" class="update-btn mt-1">
                                            Update
                                        </button>
                                    </form>
                                </td>

                                <td class="fw-bold">$<?= number_format($subtotal, 2); ?></td>

                                <td>
                                    <a href="cart.php?remove=<?= $index; ?>" class="remove-btn" title="Remove Item">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php#menu" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="cart-summary shadow-sm">
                    <h4 class="mb-4">Order Totals</h4>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>$<?= number_format($grand_total, 2); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Grand Total</span>
                            <span class="fs-4 text-warning">$<?= number_format($grand_total, 2); ?></span>
                        </li>
                    </ul>

                    <button class="btn btn-warning btn-lg w-100 fw-bold text-dark">
                        <a href="checkout.php">Order Now</a>
                    </button>
                </div>
            </div>

        </div>

    <?php endif; ?>

</section>










   <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>Uttara , Azommpur</p>
            <p>Dhaka, 1230</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>017155-555</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Sat-This:</strong> <span>10AM - 10PM</span><br>
              <strong>Friday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved.</span></p>
      <div class="credits">
        Designed by <a href="#"> Team C</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>