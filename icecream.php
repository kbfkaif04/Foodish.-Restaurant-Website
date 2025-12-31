<?php 
session_start();
include 'db.php'; 
include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Starter Page - Yummy Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content=""> 


   <style>
/* ---------------------------------------------------
   HERO SECTION
-----------------------------------------------------*/
.hero-section {
  background: url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0') center/cover no-repeat;
  height: 300px;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.hero-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /* This color is used to simulate the faint blue tint */
    background: rgba(23, 27, 30, 0.43); 
    z-index: 1;
    border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
}
.hero-title { z-index: 11;font-size: 3rem; font-weight: 800; color: white; text-shadow: 0 3px 10px rgba(0,0,0,0.5); }

/* ---------------------------------------------------
   MENU SECTION
-----------------------------------------------------*/
.menu-section { background: linear-gradient(135deg, #fafafa, #f0f0f0); padding-top: 50px; padding-bottom: 70px; }
.menu-title { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 40px; }

/* ---------------------------------------------------
   ICE CREAM CARDS
-----------------------------------------------------*/
.menu-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px); border: none; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 5px 25px rgba(0,0,0,0.1); }
.menu-card:hover { transform: translateY(-7px); box-shadow: 0 8px 30px rgba(0,0,0,0.2); }
.card-img-top { height: 230px; object-fit: cover; }
.price-badge { background: #ce1212; padding: 6px 15px; display: inline-block; border-radius: 30px; font-weight: 600; color: #ffffffff; margin-bottom: 15px; font-size: 1.1rem; }
.add-cart-btn { background: #373535ff; color: #fff; border-radius: 40px; transition: 0.2s; }
.add-cart-btn:hover { background: #ffc107; color: black; }
footer { text-align: center; padding: 20px 0; margin-top: 50px; font-weight: 500; background: #111; color: #fff; }
  </style>



</head>

<body class="starter-page-page">

<!-- HERO -->
<div class="hero-section">
  <h1 class="hero-title">Cool & Refreshing Ice Creams</h1>
</div>

<!-- MENU SECTION -->
<section class="menu-section container">
  <h2 class="menu-title text-center">Our Ice Cream Flavors</h2>
  <div class="row g-4 justify-content-center">

    <!-- 1 Vanilla -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkpjFAzprgFOKzXL__JrdJxo6d2Rf9GLvFQQ&s" class="card-img-top" alt="Vanilla">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Vanilla Scoop</h5>
          <span class="price-badge">$4.49</span>
          <p class="text-muted small">Classic creamy vanilla, made with real Madagascar beans. Simple perfection.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="price" value="4.49">
            <input type="hidden" name="name" value="Vanilla Scoop">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 2 Chocolate -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpKvUilm2L3-TAm0ICtWZN9SqfPb1ZehQ9Dw&s" class="card-img-top" alt="Chocolate">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Chocolate Delight</h5>
          <span class="price-badge">$4.99</span>
          <p class="text-muted small">Rich dark chocolate ice cream with chunks of fudge brownie.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="2">
            <input type="hidden" name="price" value="4.99">
            <input type="hidden" name="name" value="Chocolate Delight">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 3 Strawberry -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="https://www.rebootwithjoe.com/wp-content/uploads/2013/08/Strawberry-Ice-Cream.jpg" class="card-img-top" alt="Strawberry">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Strawberry Swirl</h5>
          <span class="price-badge">$4.79</span>
          <p class="text-muted small">Fresh strawberry base swirled with homemade strawberry compote.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="3">
            <input type="hidden" name="price" value="4.79">
            <input type="hidden" name="name" value="Strawberry Swirl">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 4 Mango Ice Cream -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/ice/ice1.jpeg" class="card-img-top" alt="Mango Ice Cream">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Mango Dream</h5>
          <span class="price-badge">$5.29</span>
          <p class="text-muted small">Smooth tropical mango puree blended into creamy ice cream.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="4">
            <input type="hidden" name="price" value="5.29">
            <input type="hidden" name="name" value="Mango Dream">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 5 Strawberry Bliss -->
<div class="col-lg-4 col-md-6 col-sm-10">
  <div class="card menu-card text-center h-100">
    <img src="https://images.unsplash.com/photo-1562059390-a761a084768e" class="card-img-top" alt="Strawberry Ice Cream"> 
    <div class="card-body d-flex flex-column">

      <h5 class="fw-bold">Strawberry Bliss</h5>
      <span class="price-badge">$4.99</span>
      <p class="text-muted small">Fresh strawberries blended into smooth and creamy ice cream.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="5">
        <input type="hidden" name="price" value="4.99">
        <input type="hidden" name="name" value="Strawberry Bliss">
        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
        </div>
        <button type="submit" class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>

    </div>
  </div>
</div>


<!-- 6 Chocolate Heaven -->
<div class="col-lg-4 col-md-6 col-sm-10">
  <div class="card menu-card text-center h-100">
    <img src="assets/ice/ice.jpg" class="card-img-top" alt="Chocolate Ice Cream"> 
    <div class="card-body d-flex flex-column">

      <h5 class="fw-bold">Chocolate Heaven</h5>
      <span class="price-badge">$5.49</span>
      <p class="text-muted small">Rich Belgian chocolate crafted into velvety smooth ice cream.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="6">
        <input type="hidden" name="price" value="5.49">
        <input type="hidden" name="name" value="Chocolate Heaven">
        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
        </div>
        <button type="submit" class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>

    </div>
  </div>
</div>


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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Foodish</strong> <span>All Rights Reserved.</span></p>
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