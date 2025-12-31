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
  <title>Restaurant Project1</title>
  <meta name="description" content="">
  <meta name="keywords" content=""> 


<style>

/* ---------------------------------------------------
   HERO SECTION
-----------------------------------------------------*/
.hero-section {
  background: url('https://images.unsplash.com/photo-1550547660-d9450f859349') center/cover no-repeat;
  height: 300px;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-title {
  font-size: 3rem;
  font-weight: 800;
  color: white;
  text-shadow: 0 3px 10px rgba(0,0,0,0.5);
}

/* ---------------------------------------------------
   MENU SECTION
-----------------------------------------------------*/
.menu-section {
  background: linear-gradient(135deg, #fafafa, #f0f0f0);
  padding-top: 50px;
  padding-bottom: 70px;
}

.menu-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 40px;
}

/* ---------------------------------------------------
   BURGER MENU CARDS
-----------------------------------------------------*/
.menu-card {
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(10px);
  border: none;
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}

.menu-card:hover {
  transform: translateY(-7px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}

.card-img-top {
  height: 230px;
  object-fit: cover;
}

/* Price Badge */
.price-badge {
  background: #ce1212;
  padding: 6px 15px;
  display: inline-block;
  border-radius: 30px;
  font-weight: 600;
  color: #ffffffff;
  margin-bottom: 15px;
  font-size: 1.1rem;
}

/* Add to cart button */
.add-cart-btn {
  background: #373030ff;
  color: #fff;
  border-radius: 40px;
  transition: 0.2s;
}

.add-cart-btn:hover {
  background: #ffc107;
  color: black;
}

/* Footer */
footer {
  text-align: center;
  padding: 20px 0;
  margin-top: 50px;
  font-weight: 500;
  background: #111;
  color: #fff;
}

  </style>

</head>

<body class="starter-page-page">



<!-- HERO -->
<div class="hero-section">
  <h1 class="hero-title">Juicy & Premium Burgers</h1>
</div>

<!-- MENU SECTION -->
<section class="menu-section container">
  <h2 class="menu-title text-center">Our Burger Selection</h2>
  <div class="row g-4 justify-content-center">

    <!-- Cheeseburger -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b1.jpg" class="card-img-top" alt="Cheeseburger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Cheeseburger</h5>
          <span class="price-badge">$8.99</span>
          <p class="text-muted small">Classic beef patty, melted cheddar, lettuce, tomato & signature sauce.</p>

          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="301">
            <input type="hidden" name="price" value="8.99">
            <input type="hidden" name="name" value="Cheeseburger">

            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>

            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- Double Beef Burger -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b4.jpg" class="card-img-top" alt="Double Beef Burger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Double Beef Burger</h5>
          <span class="price-badge">$9.99</span>
          <p class="text-muted small">Double patties, double cheese, crispy bacon & smoky BBQ sauce.</p>

          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="302">
            <input type="hidden" name="price" value="9.99">
            <input type="hidden" name="name" value="Double Beef Burger">

            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>

            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- Chicken Burger -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b3.jpg" class="card-img-top" alt="Chicken Burger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Grilled Chicken Burger</h5>
          <span class="price-badge">$8.49</span>
          <p class="text-muted small">Grilled chicken, avocado & garlic aioli on a brioche bun.</p>

          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="303">
            <input type="hidden" name="price" value="8.49">
            <input type="hidden" name="name" value="Grilled Chicken Burger">

            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>

            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

      <!-- New Burger 1 -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b6.jpg" class="card-img-top" alt="Spicy Jalapeno Burger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Spicy Jalapeno Burger</h5>
          <span class="price-badge">$9.49</span>
          <p class="text-muted small">Beef patty, jalapeños, pepper jack cheese, crispy onions & hot sauce.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="304">
            <input type="hidden" name="price" value="9.49">
            <input type="hidden" name="name" value="Spicy Jalapeno Burger">
            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- New Burger 2 -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b2.jpg" class="card-img-top" alt="Mushroom Swiss Burger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Mushroom Swiss Burger</h5>
          <span class="price-badge">$8.79</span>
          <p class="text-muted small">Caramelized mushrooms, creamy Swiss cheese & garlic mayo.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="305">
            <input type="hidden" name="price" value="8.79">
            <input type="hidden" name="name" value="Mushroom Swiss Burger">
            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>
            <button type="submit" class="btn add-cart-btn w-100">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </form>
        </div>
      </div>
    </div>

    <!-- New Burger 3 -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="assets/burger/b5.jpg" class="card-img-top" alt="BBQ Ranch Burger">
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">BBQ Ranch Burger</h5>
          <span class="price-badge">$9.29</span>
          <p class="text-muted small">Beef patty, BBQ sauce, ranch dressing, crispy lettuce & cheddar.</p>
          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="306">
            <input type="hidden" name="price" value="9.29">
            <input type="hidden" name="name" value="BBQ Ranch Burger">
            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1" required>
            </div>
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
        Designed by <a href="#">Raihan</a>
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