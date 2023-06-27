<?php
include('../Connections/syscon.php');
session_start();
?>

<?php
if (isset($_GET['id'])) {
    // Get id value
    $asset = $_GET['id'];
    // Select data from table p42_transfer
    $myquery = "SELECT * FROM `p42_transfer` WHERE asset='$asset' ORDER BY id DESC";
    $result = mysqli_query($bis, $myquery);

    if (mysqli_num_rows($result) > 0) {
        $assetCode = mysqli_fetch_array($result);
        $asset_id = $assetCode["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>assets</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        
    <link rel="stylesheet" href="../css/all.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<!--  -->
<body>
<!-- header section -->
<?php
include('navmenu.php');
?>
        <div class="container">
        <section>
            <div class="one">
                    <h1 class="main-head">عهدة رقم <?php echo $asset_id?> </h1>
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
                        <th># <i class="fa-solid fa-sort sort-column"></i></th>
                        <th>كود التحويل <i class="fa-solid fa-sort sort-column" data-sort="id"></i></th>
                        <th>عضو رقم - 1 <i class="fa-solid fa-sort sort-column" data-sort="category"></i></th>
                        <th>عضو رقم - 2 <i class="fa-solid fa-sort sort-column" data-sort="type"></i></th>
                        <th>السبب <i class="fa-solid fa-sort sort-column"></i></th>
                        <th>المسئول <i class="fa-solid fa-sort sort-column" data-sort="description"></i></th>
                        <th>التاريخ <i class="fa-solid fa-sort sort-column" data-sort="doctor_id"></i></th>

                    </tr>
                </thead>
                


<?php
                        $count=0;
                        foreach($result as $data) {
                            $count++;
?>


<tbody id="tbody">
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $data['id']; ?></td>
                        <td>
                            <?php
                            $member_id = $data['member1'];
                            $member_query = "SELECT name FROM p42_members WHERE id = $member_id";
                            $member_result = mysqli_query($bis, $member_query);
                            $member_name = mysqli_fetch_array($member_result)['name'];
                            echo $member_name;
                            ?>
                        </td>
                        <td>
                            <?php
                            $member_id = $data['member2'];
                            $member_query = "SELECT name FROM p42_members WHERE id = $member_id";
                            $member_result = mysqli_query($bis, $member_query);
                            $member_name = mysqli_fetch_array($member_result)['name'];
                            echo $member_name;
                            ?>
                        </td>
                        <td><?php echo $data['reason']; ?></td>
                        <td>
                            <?php
                            $user_id = $data['added_by'];
                            $user_query = "SELECT username , user_ar_name FROM users WHERE user_id = $user_id";
                            $user_result = mysqli_query($bis, $user_query);
                            $username = mysqli_fetch_array($user_result);
                            // $username = mysqli_fetch_array($user_result)['username'];
                            echo $username['user_ar_name'].' - '.$username['username'];
                            // echo $userarname;
                            ?>
                        </td>
                        <td><?php echo $data['added_time']; ?></td>
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
                        alert("ليس لديها سجل نقل");
                        window.location = "assets.php";
                        </script>';
                    }
                }
                else {
?>
                        <script>
                        alert("اختر عهدة اولا");
                        window.location = 'assets.php';
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
