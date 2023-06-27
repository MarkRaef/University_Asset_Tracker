<?php
include('../Connections/syscon.php');

session_start();

$userid = $_SESSION['userid'];
$user_en = $_SESSION['username'];

if(isset($_POST['assignasset'])) {
    // Get form data
    $asset_id = $_SESSION['asset_id'];
    $asset_name = $_SESSION['asset_name'];
    $member_id = $_POST['members'];
    // $price = $_POST['price'];
    $notes = $_POST['notes'];

    // Insert data into table p42_assign_assets
    $insert_query = 
        "INSERT INTO `p42_assign_assets`(`asset_id`, `asset_name`, `member_id`, `notes`, `added_by`, `added_time`) 
        VALUES ('$asset_id','$asset_name','$member_id','$notes','$userid',now())";
    // $insert_query = "INSERT INTO `p42_assign_assets`(`asset_id`, `asset_name`, `member_id`, `price`, `notes`) VALUES ('$asset_id','$asset_name','$member_id','$price','$notes')";
    mysqli_query($bis, $insert_query);

    $update= "UPDATE `p42_assets` SET member_id =$member_id where id = $asset_id";
    mysqli_query($bis, $update);

    // alert Redirect to assets.php page
    $mes="  العهدة ".$asset_id."  (".$asset_name.") تم تعيينها  "." بنجاح";
    echo "<script>
                    alert('$mes');
                    window.location.replace('assets.php');
        </script>";
    // header("Location: assets.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assign assets</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- header section -->
    <?php include('navmenu.php'); ?>

    <section class="container">
        <section class="main-head">
            <h2>تعيين العهد</h2>
        </section>
        <section class="inputs">
<?php
            if(isset($_GET['id'])) {
                // Get id value
                $asset = $_GET['id'];
                // select data from table product
                $myquery="SELECT * from `p42_assets` WHERE id='$asset'";
                $result= mysqli_query($bis,$myquery);

                if(mysqli_num_rows($result) > 0) {
                    $assetCode = mysqli_fetch_array($result);

                    $_SESSION['asset_id'] = $assetCode['id'];
                    $_SESSION['asset_name'] = $assetCode['name'];
?>
            <!-- assign asset form  -->
            <form method="post" class="logform">
                <label for="name">اسم العهدة</label>
                <input type="name" name="name" value="<?= $assetCode['name']; ?>" placeholder="أدخل الأسم" required disabled>
                <label for="id">الكود</label>
                <input type="number" name="asset_id" value="<?= $assetCode['id']; ?>" placeholder="أدخل الكود" required disabled>
                <input class="form-control" list="members" oninput="checkInput()" id="exampleDataList" placeholder="أبحث عن اسم العضو" name="members" required>
                <!-- get datalist data from database -->
                <datalist id="members">
                    <?php
                    // select data from table members
                    $myquery = "SELECT name, id FROM `p42_members` WHERE id > 1 ";
                    $result = mysqli_query($bis, $myquery);
                    foreach($result as $data) {
                    ?>
                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                    <?php
                    }
                    ?>
                </datalist>
                
                <script>
function checkInput() {
    // let value = this.value;
    let value = document.getElementById("exampleDataList").value;
    let options = document.getElementById("members").options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value == value) {
            return;
        } 
    }
    alert("من فضلك اختار من القائمة");
    location.reload();
}
                </script>
                
                <!-- <input type="number" name="price" placeholder="Enter price" required> -->
                <input type="text" placeholder="ملاحظات" name="notes" >
                <button type="submit" name="assignasset" class="stylebtn">أضافة</button>
            </form>
            <?php
                }
                else {
                    echo '<script>
                            alert("اختر عهدة اولا");
                            window.location.replace("assets.php");
                        </script>';
                }
            }
            else {
                echo '<script>
                            alert("اختر عهدة اولا");
                            window.location.replace("assets.php");
                    </script>';
                }
?>
            </section>
        </section>

            <!-- footer -->
        <?php
            include('footer.html');
        ?>
        
        <!-- javascript  -->
        <script src="../js/main.js"></script>
    </body>
</html>