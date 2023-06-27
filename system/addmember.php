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

    if(isset($_POST['adduser'])) 
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $type = $_POST['member'];


        // check existing username in the database

		$sql = "SELECT national_id FROM p42_members WHERE national_id = '$id' LIMIT 1" ;
		$check_query = mysqli_query($bis,$sql);
		$count_id = mysqli_num_rows($check_query);
		$err_msg= "الرقم القومي موجود بالفعل";


		if($count_id > 0){
			echo "<script type='text/javascript'>alert('$err_msg');</script>";
		}

        else {
            // insert data to table members in database
            $sel = "INSERT INTO `p42_members` (`name`, `national_id`, `phone`, `type`) 
                    VALUES ('$name', '$id', '$phone', '$type')";

            if(mysqli_query($bis, $sel)) 
            {
                // display alert message contain success message
                $donemessage = "تمت إضافة العضو بنجاح";
                echo "<script type='text/javascript'>alert('$donemessage');</script>";
                // prevent resubmission
                echo "
                <script>
                    // if (window.history.replaceState) {
                    //     window.history.replaceState(null, null, window.location.href);
                    // }
                    window.location.replace('members.php');
                </script>";
            } 
            else 
            {
                // display alert message contain error message
                $errormessage = " : خطأ في إضافة العضو " . mysqli_error($bis);
                echo "<script type='text/javascript'>alert('$errormessage');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add member</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<!-- header section -->
    <?php include('navmenu.php'); ?>

	<div class="container">
        <!-- add member form -->
        <form method="post" class="logform">  		<!-- method post to security -->
            <!-- form main heading -->
            <div class="main-head">
                <h2>أضافة عضو جديد</h2>
            </div>
            <label for="name">الأسم </label>
            <input type="text" placeholder=" الأسم" name="name" required>

            <label for="id">الرقم القومي</label>
            <input type="text" placeholder=" الرقم القومي" name="id" pattern="[0-9]{14}" maxlength="14" required>

            <label for="phone">رقم الهاتف</label>
            <input type="tel" placeholder=" رقم الهاتف" name="phone" pattern="[0-9]{11}" maxlength="11" required>

            <label for="type">الوظيفة</label>

            <select name="member" id="member" required>
                <option value="">أختر</option>
                <option value="دكتور">دكتور</option>
                <option value="موظف">موظف</option>
                <option value="عامل">عامل</option>
            </select>

            <button type="submit" name="adduser" class="stylebtn">أضافة عضو</button>
        </form>
    </div>

    <!-- footer -->
    <?php include('footer.html'); ?>
        
    <!-- javascript  -->
    <script src="../js/main.js"></script>
</body>
</html>
