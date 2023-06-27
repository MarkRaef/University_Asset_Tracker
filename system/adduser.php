<?php 
    include ('../Connections/syscon.php');
?>

<?php
    // check that the textbox variables is empty to start a new session
    if(!isset($_SESSION)) 
    {
        session_start();

		$adminid= $_SESSION['userid'];
    }

	// check that the textbox variables is not empty
    if (isset($_POST['adduser']))
    { 	
		// get data from user
		$user_ar_name = mysqli_real_escape_string($bis,$_POST['ar_name']);
		$username= mysqli_real_escape_string($bis,$_POST['name']);
		$password= mysqli_real_escape_string($bis,$_POST['psw']);
		$rpass = mysqli_real_escape_string($bis,$_POST ['psw-repeat']);

		$image = $_POST ['image'];


		// check existing username in the database

		$sql = "SELECT username FROM users WHERE username = '$username' LIMIT 1" ;
		$check_query = mysqli_query($bis,$sql);
		$count_username = mysqli_num_rows($check_query);
		$err_msg= "أسم المستخدم موجود بالفعل جرب اسمًا آخر";


		if($count_username > 0){
			echo "<script type='text/javascript'>alert('$err_msg');</script>"; 


		} else{
			// check if password equal to confirm password
			if($password == $rpass) {
				// insert data to table user in database
				$reg = "INSERT INTO `users` (`user_ar_name`, `username`,`password`, `user_type_id`, `added_date`, `added_by`, `image`) VALUES
				( '$user_ar_name','$username','$password','1',now(),'$adminid','$image')";
				
				mysqli_query($bis , $reg);

				$donemessage ="تمت إضافة المستخدم بنجاح";
				// display alert message contain username and success message
				echo "<script type='text/javascript'>alert('$donemessage');</script>";
			}
			else 
			{
				// display alert message contain password and confirm password 
				$emessage = "كلمة المرور وتأكيد كلمة المرور ليسا متطابقين ، يرجى المحاولة مرة أخرى";
				echo "<script type='text/javascript'>alert('$emessage');</script>";
			}
			
		}

		// prevent resubmission
			echo 
			"<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>
	
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
		<!-- header section -->
        <?php
            include('navmenu.php');
        ?>
		
    <section class="adduser">
	<div class="container">

    <div class="img">
                <img src="../images/adduser/Add files-bro.svg" />
				
            </div>
	<!-- register / signup form -->
    <div class="login-container">
    <form  method="post" class="animatedform">  		<!-- method post to security -->

            <img class="avatar" src="../images/adduser/undraw_pic_profile_re_7g2h 3.svg">

			<!-- form main heading -->
			<div class="main-head">
				<h2>أضافة مستخدم جديد</h2>
			</div>
            

			<!-- <label for="ar_name">user arabic Name</label> -->
			<input type="name" placeholder="أسم المستخدم بالعربي" name="ar_name" required>

			<!-- <label for="name">user Name</label> -->
			<input type="name" placeholder="أسم المستخدم بالأنجليزي " name="name" required>

			<!-- <label for="psw">Password</label> -->
			<input type="password" placeholder=" أدخل رقم المرور" name="psw" required>

			<input type="password" placeholder="تأكيد رقم المرور" name="psw-repeat" required>

			<!-- <label for="img">image</label> -->
			<input type="file" name="image" value="choose image" accept="image/*" required>

			<!-- <button type="submit" name="adduser" class="btn signupbtn main-btn">add user</button>  -->
			<button type="submit" name="adduser" class="stylebtn">أضافة مستخدم</button>
	</form>
</div>
	</div>
</section>
	<!-- footer -->
        <?php
            include('footer.html');
        ?>
        
        <!-- javascript  -->
        <script src="../js/main.js"></script>
</body>
</html>
