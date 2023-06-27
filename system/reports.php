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
        <title>reports</title>
        
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

        <!-- assets data  -->
        <div class="container">
        <section class="section9 color" id="products">

                <div class="one">
                    <h1 class="main-head">التقارير</h1>
                    <p class="main-text">أنظر الي تقارير تحويل العهد من عضو لأخر</p>
                </div>

                <div class="buttons row">
                    <button type="button"class="stylebtn" onclick="window.print();return false;">تقرير  PDF</button>
                    <button type="button"class="stylebtn" onclick="exportExcel();return false;">تقرير EXCEL</button>
                </div>

<?php
            include('reportdata.php');
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
