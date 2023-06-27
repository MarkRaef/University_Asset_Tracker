<?php
    include('../Connections/syscon.php');

    session_start();
?>

<?php
    if(isset($_GET['id'])) {
        // Get id value
        $member_id = $_GET['id'];

        // Select data from table product
        $myquery = "SELECT a.*, m.name AS member_name, u.user_ar_name AS admin_name, u.username , c.category
                    FROM `p42_assets` AS a
                    LEFT JOIN p42_members AS m ON a.member_id = m.id
                    LEFT JOIN users AS u ON a.added_by = u.user_id
                    LEFT JOIN p42_category AS c ON a.category_id = c.id
                    WHERE member_id='$member_id'
                    ORDER BY id DESC";
        $result = mysqli_query($bis, $myquery);

        $memberinfo = mysqli_fetch_array($result);
        $member_name = $memberinfo['member_name'];
        $admin_name = $memberinfo['admin_name'];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>member <?php echo $member_name?></title>
        
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
        <section>
            <div class="one">
                    <h1 class="main-head"> عهد عضو رقم <?php echo $member_id?> -   <?php echo $member_name?></h1>
                    <!-- <p class="main-text">Look at members and search all members</p> -->
                </div>
            <div class="buttons row">
                    <button type="button"class="stylebtn" onclick="window.print();return false;">أطبع</button>
                    <button type="button"class="stylebtn" onclick="exportExcel();return false;">أكسيل</button>
                </div>

            <div class="row">
                    <table id="table">
                        <thead>
                    <tr>
                        <th># <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الكود <i class="fa-solid fa-sort sort-column" data-sort="id"></i></th>
                        <th>الأسم <i class="fa-solid fa-sort sort-column" data-sort="name"></i></th>
                        <th>الفئة <i class="fa-solid fa-sort sort-column" data-sort="category"></i></th>
                        <th>النوع <i class="fa-solid fa-sort sort-column" data-sort="type"></i></th>
                        <th>الحالة <i class="fa-solid fa-sort sort-column" data-sort="state"></i></th>
                        <th>الوصف <i class="fa-solid fa-sort sort-column"></i></th>
                        <th>السعر <i class="fa-solid fa-sort sort-column"></i></th>
                        <th>المسئول <i class="fa-solid fa-sort sort-column" data-sort="doctor_name"></i></th>
                        <th>التاريخ <i class="fa-solid fa-sort sort-column" data-sort="doctor_name"></i></th>
                    </tr>
                </thead>


                <?php
            if(mysqli_num_rows($result) > 0)
                    {
                        $assetCode = mysqli_fetch_array($result);
                        $count=0;
                        foreach($result as $data) {
                            $count++;
?>

                        <tbody id="tbody">
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td><?php echo $data['type']; ?></td>
                            <td><?php echo $data['state']; ?></td>
                            <td><?php echo $data['descr']; ?></td>
                            <td><?php echo $data['price']; ?></td>
                            <td><?php echo $data['admin_name'].' - '.$data['username']; ?></td>
                            <td><?php echo $data['added_date']; ?></td>
                        </tr> 
                    </tbody>
<?php
                        }
?>
                    </table>
                </div>
<?php
                    }
                    else
                    {
                        echo '<script>
                        alert("هذا العضو ليس لديه عهد");
                        window.location = "members.php";
                        </script>';
                    }
                }
                else {
?>
                        <script>
                        alert("اختار العضو اولا");
                        window.location = 'members.php';
                        </script>

<?php

                        }
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
