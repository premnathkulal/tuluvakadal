
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Tuluvakadal</title>
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
    <link rel="icon" href="img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="ckeditor/ckeditor.js"></script>

  </head>

  <body>    <!--::header part start::-->

        <?php
            session_start();
            $login_status = $_SESSION['login_status'];
        ?>

        <header class="main_menu home_menu" style="background-color: #1c1130;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="logo" />
                  </a>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                  </button>

                  <div
                    class="collapse navbar-collapse main-menu-item justify-content-center"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                      </li>


                            <li class="nav-item">
                              <a class="nav-link" href="Learn_tulu">Learn_Tulu</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="contact_us.php">Contact</a>
                            </li>
                            <li class="nav-item">
                            <?php
                              if($login_status == 0){
                                echo("<a class=\"nav-link\" href=\"profile.php?qid=1\">Profile</a>");
                              }
                            ?>
                          </li>
                          <li class="nav-item">
                          <?php
                              if($login_status == 0){
                                echo("<a class=\"nav-link\" href=\"php\\logout.php\">LogOut</a>");
                              }else{
                                echo("<a class=\"nav-link\" href=\"#login_section\">LogIn</a>");
                              }
                            ?>
                          </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </header>
        <!-- Header part end-->
          <br><br><br><br><br><br>
          <!-- our_service start-->
          <section class="our_service">
              <div class="container">

                <form action="" method="POST">
                  <textarea class="ckeditor" name="editor"></textarea>
                  <br>
                  Enter the Topic name : <input type="text" name="topic" required>
                  <br><br>
                  Select Post Catogory : 
                  
                  <input type="text" list="cars" name = "catogory"  required/>
                  <datalist id="cars">
                  <option value = "daivaradhane"></option>
                      <option value = "history"></option>
                      <option value = "temple"></option>
                      <option value = "legends"></option>
                      <option value = "culture"></option>
                      <option value = "others"></option>
                  </datalist>
                  <br><br><br>
                  <input class="button" type="submit" name="submit_me"/>&nbsp;&nbsp;&nbsp;
                </form>

              </div>
            </section>
            <!-- our_service part end-->
    <br><br><br>
     <!-- footer part start-->
     <?php include "footer.php"; ?>
    
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
    
  </body>
</html>

<?php 
  if(isset($_POST['submit_me'])){
    
    require "php/init.php";
    $topic = $_POST['topic'];
    $text = $_POST['editor'];
    $user_id = $_SESSION['login_user_id']; // new !!
    $today =  date("Y-m-d");
    $category = $_POST['catogory']; 
    $query = "INSERT INTO user_post(user_id,topic,post_date,post_type,content,verifed) VALUES ('$user_id','$topic','$today','$category','$text','0');";
		if(mysqli_query($con,$query)){
      echo "Success";
    }else{
      echo "No";
    }
  }
?>