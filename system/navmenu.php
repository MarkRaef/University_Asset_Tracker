<?php
    $user_ar=$_SESSION['userarname'];
    $user_en=$_SESSION['username'];
?>


<?php

if (!isset($_SESSION)) {
    session_start();
}


if ((!isset($_SESSION['userid'])) or ($_SESSION['userid'] == ""))

{
	echo ' 
		<script type="text/javascript"> 
			window.location = "../index.php" 
		</script>';
}

?>





<?php
    // ** Logout the current user. **
    $logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";

    if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
        $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
    }

    if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
        //to fully log out a visitor we need to clear the session varialbles
        $_SESSION['userid'] = NULL;
        $_SESSION['userarname'] = NULL;
        $_SESSION['userimage'] = NULL;
        $_SESSION['app_name'] = NULL;
        $_SESSION['uniname'] = NULL;
        $_SESSION['faclutyname'] = NULL;
        $_SESSION['programnanme'] = NULL;
        $_SESSION['facultylogo'] = NULL;
        $_SESSION['programlogo'] = NULL;
        $_SESSION['deanname'] = NULL;
        $_SESSION['postvicedean'] = NULL;
        $_SESSION['affairsvicedean'] = NULL;
        $_SESSION['programcoordinator'] = NULL;
        $_SESSION['MM_UserGroup'] = NULL;
        $_SESSION['PrevUrl'] = NULL;
        
        
        unset($_SESSION['userid']);
        unset($_SESSION['userarname']);
        unset($_SESSION['userimage']);
        unset($_SESSION['app_name']);
        unset($_SESSION['uniname']);
        unset($_SESSION['faclutyname']);
        unset($_SESSION['programnanme']);
        unset($_SESSION['facultylogo']);
        unset($_SESSION['programlogo']);
        unset($_SESSION['deanname']);
        unset($_SESSION['postvicedean']);
        unset($_SESSION['affairsvicedean']);
        unset($_SESSION['programcoordinator']); 
        unset($_SESSION['MM_UserGroup']);
        unset($_SESSION['PrevUrl']);
        
        $logoutGoTo = "../index.php";

            if ($logoutGoTo) {
            
            echo ' 
                    <script type="text/javascript"> 
                        window.location = "index.php?page=Blocked" 
                    </script>';
                        exit;
            }
    }

?>




<header>
    <div class="container">
        <div class="header-row">
                        <div class="mainhead">
                            <h2 class="style54">
                                <span class="style56"><?php echo $_SESSION['app_name']; ?></span>
                                <br />
                                <span class="style57">
                                    <?php echo $_SESSION['uniname']; ?>
                                    -
                                    <?php echo $_SESSION['faclutyname']; ?>
                                <!-- <br />
                                    <?//php echo $_SESSION['programnanme']; ?> -->
                                </span>
                            </h2>
                        </div>
                        <div class="mainhead">
                            <img
                                src="../images/<?php echo $_SESSION['facultylogo'];?>"
                                alt=""
                                width="140"
                                height="140"
                                class="logo"
                                srcset=""
                            />
                        </div>
                        <!-- <div class="mainhead">
                            <?php if($_SESSION['programlogo'] != '') { ?>
                            <img
                                src="../images/<?php echo $_SESSION['programlogo'];?>"
                                alt=""
                                width="130"
                                height="120"
                                class="logo"
                                srcset=""
                            />
                            <?php } ?>
                        </div> -->
                        <div class="mainhead">
                            <a href="<?php echo $logoutAction ?>">
                                <img
                                    src="../images/users/<?php echo $_SESSION['userimage']; ?>"
                                    alt="\"
                                    width="60"
                                    height="60"
                                    style="border: thick #006699 ridge" />
                                <br />
                                <span class="style240 style52">
                                    <span class="style56">
                                        <?php echo $_SESSION['userarname']; ?>
                                    </span>
                                <br /> 
                                </span>
                            </a>

                            <a href="<?php echo $logoutAction ?>">
                                <span class="style229">خروج</span>
                            </a>
                    </div>
        </div>
        <div class="header-row">
            <!-- <div class="logo">
                <a href="main.php"><img src="img/logo.png" alt="" /></a>
            </div> -->
            <nav id="nav-list">
                <ul class="nav-list">
                    <li><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="index.php">الصفحة الرئيسية</a></li>
                    <li><a href="adduser.php">أضافة مستخدم</a></li>
                    <li><a href="assets.php">العهد</a></li>
                    <li><a href="members.php">الأعضاء</a></li>
                    <!-- <li><a href="addasset.php">add asset</a></li> -->
                    <!-- <li><a href="transfer.php">transfer</a></li> -->
                    <!-- <li><a href="end.php">end</a></li> -->
                    <li><a href="reports.php">التقارير</a></li>
                    <!-- <li><span onclick="darkMode()" class="moon-icon"> &#9789;</span></li> -->
                    <li><a onclick="darkMode()" > <i class="fa-solid fa-moon"></i></a></li>
                    <!-- <li><a href=""><?php echo $user_ar ?></a></li>
                    <li><a href=""><?php echo $user_en ?></a></li> -->
                </ul>
            </nav>
            
            <!-- <span onclick="navFunction()" id="arrow-icon" class="arrow-icon">&#8595;</span> -->
            <span onclick="navFunction()" id="arrow-icon" class="arrow-icon"><i class="fa-solid fa-bars"></i></span>
        </div>
    </div>
</header>


