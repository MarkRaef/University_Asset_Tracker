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
        <title>print page</title>
        
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
                
                <div class="buttons row">
                        <button type="button"class="stylebtn" onclick="window.print();return false;">أطبع</button>
                        <button type="button"class="stylebtn" onclick="exportExcel();return false;">أكسيل</button>
                </div>


        <!-- assets data  -->
            <?php
        // include('membersdata.php');

    if(isset($_GET['table'])) {
        $table = $_GET['table'];
        if ($table == 'assets') {
            


            $myquery = "SELECT a.*, m.name AS member_name, u.username ,c.category
                        FROM p42_assets AS a
                        LEFT JOIN p42_members AS m ON a.member_id = m.id
                        LEFT JOIN users AS u ON a.added_by = u.user_id
                        LEFT JOIN p42_category AS c ON a.category_id = c.id
                        
                        ORDER BY a.id DESC";
            $result= mysqli_query($bis,$myquery);
                $count=0;
?>
                <div class="one">
                        <h1 class="main-head">العهد</h1>
                </div>
            <div class="row">
                <table id="table">
                    <thead>
                    <tr>
                        <th># <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الكود<i class="fa-solid fa-sort sort-column" data-sort="id"></i></th>
                        <th>الأسم<i class="fa-solid fa-sort sort-column" data-sort="name"></i></th>
                        <th>الفئة<i class="fa-solid fa-sort sort-column" data-sort="category"></i></th>
                        <th>النوع<i class="fa-solid fa-sort sort-column" data-sort="type"></i></th>
                        <!-- <th>price <i class="fa-solid fa-sort sort-column" data-sort="price"></i></th> -->
                        <th>الحالة <i class="fa-solid fa-sort sort-column" data-sort="state"></i></th>
                        <!-- <th>description <i class="fa-solid fa-sort sort-column" data-sort="description"></i></th> -->
                        <th>الوصف</th>
                        <th>السعر</th>
                        <th>كود العضو<i class="fa-solid fa-sort sort-column" data-sort="doctor_id"></i></th>
                        <!-- <th>name <i class="fa-solid fa-sort sort-column" data-sort="doctor_name"></i></th> -->
                        <th>المسئول <i class="fa-solid fa-sort sort-column" data-sort="doctor_name"></i></th>
                        <th>التاريخ<i class="fa-solid fa-sort sort-column" data-sort="doctor_name"></i></th>
                    </tr>
                    </thead>
<?php
                // fetch data from database in form of array
                while($data=mysqli_fetch_array($result)) {
                    $count++;
                    // if ($data['member_id'] >0) {
                    //     $data['member_name'] = $data['member_name'];
                    // }
                    // else {
                    //     $data['member_name'] = "stock";
                    // }
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
                            <td><?php echo $data['member_name']; ?></td>
                            <td><?php echo $data['username']; ?></td>
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
        else if ($table == 'members') {
?>
            <div class="one">
                        <h1 class="main-head">الأعضاء</h1>
                </div>
<?php 
        include('membersdata.php');
?>

<?php    
        }
        if ($table == '') {

        }

    }
    else {
        echo '<script>
                            alert("خطأ");
                            window.location.replace("assets.php");
                        </script>';
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
    </body>  
</html>
