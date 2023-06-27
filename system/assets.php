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
        <title>assets</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="../css/all.min.css" />
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>

        <!-- header section -->
        <?php
            include('navmenu.php');
        ?>

        <div class="container">
        <section class="section9 color" id="products">

                <div class="one">
                    <h1 class="main-head">العهد</h1>
                    <p class="main-text">أنظر الي و أبحث عن كل العهد</p>
                </div>

                <div class="search-container searchBox">
                    <form  method="post" class="search-form">
                        <input type="text" placeholder="أبحث بالأسم" name="search">
                        <button type="submit" name="btn" class="stylebtn searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <div class="buttons row">
                    <!-- <a href="printpage.php?table=assets">print</a> -->
                    <button type="button"class="stylebtn" onclick="location.href = 'printpage.php?table=assets';" >أطبع</button>
                    <!-- <button type="button"class="stylebtn" onclick="window.print();return false;">print</button> -->
                    <button type="button"class="stylebtn" onclick="exportExcel();return false;">أكسيل</button>
                    <a href="addasset.php" class="stylebtn">أضافة عهدة جديدة</a>
                </div>

        <!-- assets data  -->
            <?php
                include('assetsdata.php');
            ?>
</section>
</div>
        <!-- footer -->
        <?php
            include('footer.html');
        ?>
        
        <!-- javascript  -->
        <script src="../js/main.js"></script>
        <script src="../js/table.js"></script>
    </body>  
</html>
