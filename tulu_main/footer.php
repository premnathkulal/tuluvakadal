    <link rel="icon" href="img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css" />
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css" />
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" />

   <!-- footer part start-->
   <footer class="footer-area" style="background-color:#1c1130;">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-sm-6 col-md-3 col-xl-3">
            <div class="single-footer-widget footer_1">
              <a href="index.php">
                <img src="img/logo.png" alt="tuluvakadal"/>
              </a>
              <ul>
                <li>
                  <a href="#">Read about tulunadu</a>
                </li>
                <li>
                  <a href="#">Publish your thoughts</a>
                </li>
                <li>
                  <a href="#">Learn about Tulu</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-md-3">
            <div class="single-footer-widget footer_2" style="color:red;">
              <h4 style="color:white;">Navigation Menu</h4>
              <ul>
                <li>
                  <a href="index.php">Home</a>
                </li>
                <li>
                  <a href="php/post_session.php?post_id=3&catogory=history">Articles</a>
                </li>
                <li>
                  <a href="learn_tulu.php">Learn_Tulu</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-md-3">
            <div class="single-footer-widget footer_2">
              <h4 style="color:white;">Account</h4>
              <ul>
                <?php if($_SESSION['login_status'] != 0){ ?>
                  <li>
                    <a href="./#login_section">Login</a>
                  </li>
                  <li>
                    <a href="./#login_section">Register</a>
                  </li>
                  <li>
                    <a href="contact_us.php">Contact us</a>
                  </li>
                <?php }else{ ?>
                  <li>
                    <a href="contact_us.php">Contact us</a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-md-3">
            <div class="single-footer-widget footer_2">
              <div class="single_contact_info">
                <h3 style="color:white;">Premnath</h3>
                <p>premnathkulal1998@gmail.com</p>
                <p>4VP16CS086</p>
              </div>
              <div class="single_contact_info">
                <h3 style="color:white;">Sharan Kumar I</h3>
                <p>indiansharan1998@gmail.com</p>
                <p>4VP16CS086</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <center>
        <div class="social_icon">
          <a href="https://www.linkedin.com/in/prem-nath-06329a169/" style="color:white"><i class="ti-linkedin"></i></a>
          <a href="https://twitter.com/KulalPremnath" style="color:white"><i class="ti-twitter-alt"></i></a>
          <a href="https://www.facebook.com/premnath.kulal.5" style="color:white"><i class="ti-facebook"></i></a>
          <a href="https://www.instagram.com/nerambolu1234/" style="color:white"><i class="ti-instagram"></i></a>
        </div><br>
        <font color="white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Project is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank"><font color="#00ff40">Tuluvas</a></font>
      </center>
      <!--<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright_part_text text-center">
              <div class="row">
                <div class="col-lg-12">
                  <p class="footer-text m-0" style="color:white;">
                    <div class="social_icon">
                        <a href="index.php" style="color:white"><i class="ti-linkedin"></i></a>
                        <a href="index.php" style="color:white"><i class="ti-twitter-alt"></i></a>
                        <a href="index.php" style="color:white"><i class="ti-google"></i></a>
                        <a href="index.php" style="color:white"><i class="ti-facebook"></i></a>
                        <a href="index.php" style="color:white"><i class="ti-instagram"></i></a>
                    </div><br>
                    <font color="white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Project is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Tuluvas</a>
                   </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <img src="img/animate_icon/icon_2.png" class="animation_icon_2" alt="">
    </footer>

        <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>