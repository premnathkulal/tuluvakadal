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

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>

  <body>

    <?php
        require "php/init.php";
        require "php/data_fetcher.php";
        session_start();

        if(!isset($_SESSION['login_status'])){
          $_SESSION['login_status'] = 10;
        }
        
        $post_id = $_SESSION['USER_POST_ID'];
        $post_cat = $_SESSION['USER_POST_CAT'];
        $p_id = $_SESSION['USER_POST_ID'];
        $login_status = $_SESSION['login_status'];
        if($login_status == 0){
          $u_id = $_SESSION['login_user_id'];
        }else{
          $u_id = "x";
        }
        $query = "select * from user_post where id = '$post_id'";
        $post_content = mysqli_query($con, $query);
        $post_data = mysqli_fetch_all($post_content, MYSQLI_ASSOC);
        $post_type = $post_data[0]['post_type'];
        $post_date = $post_data[0]['post_date'];
        $post_article = $post_data[0]['content'];
        $publisher_id = $post_data[0]['user_id'];

        $query = "select * from user_info where id = '$publisher_id'";
        $result = mysqli_query($con, $query);
        $publisher_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $publisher_email = $publisher_data[0]['email'];

        //You can Also read link
        $query = "select * from user_post where verifed = '1'";
        $result = mysqli_query($con, $query);
        $data_1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //You can Also read link
        $query = "select * from user_post where verifed = '1' order by post_date desc";
        $result = mysqli_query($con, $query);
        $data_2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //Get the No of stars
        $query = "select * from post_likes where post_id = $p_id";
        $result = mysqli_query($con, $query);
        $like_count = mysqli_num_rows($result);
        
    ?>
    <!--::header part start::-->
    
    <header class="main_menu home_menu" style="background-color:#1c1130;">
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
                aria-label="Toggle navigation"
              >
                <span class="ti-menu"></span>
              </button>

              <div
                class="collapse navbar-collapse main-menu-item justify-content-center"
                id="navbarSupportedContent"
              >
                <ul class="navbar-nav align-items-center">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                        <?php
                            if($login_status == 0){
                              echo("<a class=\"nav-link\" href=\"upload_post.php\">Publish</a>");
                            }else{
                              ?>
                                <a class="nav-link" onclick='swal("Sorry!", "You have to login to Publish Post!", "warning");'>
                                    Publish
                                </a>
                              <?php
                            }
                        ?>
                  </li>
                  <li class="nav-item">
                          <a class="nav-link" href="learn_tulu.php">Learn_Tulu</a>
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
                            echo("<a class=\"nav-link\" href=\"index.php?#login_section\">LogIn</a>");
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

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_details" id="post_data">
                                <p>
                                  <?php echo $post_article; ?>
                                </p>
                            </div>
                            <br><br>
                            <div class="blog_details">
                               <br><br><br>
                                <ul class="blog-info-link">
                                    <li><a><?php echo $publisher_email; ?></a></li>
                                    <li><a></i><?php echo date('F d y', strtotime($post_date)); ; ?></a></li>
                                    <li>
                                        <a id="star_count" onclick="like_this();">
                                            <span ><?php echo $like_count; ?></span>
                                            <span id="star_d" style="size:500px">&star;</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget search_widget">
                            
                      <form action="" method="POST">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" id="search_k" name="search_k" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" require>
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button id="searchSubmit" type="button" value="123" style="display:none;" data-toggle="modal" data-target="#exampleModal">Search</button>
                              <input class="button rounded-0 primary-bg text-white w-100 btn_1" id="search_ok" value="Search" name="search_ok" type="submit"/>
                              </form>
                        </aside>
                       
                        <?php
                              if(isset($_POST['search_ok'])){ 
                                $_SESSION['search_k'] = $_POST['search_k'];
                                ?>
                                <script type="text/javascript">
                                  $(document).ready(function() {
                                      $(searchSubmit).click();
                                  });
                              </script>
                                <?php
                              }
                        ?>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">You can also Read</h4>
                            <div id="myBtnContainer">
                                <button class="btn1" name="daivaradhane" onclick="filterSelection('daivaradhane')">Daivaradhane</button>
                                <button class="btn1" name="history" onclick="filterSelection('history')"> History</button>
                                <button class="btn1" name="temple" onclick="filterSelection('temple')">Temple</button>
                                <button class="btn1" name="legends" onclick="filterSelection('legends')">Legends</button>
                                <button class="btn1" name="culture" onclick="filterSelection('culture')">Culture</button>
                                <button class="btn1" name="others" onclick="filterSelection('others')">Others</button>
                            </div>
                            <br>

                            <div id="filter">
                            </div>

                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                               
                                <?php $i=0; foreach($data_2 as $row){ 
                                  if(($row['id'] != $post_data[0]['id']) && ($i<5)){
                                      $i += 1;
                                      $id = $row['id'];
                                      $query = "select * from post_likes where post_id = $id";
                                      $result = mysqli_query($con, $query);
                                      $like_c = mysqli_num_rows($result);

                                      $data_a = get_data($row['content']); //from php data fetcher
                                      $date = date('F d y', strtotime($row['post_date'])); 
                                ?>
                                 <div class="media post_item">
                                  <img src="<?php echo $data_a[0]; ?>" alt="post" style="height:100px; width:150px;">
                                  <div class="media-body">
                                      <a href="php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>" >
                                          <h3><?php echo $data_a[1]; ?></h3>
                                      </a>
                                      <p><?php echo $date."<br>".$like_c." &starf;"; ?></p>
                                  </div>
                                  </div>
                                  <?php } 
                                }
                               ?>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <br><br><br>
  <!-- footer part start-->
  <?php include "footer.php"; ?>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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
        <?php
          $query = "select * from post_likes where user_id = '$u_id' and post_id = '$p_id'";
          $result = mysqli_query($con, $query);
          $like_c = mysqli_num_rows($result);
        ?>
        if(<?php echo $like_c; ?> <= 0 ){
          document.getElementById("star_d").innerHTML = "&star;";
        }else{
          document.getElementById("star_d").innerHTML = "&starf;";
        }
        
        function like_this(){
          var temp = <?php echo $_SESSION['login_status']; ?>;
          if(temp == 0){
            <?php
                $query = "select * from post_likes where user_id = '$u_id' and post_id = '$p_id'";
                $result = mysqli_query($con, $query);
                $like_count_1 = mysqli_num_rows($result);
                if($like_count_1 <= 0){
                  $query = "insert into post_likes(user_id, post_id) values($u_id, $p_id)";
                  mysqli_query($con, $query);
                  $like_count += 1;
                }
            ?>
            document.getElementById("star_count").innerHTML = <?php echo $like_count; ?>+" &starf;";
          }else{
							swal("Sorry!", "You have to login to give star!", "warning");
          }
        }

        function filterSelection(c){
          document.getElementById("filter").innerHTML = display_filtered(c);
        }

        function display_filtered(c){
              var temp = "<ul class=\"list cat-list\">";
              temp += "<?php foreach($data_1 as $row){ if($row['id'] != $post_data[0]['id']){ ?>";
              if(c == "<?php echo $row['post_type']; ?>"){
                    temp += "<li>";
                    temp += "<a href=\"php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>\" class=\"d-flex\">";
                    temp += "<p><?php echo $row['topic']; ?></p>";
                    temp += "</a>";
                    temp += "</li>";
              }
              temp += "<?php } } ?>";   
              temp += "</ul>";
              return temp;
        }

        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn1");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }

        for (var i = 0; i < btns.length; i++) {
          if(btns[i].name == '<?php echo $_SESSION['USER_POST_CAT']; ?>'){
            btns[i].className += " active";
          }
        }
        filterSelection('<?php echo $_SESSION['USER_POST_CAT']; ?>');
        

    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:90%;">
      <div class="modal-dialog" style="height:100%;">
        <div class="modal-content" style="height:100%;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Search Results</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <iframe src="search_result.php" style="width:100%; height:100%; border:0px;">
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
