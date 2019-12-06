<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

    <script>      
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      };
    </script>
    
    <style>
      .blink {
          animation: blinker 0.9s linear infinite;
          color: #1c87c9;
          font-size: 20px;
          font-weight: bold;
          font-family: sans-serif;
      }
      @keyframes blinker {  
          50% { opacity: 0; }
      }
    </style>
  </head>

  <body>
    <!--::header part start::-->

    <?php
        session_start();
        
        if(!isset($_SESSION['login_status'])){
          $_SESSION['login_status'] = 10;
        }

        $login_status = $_SESSION['login_status'];

        if($login_status == 10){
          $fh = fopen('php/visiter_count.txt','r+');
          $count = intval(fgets($fh))+1;
          fseek($fh,0);
          //$count += 1;
          fputs($fh,$count);
          fclose($fh);
        }
    ?>
    
    <header class="main_menu home_menu">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="#">Home</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="blog.html"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                    Articles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="cursor:default;">
                      <a class="dropdown-item" onclick="ban_disp('history');">History</a>
                      <a class="dropdown-item" onclick="ban_disp('worship');">Nagaradhane</a>
                      <a class="dropdown-item" onclick="ban_disp('daivaradhane');">Daivaradhane</a>
		                  <a class="dropdown-item" onclick="ban_disp('story');">Stories</a>
                      <a class="dropdown-item" onclick="ban_disp('yakshagana');">Yakshagana</a>
                      <a class="dropdown-item" onclick="ban_disp('temple');">Temples</a>
		                  <a class="dropdown-item" onclick="ban_disp('culture');">Culture</a>
                    </div>
                  </li>
		
		                    <li class="nav-item">
                          <a class="nav-link" href="learn_tulu.php">Learn Tulu</a>
                        </li>
                        <li class="nav-item">
                        <?php
                          if($login_status == 0){
                            echo("<a class=\"nav-link\" href=\"upload_post.php\">Publish</a>");
                          }else{
                            echo("<a class=\"nav-link\" href=\"#login_section\">Publish</a>");
                          }
                        ?>
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

    <!-- banner part start-->
    <section class="banner_part">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 offset-lg-1">
            <div class="banner_text">
              <div class="banner_text_iner">
                <h1>Welcome To The Tulu World</h1>
                <h5>Aware our Culture</h5>
                <?php
                  if($login_status != 0){
                      echo("<a href=\"#login_section\" class=\"btn_1\">Login/Register</a>");
                  }
                  if(($login_status == 0) && ($_SESSION['login_user'] == 'premnathkulal1998@gmail.com')){
                    echo("<a href=\"profile.php?qid=1\" class=\"btn_1\"><p class='blink'>Wellcome Admin</p></a>");
                 }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!------------------------------- Banner Part Start ---------------------------------->
    <script>
        function ban_disp(ban_id){
          document.getElementById("history").style.display = "none";
          document.getElementById("worship").style.display = "none";
          document.getElementById("story").style.display = "none";
          document.getElementById("daivaradhane").style.display = "none";
          document.getElementById("yakshagana").style.display = "none";
          document.getElementById("temple").style.display = "none";
          document.getElementById("culture").style.display = "none";
          document.getElementById("ser_list").style.display = "none";
          document.getElementById(ban_id).style.display = "block";
          window.location = "#"+ban_id
        }
    </script>

    <section class="about_us section_padding" id="history" style="display:none;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Why Tulunad is<br>
                            Parashurama shristi ?</h2>
                        <p><font color="black">It was Parashurama, who is said to be the sixth Avatara of Lord Vishnu 
                        according to Hindu mythology who made it a part of the land.
                        Parashurama was a Brahmin and was the son of sage Jamadagni and his wife Renuka.</font></p>
                        <a href="php/post_session.php?post_id=3&catogory=history" class="btn_2">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img" height="10%">
                        <img src="img/god/parashuram.png" alt="" >
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us right_time" id="worship" style="display:none;">
      <br><br><br>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/nagaradhane.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Naaga Aaradhane In Tulunad</h2>
                        <p>Nagaradhane is a form of snake worship which, along with Bhuta Kola, is one of the unique traditions prevalent in Coastal districts of 
                        Dakshina Kannada, Udupi and Kasaragod alternatively known as Tulu Nadu,...</p>
                        <a href="php/post_session.php?post_id=94&catogory=culture" class="btn_2">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </section>
    <section class="about_us section_padding" id="story" style="display:none;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>History of<br>Panjurli Daiva</h2>
                        <p>Saw shall light. Us their to place had creepeth day
                            night great wher appear to. Hath, called, sea called,
                            gathering wherein open make living Female itself
                            gathering man. Waters and, two. Bearing. Saw she'd
                            all let she'd lights abundantly blessed.</p>
                        <a href="php/post_session.php?post_id=4&catogory=daivaradhane" class="btn_2">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/panjurli.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us right_time" id="temple" style="display:none;"> 
      <br><br><br>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/dharmastal.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Shree Kshetra Dharmasthala</h2>
                        <p>Dharmasthala, a sacred place, as the name suggests is a place of Truth, 
                        Faith, Communal harmony, Cultural Tolerance and spiritual experience in the Holy Land. Here, 
                        everyone enjoys the generous hospitality without any distinction of caste, creed or class whatsoever. </p>
                        <a href="php/post_session.php?post_id=6&catogory=temple" class="btn_2">Read More</a>
                    </div>
                </div>
            </div>
        </div>
     <br><br><br><br>
    </section>
    <section class="about_us section_padding" id="daivaradhane" style="display:none;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <img src="img/icon/Icon_1.png" alt="">
                        <h2>What is Daivaradhane<br></h2>
                        <p><font color="black">A form of worship in Tulunadu!! 
                        This worshipping practice is followed in south coastal districts of Karnataka and north Kerala. 
                        It's known as bhoothakola in karnataka and theyyam in Kerala.</font></p>
                        <a href="php/post_session.php?post_id=1&catogory=daivaradhane" class="btn_2">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/panjurli_moga.png" alt="123">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us right_time" id="yakshagana" style="display:none;"> 
      <br><br><br>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/yakshagana.jpeg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Yakshagana</h2>
                        <p>Yakshagana is a traditional Indian theatre form, developed in 
                        Dakshina Kannada , Udupi and Uttara Kannada districts, in the state of 
                        Karnataka and in Kasaragod district in Kerala that combines dance, music, dialogue, costume, make-up,
                         and stage techniques with a unique style and form. </p>
                        <a href="php/post_session.php?post_id=6&catogory=temple" class="btn_2">Read More</a>
                    </div>
                </div>
            </div>
        </div>
     <br><br><br><br>
    </section>
    <section class="about_us section_padding" id="culture" style="display:none;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <img src="img/icon/Icon_1.png" alt="">
                        <h2>Kambala<br></h2>
                        <p><font color="black">A kambala  is an annual baffallo race held in the southwestern 
                        Indian state of Karnataka. Traditionally, it is sponsored by local Tuluva landlords and 
                        households in the coastal districts of South canara and Udupi, a region collectively known as Tulu Nadu. 
                        The kambla season generally starts in November and lasts until March. </font></p>
                        <a href="php/post_session.php?post_id=47&catogory=culture" class="btn_2">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="img/god/culture_kamala.jpg" alt="123">
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </section>
    
    <!-- our_service start-->
    <section class="our_service" id="ser_list" style="display:block;">
      <div class="container">
          <br><center><h2>What You can Do Here !!</center></h2><br><br>
        <div class="row">
         
          <div class="col-sm-6 col-xl-4">
          <a onclick="upload_p();">
            <div class="single_feature">
              <div class="single_service">
                <h4><br>
                  Publish Your Posts
                </h4>
                <p>
                  <font color="black">You can publish Tulu 
                  related posts, stories, articles and
                  your ideas related to tulu in this wesite.</font>
                  <br><br></p>
              </div>
             </div>
            </a>
          </div>
          <div class="col-sm-6 col-xl-4">
           <a href="php/post_session.php?post_id=3&catogory=history">
            <div class="single_feature">
              <div class="single_service">
                <h4><br>Read Articles</h4>
                <p>
                <font color="black">You can read the posts, stories 
                pulished by the peoples in this site. You can give 
                stars to the posts pulished y the users</font>
                  <br><br></p>
              </div>
            </div>
            </a>
          </div>
          <div class="col-sm-6 col-xl-4">
           <a href="learn_tulu.php">
            <div class="single_feature">
              <div class="single_service">
                <h4><br>Learn Tulu</h4>
                <p>
                <font color="black">Leran Tulu scripts or lipi, Tulu words 
                through Kannada or English. Learn how to 
                write using Tulu lipi using this site.</font>
                  <br><br></p>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
      <br><br><br><br><br>
    </section>
    <!-- our_service part end-->
  
