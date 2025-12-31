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
  <title>Foodish</title>
  <meta name="description" content="">
  <meta name="keywords" content=""> 

  <style>
/* ---------------------------------------------------
   HERO SECTION
-----------------------------------------------------*/


.hero-section {
  background: url('https://www.yummytummyaarthi.com/wp-content/uploads/2022/11/red-sauce-pasta-1.jpg') center/cover no-repeat;
  height: 300px;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
    text-decoration: none;
}
.hero-title { font-size: 3rem; font-weight: 800; color: white; text-shadow: 0 3px 10px rgba(0,0,0,0.5);   text-decoration: none;}

/* ---------------------------------------------------
   MENU SECTION
-----------------------------------------------------*/
.menu-section { background: linear-gradient(135deg, #fafafa, #f0f0f0); padding-top: 50px; padding-bottom: 70px; }
.menu-title { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 40px;   text-decoration: none;}

/* ---------------------------------------------------
   PASTA MENU CARDS
-----------------------------------------------------*/
.menu-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(10px);
      text-decoration: none; border: none; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 5px 25px rgba(0,0,0,0.1); }
.menu-card:hover { transform: translateY(-7px); box-shadow: 0 8px 30px rgba(0,0,0,0.2); }
.card-img-top { height: 230px; object-fit: cover; }
.price-badge { background: #ce1212; padding: 6px 15px; display: inline-block; border-radius: 30px; font-weight: 600; color: #ffffffff; margin-bottom: 15px; font-size: 1.1rem; }
.add-cart-btn { background: #423e3eff; color: #fff; border-radius: 40px; transition: 0.2s; }
.add-cart-btn:hover { background: #ffc107; color: black; }
footer { text-align: center; padding: 20px 0; margin-top: 50px; font-weight: 500; background: #111; color: #fff; }
  </style>

</head>
<body class="starter-page-page">





  <!-- HERO -->
<div class="hero-section">
  <h1 class="hero-title">Comforting & Classic Pasta</h1>
</div>

<!-- MENU SECTION -->
<section class="menu-section container">
  <h2 class="menu-title text-center">Our Pasta Varieties</h2>
  <div class="row g-4 justify-content-center">

    <!-- 1 Spaghetti Bolognese -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p6.jpg" class="card-img-top" alt="Spaghetti Bolognese">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Spaghetti Bolognese</h5>
          <span class="price-badge">$7.99</span>
          <p class="text-muted small">Al dente spaghetti tossed in a rich, slow-simmered meat sauce, topped with Parmesan.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="201">
            <input type="hidden" name="price" value="7.99">
            <input type="hidden" name="name" value="Spaghetti Bolognese">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 2 Penne Alfredo -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p1.jpg" class="card-img-top" alt="Penne Alfredo">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Penne Alfredo</h5>
          <span class="price-badge">$8.49</span>
          <p class="text-muted small">Penne pasta swimming in a velvety cream, butter, and parmesan cheese sauce.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="202">
            <input type="hidden" name="price" value="8.49">
            <input type="hidden" name="name" value="Penne Alfredo">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 3 Classic Lasagna -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p2.jpg" class="card-img-top" alt="Classic Lasagna">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Classic Lasagna</h5>
          <span class="price-badge">$9.99</span>
          <p class="text-muted small">Layers of pasta, seasoned meat, ricotta, and mozzarella baked until bubbly.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="203">
            <input type="hidden" name="price" value="9.99">
            <input type="hidden" name="name" value="Classic Lasagna">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 4 Fettuccine Carbonara -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p3.jpg" class="card-img-top" alt="Fettuccine Carbonara">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Fettuccine Carbonara</h5>
          <span class="price-badge">$8.99</span>
          <p class="text-muted small">Creamy egg-based sauce with pancetta, black pepper, and Parmesan over fettuccine.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="204">
            <input type="hidden" name="price" value="8.99">
            <input type="hidden" name="name" value="Fettuccine Carbonara">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 5 Pesto Pasta -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p4.jpg" class="card-img-top" alt="Pesto Pasta">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Pesto Pasta</h5>
          <span class="price-badge">$7.49</span>
          <p class="text-muted small">Fresh basil pesto tossed with spaghetti, toasted pine nuts and Parmesan.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="205">
            <input type="hidden" name="price" value="7.49">
            <input type="hidden" name="name" value="Pesto Pasta">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- 6 Seafood Linguine -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/pasta/p5.jpg" class="card-img-top" alt="Seafood Linguine">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Seafood Linguine</h5>
          <span class="price-badge">$10.99</span>
          <p class="text-muted small">Linguine with shrimp, mussels, and calamari in a garlicky tomato broth.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="206">
            <input type="hidden" name="price" value="10.99">
            <input type="hidden" name="name" value="Seafood Linguine">
            <div class="input-group mb-3"><span class="input-group-text">Qty</span><input type="number" name="quantity" class="form-control text-center" value="1" min="1" required></div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
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