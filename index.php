<?php
if (!isset($_SESSION)) {
    session_start();
}
// connection to database
require_once('Connections/syscon.php'); 

?>

<?php
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
    $loginUsername=$_POST['user'];
    $password=$_POST['pass'];
    $MM_fldUserAuthorization = "type";
    $MM_redirectLoginSuccess = "system/index.php";
    $MM_redirectLoginFailed = "index.php?id=1";
    $MM_redirecttoReferrer = false;
    mysqli_select_db($bis,$database_bis);
        
    $query="SELECT username, password, is_enable, user_ar_name, user_id, user_type_id, image FROM users WHERE UserName='$loginUsername' AND Password='$password' AND is_enable = 'Yes' ";

    $LoginRS = mysqli_query($bis,$query) or die(mysqli_error($bis));
    $row_LoginRS = mysqli_fetch_assoc($LoginRS);
    $loginFoundUser = mysqli_num_rows($LoginRS);
    if ($loginFoundUser>0) {
    
    $loginStrGroup  = $row_LoginRS['Type'];
    
    //declare two session variables and assign them
    $_SESSION['userid'] = $row_LoginRS['user_id'];
	$_SESSION['userarname'] = $row_LoginRS['user_ar_name'];
	$_SESSION['userimage'] = $row_LoginRS['image'];
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    $_SESSION['username'] = $row_LoginRS['username'];

    if (isset($_SESSION['PrevUrl']) && false) {
        $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
    }
    else {
    // header("Location: ". $MM_redirectLoginFailed );
        echo    '<script>
                    alert("عفوا اسم المستخدم أو كلمة المرور غير صحيحة");
                    window.location.replace("index.php");
                </script>';
    }
}
?>

<?php

mysqli_select_db($bis,$database_bis);
$query_appata = "SELECT *  FROM `application_data`";
$appata = mysqli_query($bis,$query_appata) or die(mysqli_error($bis));
$row_appata = mysqli_fetch_assoc($appata);

$_SESSION['app_name'] = $row_appata['app_name'];
$_SESSION['uniname'] = $row_appata['Uni_name'];
$_SESSION['faclutyname'] = $row_appata['Faculty_name'];
$_SESSION['programnanme'] = $row_appata['Program_name'];
$_SESSION['facultylogo'] = $row_appata['Faculty-Uni_logo'];
$_SESSION['programlogo'] = $row_appata['Program_logo'];
$_SESSION['deanname'] = $row_appata['Faculty_Dean'];
$_SESSION['postvicedean'] = $row_appata['Post_grad_vice_dean'];
$_SESSION['affairsvicedean'] = $row_appata['st_affairs_vice_dean'];
$_SESSION['programcoordinator'] = $row_appata['Program_coordinator'];
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $_SESSION['app_name']; ?></title>

        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body class="loginpage">
        <!-- header section -->
        <header>
        <div class="container">
            <div class="header-row">
                            <div class="mainhead">
                                    <img src="images/<?php echo $_SESSION['facultylogo'];?>" alt="" width="130" height="150" class="logo" srcset="">           
                                    <!-- <?php // if($_SESSION['programlogo'] != '') { ?> <img src="images/<?php // echo $_SESSION['programlogo'];?>" alt="" width="130" height="120" class="logo" srcset=""> <?php // } ?> -->
                            </div>
                            <div class="mainhead">
                                <h3 ><?php echo $_SESSION['uniname']; ?></h3>
                            </div>
                            <div class="mainhead">
                                <h4 ><?php echo $_SESSION['faclutyname']; ?></h4>
                            </div>
                            <div class="mainhead">
                                <h4  dir="ltr"><?php echo $_SESSION['programnanme']; ?></h4>
                            </div>
                            <div class="mainhead">
                                <h2  class="style3"><?php echo $_SESSION['app_name']; ?></h2>
                            </div>
            </div>

        </div>
        </header>
        <!-- login section -->
        <section class="login-section">
            <div class="container animatedform">
                <div class="design">
                    <div class="pill-1 rotate-45"></div>
                    <div class="pill-2 rotate-45"></div>
                    <div class="pill-3 rotate-45"></div>
                    <div class="pill-4 rotate-45"></div>
                </div>

                <div class="login">
                    <form action="<?php echo $loginFormAction; ?>" method="post">
                        <h3 class="title">تسجيل دخول المستخدم</h3>

                        <div class="text-input">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="user" id="user" placeholder="اسم المستخدم" required/>
                        </div>

                        <div class="text-input">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="pass" placeholder="كلمة المرور" id="pass" required />
                            <span id="btn">
                                <i class="fa-solid fa-eye-slash icon"></i>
                            </span>
                        </div>
                        <!-- <input name="prog" type="hidden" id="prog" value="<?php //echo $prog; ?>" /> -->

                        <input type="submit" name="submit" value="تسجيل دخول" class="login-btn"/>
                    </form>
                </div>
            </div>
        </section>
        <script src="./js/login.js"></script>
    </body>
</html>
