<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="view/assets/images/favicon.png">
    <?php include("./view/title.php"); ?>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>


  </head>

<body>

  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo">
                        <img src="assets/images/wFISlogo.png" style="width: 220px;" alt="">
                    </a>
                    
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="view/a-login.php">Login as Adminsitrator</a></li>
                        <li><a href="view/login.php">Login as Employee</a></li>
                    
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                 
                </nav>
            </div>
        </div>
    </div>
  </header>
 

  <section id="section-1">
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
      <input type="radio" id="banner2" class="sec-1-input" name="banner">
      <input type="radio" id="banner3" class="sec-1-input" name="banner">
      <input type="radio" id="banner4" class="sec-1-input" name="banner">
      <div class="slider">
        <div id="top-banner-1" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Monitor plans for efficient execution and timely adjustments</h2>
              <h1>Operational Plan Monitoring</h1>
              <div class="border-button"><a href="view/a-login.php">Login as Administrator</a> <a href="view/login.php">Login as Employee</a></div>
            </div>
         
          </div>
        </div>
        <div id="top-banner-2" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Track key performance indicators to align with operational goals</h2>
              <h1>Operational Plan Matrix</h1>
              <div class="border-button"><a href="view/a-login.php">Login as Administrator</a> <a href="view/login.php">Login as Employee</a></div>
            </div>
            
          </div>
        </div>
        <div id="top-banner-3" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Simplify user access, roles, and permissions for secure collaboration.</h2>
              <h1>User Management</h1>
              <div class="border-button"><a href="view/a-login.php">Login as Administrator</a> <a href="view/login.php">Login as Employee</a></div>
            </div>
            
          </div>
        </div>
        <div id="top-banner-4" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Convert data into insights to drive informed, performance-boosting decisions</h2>
              <h1>Analytical Data</h1>
              <div class="border-button"><a href="view/a-login.php">Login as Administrator</a> <a href="view/login.php">Login as Employee</a></div>
            </div>
           
          </div>
        </div>
      </div>
      <nav>
        <div class="controls">
          <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
          <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
          <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
          <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
        </div>
      </nav>
    </div>
  </section>


 

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2025
          <br>Batangas State University - The National Engineering University: Faculty Information System</p>
        </div>
      </div>
    </div>
  </footer>



  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>

  </body>

</html>
