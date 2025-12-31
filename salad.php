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
    background: rgba(8, 9, 10, 0.42); 
    z-index: 1;
    border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
}

.hero-title {
  font-size: 3rem;
  font-weight: 800;
  color: white;
  text-shadow: 0 3px 10px rgba(0,0,0,0.5);
  background: rad;
  z-index: 11;
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
   MODERN MENU CARDS
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
  background: #423E3E;
  color: #fff;
  border-radius: 40px;
  transition: 0.2s;
}

.add-cart-btn:hover {
  background: #ffc107;
  color: black;
}

/* Footer style */
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



<!-- HERO SECTION -->
<div class="hero-section">
  <h1 class="hero-title">Fresh & Healthy Salad Menu</h1>
</div>


<!-- MENU SECTION -->
<section class="menu-section container">

  <h2 class="menu-title text-center">Choose Your Favorite Salad</h2>

  <div class="row g-4 justify-content-center">

    <!-- START OF YOUR CARDS (all items remain the same) -->
    <!-- You only changed the design, not your content -->

    <!-- Greek Salad -->
    <div class="col-lg-4 col-md-6 col-sm-10">
      <div class="card menu-card text-center h-100">
        <img src="https://www.simplyrecipes.com/thmb/0NrKQlJ691l6L9tZXpL06uOuWis=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Simply-Recipes-Easy-Greek-Salad-LEAD-2-4601eff771fd4de38f9722e8cafc897a.jpg" class="card-img-top">
        
        <div class="card-body d-flex flex-column">
          <h5 class="fw-bold">Greek Salad</h5>
          <span class="price-badge">$6.99</span>
          <p class="text-muted small">Crisp romaine, Kalamata olives, feta cheese, and lemon vinaigrette.</p>

          <form method="post" action="add_to_cart.php" class="mt-auto">
            <input type="hidden" name="product_id" value="101">
            <input type="hidden" name="price" value="6.99">
            <input type="hidden" name="name" value="Greek Salad">

            <div class="input-group mb-3">
              <span class="input-group-text">Qty</span>
              <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
            </div>

            <button class="btn add-cart-btn w-100">
              Add to Cart <i class="fas fa-shopping-cart"></i>
            </button>
          </form>
        </div>
      </div>
    </div>


    <div class="col-lg-4 col-md-6 col-sm-10"> 
  <div class="card menu-card text-center h-100">
    <img src="assets/salad/s1.jpg" class="card-img-top">

    <div class="card-body d-flex flex-column">
      <h5 class="fw-bold">Avocado Lime Salad</h5>
      <span class="price-badge">$7.49</span>
      <p class="text-muted small">Creamy avocado slices mixed with crunchy greens and fresh lime dressing.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="107">
        <input type="hidden" name="price" value="7.49">
        <input type="hidden" name="name" value="Avocado Lime Salad">

        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
        </div>

        <button class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-10"> 
  <div class="card menu-card text-center h-100">
    <img src="assets/salad/s2.jpg" class="card-img-top">

    <div class="card-body d-flex flex-column">
      <h5 class="fw-bold">Tropical Pineapple Bowl</h5>
      <span class="price-badge">$6.49</span>
      <p class="text-muted small">Sweet pineapple with cucumbers, mint, and light chili-lime dressing.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="108">
        <input type="hidden" name="price" value="6.49">
        <input type="hidden" name="name" value="Tropical Pineapple Bowl">

        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
        </div>

        <button class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
  </div>
</div>




<div class="col-lg-4 col-md-6 col-sm-10"> 
  <div class="card menu-card text-center h-100">
    <img src="assets/salad/s3.jpg"" class="card-img-top">

    <div class="card-body d-flex flex-column">
      <h5 class="fw-bold">Spicy Bean & Corn Salad</h5>
      <span class="price-badge">$7.99</span>
      <p class="text-muted small">Black beans, sweet corn, tomatoes, avocado, and spicy chili dressing.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="109">
        <input type="hidden" name="price" value="7.99">
        <input type="hidden" name="name" value="Spicy Bean & Corn Salad">

        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
        </div>

        <button class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
  </div>
</div>



<div class="col-lg-4 col-md-6 col-sm-10"> 
  <div class="card menu-card text-center h-100">
    <img src="assets/salad/s4.jpg" class="card-img-top">

    <div class="card-body d-flex flex-column">
      <h5 class="fw-bold">Mediterranean Chickpea Salad</h5>
      <span class="price-badge">$8.49</span>
      <p class="text-muted small">Chickpeas, tomatoes, cucumbers, parsley, and olive oil lemon dressing.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="110">
        <input type="hidden" name="price" value="8.49">
        <input type="hidden" name="name" value="Mediterranean Chickpea Salad">

        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
        </div>

        <button class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
  </div>
</div>




<div class="col-lg-4 col-md-6 col-sm-10"> 
  <div class="card menu-card text-center h-100">
    <img src="assets/salad/s5.jpg"" class="card-img-top">

    <div class="card-body d-flex flex-column">
      <h5 class="fw-bold">Watermelon Mint Bowl</h5>
      <span class="price-badge">$5.49</span>
      <p class="text-muted small">Juicy watermelon, mint leaves, lime juice, and a touch of honey.</p>

      <form method="post" action="add_to_cart.php" class="mt-auto">
        <input type="hidden" name="product_id" value="111">
        <input type="hidden" name="price" value="5.49">
        <input type="hidden" name="name" value="Watermelon Mint Bowl">

        <div class="input-group mb-3">
          <span class="input-group-text">Qty</span>
          <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
        </div>

        <button class="btn add-cart-btn w-100">
          Add to Cart <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
  </div>
</div>

    <!-- KEEP ALL YOUR OTHER CARDS SAME STRUCTURE -->
    <!-- They will automatically look modern with the new CSS -->

    <?php /* Your remaining salad cards go here (Caesar, Fruit Salad, Mango, Quinoa etc.) */ ?>

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