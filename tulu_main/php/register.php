<?php
 
	require  "init.php";
	$user_name = $_POST["name"];
	$user_email = $_POST["email"];
	$user_phone = $_POST["phone"];
	$user_city = $_POST["city"];
	$user_psw = $_POST["password"];

	$sql="select * from user_info where email='$user_email'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		session_start();  
        $_SESSION['login_status']= 2;          
        header("location:../#register_section");
	}
	else
	{
		$query = "INSERT INTO user_info(email,password,name,city,phoneNumber,profile_image) VALUES ('$user_email','$user_psw','$user_name','$user_city','$user_phone',1);";
		if(mysqli_query($con,$query))
		{
		session_start();  
        $_SESSION['login_status']= 10;  
			
?>
			<script>
				alert("SUCCESSFULLY REGISTERD");
				window.location = '../';
			</script>
<?php
			
		}
		else{
			$status = "failed";
		}
	}
?>
