<?php
  require "init.php";
  session_start();

  $user_email = $_POST["email"];;
  $user_psw = $_POST["password"];
  
  $query = "SELECT * FROM user_info WHERE email = '$user_email' AND password = '$user_psw'";
  $result = mysqli_query($con,$query);

  if(!mysqli_num_rows($result)>0){ 
         //Error While Login
        session_start();  
        $_SESSION['login_status']= 1;          
        header("location:../#login_section");

  }else{   
        //Succesful Login                                     
        $row = mysqli_fetch_assoc($result);
        $user_user_id = $row['id'];
        $user_name = $row['name'];
        $user_city = $row['city'];
        $user_phoneNumber = $row['phoneNumber'];
        
        session_start();
        $_SESSION['login_user_id'] = $user_user_id; //new !!
        $_SESSION['login_user']= $user_email; 
        $_SESSION['login_psw']=$user_psw;
        $_SESSION['login_name']= $user_name; 
        $_SESSION['login_city']=$user_city;
        $_SESSION['login_phoneNumber']= $user_phoneNumber;
        $_SESSION['login_status']= 0;
        header("location:../");
  }

?>

