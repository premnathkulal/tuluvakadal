<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Learn Tulu</title>
</head>

<body>
    <?php
        require "php/init.php";
        $query = "select * from tulu_chapter";
        $result = mysqli_query($con, $query);
        $chapters = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $query = "select * from tulu_topic";
        $result = mysqli_query($con, $query);
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#1c1130">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <?php foreach($chapters as $row){ ?>   
                                <?php $id = $row['id'] ?> 
                                <li class="nav-item ">
                                    <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#<?php echo $id;?>" aria-controls="submenu-1">
                                        <?php echo $row['chapter_name']; ?>
                                    </a>
                                    <div id="<?php echo $id;?>" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <?php foreach($topics as $topic){ ?>
                                                <?php if($topic['chapter_id'] == $id){ ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" onclick="show_post('<?php echo $topic['id']; ?>')" ><?php echo $topic['topic']; ?></a>
                                                    </li>
                                            <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>              
                                </li>
                            <?php } ?>                             
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content" >
                    <!-- ============================================================== -->
                    <?php foreach($topics as $row){ ?>
                        <div class="col-20" style="display:none;" id="<?php echo $row['id'] ?>">
                            <div class="card">
                                <br><h5 class="card-header"><?php echo $row['content']; ?></h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                    </div>
                                </div>
                            </div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Date of Posted : <?php echo $row['date']; ?></li>
                            </ol>
                        </div>
                    <?php } ?>
                    <!--============================ Home page =======================================-->
                    <div class="col-20"  style="display:block;" id="Home_content_div" >
                        <div class="card">
                            <h1 class="card-header" style="background-color:red; background-image: url('img/cool_back.jpeg'); background-size: cover;">
                                <center>
                                <br><image src="img/tulu_lipi.png"><br><br>Learn Tulu<br><br>
                                    ( Thank You For Your Intrest On Learning Tulu )
                                </center>
                                <br>
                            </h1>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- ============================================================================ -->
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    
    <script>
        function show_post(post_id){
            var arr = document.getElementsByClassName('col-20');
            for(var i=0; i<arr.length; i++){
                arr[i].style.display="none";
            }
            document.getElementById(post_id).style.display="block";
        }
    </script>
</body>
 
</html>