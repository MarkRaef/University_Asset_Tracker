<?php
    include('../Connections/syscon.php');


    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>about us</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../css/all.min.css" />
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <!-- nav menu  -->
        <?php
            include('navmenu.php');
        ?>
        <!-- about us section -->
        <section class="about">
            <div class="main-head">
                    <h2>نظام ادارة العهد</h2>
            </div>
            <div class="main-head">
                    <h3>تحت أشراف</h3>
            </div>

            <div class="container">
                <div class="row">
                        <div class="card">
                            <div class="imgBx">
                                <img src="../images/doctors/1.jpg" />
                            </div>

                            <div class="content">
                                <div class="details">
                                    <h2>
                                         mohamed abdelsalam <br /><span>main</span>
                                        <br />
                                    </h2>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="card">
                            <div class="imgBx">
                                <img src="../images/doctors/3.jpeg" />
                            </div>

                            <div class="content">
                                <div class="details">
                                    <h2>
                                         mahmoud bahlol <br /><span>IT</span>
                                        <br />
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="imgBx">
                                <img src="../images/doctors/2.jpeg" />
                            </div>

                            <div class="content">
                                <div class="details">
                                    <h2>
                                         abdelrahman farmawy <br /><span>business</span>
                                        <br />
                                    </h2>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="main-head">
                    <h2>الفريق</h2>
            </div>
            <!--open div container-->
            <div class="cards_container">
                <!--opening cards_container-->




                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img1.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Nermin Girges <br /><span>Front End</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img4.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Mark Raef<br /><span>Back End</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/in/mark-raef-b453a11bb"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img2.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Youssef Mohamed<br /><span>Front End</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/in/youssef-mohamed33/"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img3.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Rowana Ramy<br /><span>Business</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/in/rowana-ramy-adel-49b32b143/"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img5.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Selvana Rasmy<br /><span>Business</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx">
                        <img src="../images/team/img6.jpeg" />
                    </div>

                    <div class="content">
                        <div class="details">
                            <h2>
                                Omar Yasser<br /><span>System</span>
                                <br />
                                <div class="icon">
                                    <a href="https://www.linkedin.com/in/omaryasser2001"
                                        >Linkedin Profile</a
                                    >
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--closing div container-->
        </section>

        <!-- footer -->
        <?php
            include('footer.html');
        ?> 

        <!-- javascript  -->
        <script src="../js/main.js"></script>
    </body>
</html>
