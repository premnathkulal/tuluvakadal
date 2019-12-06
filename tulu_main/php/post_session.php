<?php
	session_start();  
        $_SESSION['USER_POST_ID'] = $_GET['post_id'];   
        $_SESSION['USER_POST_CAT'] = $_GET['catogory']; 
        echo $_SESSION['ADMIN_POST_ID'];
        header("location:../display_user_post.php");
?>
