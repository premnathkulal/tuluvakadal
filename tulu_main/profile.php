<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <title>Profile page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--<link rel="stylesheet" href="css/for_profile/bootstrap.min.css">
        <script src="js/for_profile/jquery.min.js"></script> -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style> 
            table { 
                border-collapse: collapse; 
                width: 100%; 
            } 
            
            th, td { 
                text-align: left; 
                padding: 8px; 
            } 
            
            tr:nth-child(even) { 
                background-color: rgba(0,0,0,0.2); 
            } 

            tr:nth-child(odd) { 
                background-color: rgba(0,0,0,0.1); 
            } 
            #myInput1, #myInput2, #myInput3 {
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }

            #myTable {
                border-collapse: collapse; /* Collapse borders */
                width: 100%; /* Full-width */
                border: 1px solid #ddd; /* Add a grey border */
                font-size: 18px; /* Increase font-size */
            }


            #myTable tr {
                /* Add a bottom border to all table rows */
                border-bottom: 1px solid #ddd;
            }

            #myTable tr.header, #myTable tr:hover {
                /* Add a grey background color to the table header and on hover */
                background-color: #f1f1f1;
            }
            .blinking{
                    animation:blinkingText 1.5s infinite;
            }
            @keyframes blinkingText{
                0%{     color: red;    }
                50%{    color: transparent; }
                100%{   color: red;    }
            }

            .topnav {
                overflow: hidden;
                background-color: #333;
                height:80px;
            }

            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 10px 20px;
                text-decoration: none;
                font-size: 27px;
            }

            .topnav a.active {
                background-color: #4CAF50;
                color: white;
            }
        </style> 

    </head>
    <body>
        <?php
            session_start();
            $login_status = $_SESSION['login_status'];
            if($login_status == 0){
        ?>
            <div class="topnav" style="background-color: #30224b;">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="logo" />
                </a>
                <a href="php/logout.php" style="float:right; "><h4>LogOut</h4></a>
                <!-- <a href="#news">News</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a> -->
            </div>

            <?php
                require "php/init.php";

                $email = $_SESSION['login_user'];
                $query = "SELECT * FROM user_info WHERE email = '$email'";
                $result = mysqli_query($con,$query); 
                $post_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $n = $post_data[0]['name']; 
                $c = $post_data[0]['city'];
                $p = $post_data[0]['phoneNumber'];
                $pic = $post_data[0]['profile_image'];

                $query = "SELECT * FROM user_info";
                $register_count = mysqli_num_rows(mysqli_query($con,$query));

                $u_id = $_SESSION['login_user_id'];
                $query = "SELECT * FROM user_post WHERE user_id = '$u_id'";
                $your_posts = mysqli_query($con,$query);
                $post_count = mysqli_num_rows($your_posts);
                $your_posts = mysqli_fetch_all($your_posts, MYSQLI_ASSOC);

                $query = "SELECT * FROM user_post";
                $all_posts = mysqli_query($con,$query);
                $all_post_count = mysqli_num_rows($all_posts);
                $all_posts = mysqli_fetch_all($all_posts, MYSQLI_ASSOC);

                $query = "SELECT * FROM user_post where verifed = 0";
                $new_post_count = mysqli_num_rows(mysqli_query($con,$query));
            
                $query = "SELECT DISTINCT ul.id FROM post_likes as ul,user_post as up WHERE ul.post_id = up.id and up.user_id = '$u_id'";
                $like_count = mysqli_num_rows(mysqli_query($con,$query));

                $visitors_count = fgets(fopen('php/visiter_count.txt','r'));

            ?>

            <br><br><br><br>
            <div class="container bootstrap snippet">
            
                <div class="row">
                    <div class="col-sm-3"><!--left col-->
                        
                <div class="text-center">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php 
                            if($pic != 1){
                                echo '<img src="data:image/png;base64,'.base64_encode($pic).'" class="avatar img-circle img-thumbnail" alt="avatar" onclick="select_image();" style="width:150px; height:150px; border-radius:50px;">';
                            }else{
                                ?><img src="img/user_profile.png" class="avatar img-circle img-thumbnail" alt="avatar" onclick="select_image();" style="width:150px; height:150px; border-radius:50px;"><?php
                            }
                        ?>
                        <h4><?php echo $_SESSION['login_user']; ?></h4>
                        <input id="file"  name="profile_pic" type="file" class="text-center center-block file-upload" style="display:none;">
                        <input id="submit_pic" name="update_pic" type="submit" class="text-center center-block file-upload" style="display:none;">
                    </form>
                </div></hr><br>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Your Activity <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span><?php echo $post_count; ?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span><?php echo $like_count; ?></li>
                    </ul> 

                    <?php if($email == 'premnathkulal1998@gmail.com'){ ?>
                        <ul class="list-group">
                            <li class="list-group-item text-muted">Overall Activity <i class="fa fa-dashboard fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Posts</strong></span><?php echo $all_post_count; ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Registers</strong></span><?php echo $register_count; ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Visitors Count</strong></span><?php echo $visitors_count; ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong><a href="upload_learn_tulu.php">Manage Learn Tulu</a></strong></span></li>
                        </ul> 
                    <?php } ?>
                    
                    </div><!--/col-3-->
                    <div class="col-sm-9">
                        <ul class="nav nav-tabs">
                            <li <?php if ($_GET['qid'] == 1 ) {echo 'class="active"';}?>>
                                <a data-toggle="tab" href="#home">Profile</a>
                            </li>
                            <li <?php if ($_GET['qid'] == 2 ) {echo 'class="active"';}?>>
                                <a data-toggle="tab" href="#your_post">Your Posts</a>
                            </li>
                            <?php if($email == 'premnathkulal1998@gmail.com'){ ?>
                                <li <?php if ($_GET['qid'] == 3 ) {echo 'class="active"';}?>>
                                    <a data-toggle="tab" href="#new_post">
                                        New Posts
                                        <?php if($new_post_count > 0){ ?>
                                            <span class="blinking">
                                                <?php echo $new_post_count; ?>
                                            </span>
                                        <?php
                                            }
                                        ?>
                                    </a>
                                </li>
                                <li <?php if ($_GET['qid'] == 4 ) {echo 'class="active"';}?>>
                                    <a data-toggle="tab" href="#all_post">All Posts</a>
                                </li>
                            <?php } ?>
                        </ul>

                        
                    <div class="tab-content">
                        <div id="home" <?php if ($_GET['qid'] == 1 ) {echo 'class="tab-pane active"';}else{echo 'class="tab-pane"';} ?>>
                        
                            <form class="form" action="" method="POST">
                                
                                <div class="form-group">
                                    
                                    <div class="col-xs-7">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" style="border:0px;" class="form-control" value="<?php echo $_SESSION['login_user']; ?>" name="email" id="email" placeholder="you@email.com" title="enter your email." readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-7">
                                        <label for="first_name"><h4>Name</h4></label>
                                        <input type="text" style="border:0px;" class="form-control" value="<?php echo $n; ?>" name="name" id="name" placeholder="first name" title="enter your first name if any." readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-xs-7">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" style="border:0px;" class="form-control" value="<?php echo $p; ?>" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any." readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    
                                    <div class="col-xs-7">
                                        <label for="city"><h4>Location</h4></label>
                                        <input type="text" style="border:0px;" class="form-control" value="<?php echo $c; ?>" name = "city" id="location" placeholder="somewhere" title="enter a location" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-xs-12">
                                            <br>
                                            <button id="save" style="display:none;" name="update_profile" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Save</button>
                                            <button id="edit" style="display:block;" onclick="toggle();" class="btn btn-lg btn-success" type="button"><i class="glyphicon glyphicon-ok-edit"></i>&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button>
                                        </div>
                                </div>
                            </form>
                        
                        <hr>
                        
                        </div><!--/tab-pane-->
                        <div id="your_post" <?php if ($_GET['qid'] == 2 ) {echo 'class="tab-pane active"';}else{echo 'class="tab-pane"';} ?>>
                        
                        <h2></h2>
                        
                        <hr>
                            <div class="form"  id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-10">
                                        <input type="text" id="myInput1" onkeyup="myFunction(1)" placeholder="Search here..">
                                        <table  id="myTable1" width="200%" border="0px" >
                                            <?php foreach($your_posts as $row) { 
                                                $id = $row['id'];
                                                $query = "SELECT DISTINCT id FROM post_likes WHERE post_id = '$id'";
                                                $like_c = mysqli_num_rows(mysqli_query($con,$query)); ?>
                                                <tr>
                                                    <form action="" method="POST">
                                                        <td><a href="php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>" target="_block"><?php echo($row['topic']); ?></a></td>
                                                        <td><?php echo $like_c; ?>&starf;</td>
                                                        <td><input type="text" value="<?php echo $id; ?>" id="your_post_id" name="your_post_name" style="display:none" readonly/></td>
                                                        <td>
                                                            <button type="submit" name="delete_your_post" id="delete_your_post" style="display:block; border:0px; border-radius:100px;">
                                                                <span>
                                                                    <i class="fa fa-trash" style="font-size:28px;color:red"></i>
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>                    
                        </div><!--/tab-pane-->
                    
                    <div id="new_post" <?php if ($_GET['qid'] == 3 ) {echo 'class="tab-pane active"';}else{echo 'class="tab-pane"';} ?>>
                        
                        <h2></h2>
                        
                        <hr>
                            <div class="form"  id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-10">
                                    <input type="text" id="myInput2" onkeyup="myFunction(2)" placeholder="Search here..">
                                        <table id="myTable2"  width="200%" border="0px">
                                            <?php foreach($all_posts as $row) { 
                                                if($row['verifed'] == 0){
                                                    $id = $row['id'];
                                                    $query = "SELECT DISTINCT id FROM post_likes WHERE post_id = '$id'";
                                                    $like_c = mysqli_num_rows(mysqli_query($con,$query)); ?>
                                                    <tr>
                                                        <form action="" method="POST">
                                                            <td><a href="php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>" target="_block"><?php echo($row['topic']); ?></a></td>
                                                            <td style="display:block;"><?php echo $like_c; ?>&starf;<td>
                                                            <td><input type="text" value="<?php echo $id; ?>" name="new_post" style="display:none" /></td>
                                                            <td>
                                                                <button type="submit" name="delete_new_post" id="delete_your_post" style="display:block; border:0px; border-radius:100px;">
                                                                    <span>
                                                                        <i class="fa fa-trash" style="font-size:28px;color:red"></i>
                                                                    </span>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <button type="submit" name="verify_post" id="verify_post" style="display:block; border:0px; border-radius:100px;">
                                                                    <i class="fa fa-check-circle" style="font-size:28px;color:green"></i>
                                                                </button>
                                                            </td>
                                                        </form>
                                                    </tr>
                                            <?php }} ?>
                                        </table>
                                    </div>
                                </div>
                            </div>                    
                        </div><!--/tab-pane-->

                        <div id="all_post" <?php if ($_GET['qid'] == 4 ) {echo 'class="tab-pane active"';}else{echo 'class="tab-pane"';} ?>>
                        
                        <hr>
                            <div class="form"  id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-10">
                                    <input type="text" id="myInput3" onkeyup="myFunction(3)" placeholder="Search here..">
                                        <table id="myTable3" width="200%" border="0px">  
                                            <?php foreach($all_posts as $row) { 
                                                $id = $row['id'];
                                                $query = "SELECT DISTINCT id FROM post_likes WHERE post_id = '$id'";
                                                $like_c = mysqli_num_rows(mysqli_query($con,$query)); ?>
                                                <tr>
                                                    <form action="" method="POST">
                                                        <td>
                                                            <a href="php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>" target="_block"><?php echo($row['topic']); ?></a>
                                                        </td>
                                                        <td><?php echo $like_c; ?>&starf;</td>
                                                        <td><input type="text" value="<?php echo $id; ?>"  name="delete_all" style="display:none" /></td>
                                                        <td>
                                                            <button type="submit" name="delete_all_post"  style="display:block; border:0px; border-radius:100px;">
                                                                <span>
                                                                    <i class="fa fa-trash" style="font-size:28px;color:red"></i>
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>                    
                        </div><!--/tab-pane-->

                    </div><!--/tab-content-->

                    </div><!--/col-9-->
                </div><!--/row-->
                <script>
                    function toggle(){
                        document.getElementById('name').removeAttribute('readonly');
                        document.getElementById('phone').removeAttribute('readonly');
                        document.getElementById('location').removeAttribute('readonly');
                        document.getElementById('edit').style.display = "none";
                        document.getElementById('save').style.display = "block";
                    }
                </script>  
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
                <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
                <script>
                    $(document).ready(function() {   
                        var readURL = function(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                $('.avatar').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $(".file-upload").on('change', function(){
                        readURL(this);
                        document.getElementById('submit_pic').click();
                    });
                });

                function select_image(){
                    document.getElementById('file').click();
                }
                </script>                                 
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
                    function toast_success(qid){
                        if(toastr.success("Successully updated")){
                            setTimeout('window.location="profile.php?qid='+qid+'"', 2000);
                        }
                    }
                    function toast_deleted(qid){
                        if(toastr.success("Successully Deleted")){
                            setTimeout('window.location="profile.php?qid='+qid+'"', 2000);
                        }
                    }
                    function toast_verify(qid){
                        if(toastr.success("Successully Verified")){
                            setTimeout('window.location="profile.php?qid='+qid+'"', 2000);
                        }
                    }
                    function toast_error(qid){
                        if(toastr.error("Something Went Wrong")){
                            setTimeout('window.location="profile.php?qid='+qid+'"', 2000);
                        }
                    }

                    
                    function myFunction(filter_k) {
                        // Declare variables
                        var input, filter, table, tr, td, i, txtValue;
                        //alert(filter);
                        if(filter_k == 1){
                            input = document.getElementById("myInput1");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable1");
                        }
                        else if(filter_k == 2){
                            input = document.getElementById("myInput2");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable2");
                        }
                        else if(filter_k == 3){
                            input = document.getElementById("myInput3");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable3");
                        }

                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                            }
                        }
                    }
                    
                </script>

                <?php
                    if(isset($_POST['update_pic'])){
                        $email = $_SESSION['login_user'];
                        $image = addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
                        $query = "update user_info set profile_image='$image' where email='$email'";
                        $update_result=mysqli_query($con, $query);
                        if($update_result){
                            ?> <script>toast_success(1);</script> <?php
                        }else{
                            ?> <script>toast_error(1);</script> <?php
                        }    
                    }

                    if(isset($_POST['update_profile'])){
                            $email = $_POST['email'];
                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $city = $_POST['city'];

                            $_SESSION['login_name'] = $name; 
                            $_SESSION['login_city'] = $city;
                            $_SESSION['login_phoneNumber'] = $phone;

                            $query = "update user_info set name='$name', phoneNumber='$phone', city='$city' where email='$email'";
                            $update_result=mysqli_query($con, $query);
                            if($update_result){
                                ?> <script>toast_success(1);</script> <?php
                            }else{
                                ?> <script>toast_error(1);</script> <?php
                            }  
                    }
                    
                    if(isset($_POST['delete_your_post'])){
                        $p_id = $_POST['your_post_name'];
                        $query = "delete from user_post where id = '$p_id'";
                        $update_result=mysqli_query($con, $query);
                        if($update_result){
                            ?><script>toast_deleted(2);</script><?php
                        }else{
                            ?><script>toast_error(2);</script><?php
                        } 
                    }

                    if(isset($_POST['delete_all_post'])){
                        $p_id = $_POST['delete_all'];
                        $query = "delete from user_post where id = '$p_id'";
                        $update_result=mysqli_query($con, $query);
                        if($update_result){
                            ?><script>toast_deleted(4);</script><?php
                        }else{
                            ?><script>toast_error(4);</script><?php
                        } 
                    }

                    if(isset($_POST['delete_new_post'])){
                        $p_id = $_POST['new_post'];
                        $query = "delete from user_post where id = '$p_id'";
                        $update_result=mysqli_query($con, $query);
                        if($update_result){
                            ?><script>toast_deleted(3);</script><?php
                        }else{
                            ?><script>toast_error(3);</script><?php
                        }   
                    }

                    if(isset($_POST['verify_post'])){
                        $p_id = $_POST['new_post'];
                        $query = "update user_post set verifed = '1' where id = '$p_id'";
                        $update_result=mysqli_query($con, $query);
                        if($update_result){
                            ?> <script>toast_verify(3);</script> <?php
                        }else{
                            ?> <script>toast_error(3);</script> <?php
                        }  
                    }
                ?>
                <br><br><br>
        <?php 
            } else {
                    ?>
                        <script>
                            window.location="../#loginsection";
                        </script>
                    <?php
            }
        ?>
    </body>   
</html>