<!----------------------------- End Of Banner Part --------------------------------------->

	<?php
      if($login_status != 0){
  ?>
          <!-- our_service start-->
          <br>
          <section class="our_service">
              <div class="container">
                <div class="row">

          
                  <div class="col-sm-6 col-xl-6">
                    <div class="single_feature">

                        <h4>Publish Your Posts or Articles</Article></h4>
                        <p>
                          Inorder to Publish your Posts or Articles
                          You need to Login to your account.
                        </p>
                        <p>
                          Your posts were checked by our team
                          If you face any issue please <a href="contact_us.php">Contact Us</a>
                        </p>
                    </div>
                  </div>

                <div class="col-sm-6 col-xl-6">
                    <div class="single_feature" id="log_section">
                      

                        <script>
                              var login = "<div class=\"single_service\" id=\"login_section\">";
                              login += "<h4><center><br>Login</center></h4>";
                              login += "<form action=\"php/login.php\" method=\"POST\">";
                              login += "<ul>";
                              login += "<li><center><input type=\"email\" id='login_mail' name=\"email\" placeholder=\"Email\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              login += "<li><center><input type=\"password\" id='login_pass' name=\"password\" placeholder=\"Password\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              login += "<li><center><button class=\"button\" style=\"width:60%\">Login</button></center></li><li><center><input type=\"text\" name=\"unaadjustment\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 0px solid #fff; border-radius: 4px; box-sizing: border-box; background-color:rgba(0,0,0,0);\" readonly=\"\"></center></li>";
                              login += "<li style='cursor:pointer;'><center><a onclick=\"reset_toggle_login_register('0')\"><font color=\"blue\"><h5><strong>Register Here</strong></h5></font></a><li>";
                              login += "</ul>";
                              login += "<ul>";
                              login += "</div>";

                              var register = "<div class=\"single_service\" id='register_section'>";
                              register += "<h4><center><br>Register</center></h4>";
                              register += "<form action=\"php\\register.php\" method=\"POST\">";
                              register += "<ul>";
                              register += "<li><center><input type=\"text\" name=\"name\" placeholder=\"Name\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              register += "<li><center><input type=\"email\" id='user_email' name=\"email\" placeholder=\"Email\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              register += "<li><center><input type=\"tel\" name=\"phone\" placeholder=\"Phone Number\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              register += "<li><center><input type=\"text\" name=\"city\" placeholder=\"City\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              register += "<li><center><input type=\"password\" name=\"password\" placeholder=\"Password\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;\" required></center><br></li>";
                              register += "<li><center><button class=\"button\" style=\"width:60%\">Register</button></center></li><li><center><input type=\"text\" name=\"unaadjustment\" style=\"width: 100%; padding: 12px 20px; margin: 8px; display:inline-block; border: 0px solid #fff; border-radius: 4px; box-sizing: border-box; background-color:rgba(0,0,0,0);\" readonly=\"\"></center></li>";
                              register += "<li style='cursor:pointer;'><center><a onclick=\"reset_toggle_login_register('1')\"><h5><strong>Login Here</strong></h5></a></li>";
                              register += "</ul>";
                              register += "<ul>";
                              register += "</div>";

                          function toggle_login_register(temp)
                          { 
                              if(temp == "1" && <?php echo $login_status; ?> == 1){
                                  // Error while loging in
                                  document.getElementById("log_section").innerHTML = login;
                                  document.getElementById("login_mail").style.border = '1px solid red';
                                  document.getElementById("login_pass").style.border = '1px solid red';
                                  document.getElementById("login_section").style.border = '1px solid red';
                              }
                              else if(<?php echo $login_status; ?> == 2){
                                  // User already exists
                                  document.getElementById("log_section").innerHTML = register;
                                  document.getElementById("user_email").style.border = '1px solid red';
                              }
                              else if(temp == "1" && <?php echo $login_status; ?> == 10){
                                  <?php $_SESSION['login_status'] = 10; ?>
                                  document.getElementById("log_section").innerHTML = login;
                              }else if(temp == "0" && <?php echo $login_status; ?> == 10){
                                  document.getElementById("log_section").innerHTML = register;
                              } 
                          }
            
                          function reset_toggle_login_register(temp){ 
                              if(temp == "1"){
                                  document.getElementById("log_section").innerHTML = login;
                              }else{
                                  document.getElementById("log_section").innerHTML = register;
                              }    
                          }
                          
                          toggle_login_register("1");

                          </script>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- our_service part end-->
    <?php } ?>

   <br><br>
    <!--::review_part end::-->
    <div class="review_part padding_bottom" id="testimonial">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-7">
            <div class="section_tittle text-center">
              <h2>Our Team</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="review_part_text owl-carousel">
              <div class="singler_eview_part">
                <div class="client_info">
                  <img src="img/prem.jpeg" alt="" style="border-radius: 100px;"/>
                  <h4>PREMNATH</h4>
                  <p>[ 4VP16CS066 ]</p>
                </div>
                <p>
                  Vivekananda college of Engineering and Technology
                  puttur D.K.
                </p>
              </div>
              <div class="singler_eview_part">
                <div class="client_info">
                  <img src="img/sharan.jpeg" alt="" style="border-radius: 100px;"/>
                  <h4>SHARAN KUMAR I</h4>
                  <p>[ 4VP16CS086 ]</p>
                </div>
                <p>
                  Vivekananda college of Engineering and Technology
                  puttur D.K.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--::review_part end::-->

    <!--::cta_part start::-->
    <div class="cta_part">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="cta_iner">
              <h1>Let’s create something awesome together</h1>
              <?php
                  if($login_status != 0){
                      echo("<a href=\"#login_section\" class=\"btn_1\">Login/Register</a>");
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--::cta_part end::-->
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
    
    <script>      
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      };      
      function upload_p(){
          if(<?php echo $login_status; ?> == 0){
            window.location = "upload_post.php";
          }else{
            swal("Sorry!", "You have to login to Publish Post!", "warning");
            toastr.warning("Successully updated");
          }
      }
    </script>
    
  </body>
</html>
