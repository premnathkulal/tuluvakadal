<?php
        require "init.php";
        
        $email = $_GET['email'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $city = $_GET['city'];

        $_SESSION['login_name'] = $name; 
        $_SESSION['login_city'] = $city;
        $_SESSION['login_phoneNumber'] = $phone;

        $query = "update user_info set name='$name', phoneNumber='$phone', city='$city' where email='$email'";
        $update_result=mysqli_query($con, $query);
        if($update_result){
               ?> <script>alert("Yes"); window.location="profile.php"; </script> <?php
        }
        //header("location:profile.php");       
?>        