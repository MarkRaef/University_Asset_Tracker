<?php
// Include database connection file
include('../Connections/syscon.php');

session_start();

$adminid= $_SESSION['userid'];


// Check if form is submitted
if (isset($_POST['endasset']))
{
    $asset_id= $_SESSION['asset_id'];
    $asset_name= $_SESSION['asset_name'];
    // Get input values from form
    $reason = mysqli_real_escape_string($bis, $_POST['reason']);

    $update_assets_query = "UPDATE `p42_assets` SET `state` = 'كهنه' WHERE `id` = '$asset_id'";
    // $update_assets_member_query = "UPDATE `p42_assets` SET `member_id` = 1 WHERE `id` = '$asset_id'";
    if (mysqli_query($bis, $update_assets_query)) {
        // mysqli_query($bis, $update_assets_member_query);
		$done_message = "تم تكهين العهدة بنجاح";
        echo "<script type='text/javascript'>alert('$done_message');</script>";
	} else {
		$message = "<p> :خطأ في تحديث السجل  </p>" . mysqli_error($bis);
        echo "<script type='text/javascript'>alert('$message');</script>";
	}

    // Create query to insert new transfer record in the `end` table
    $insert_transfer_query = "INSERT INTO `p42_end` (`asset_id`, `reason`, `added_by`, `added_date`) 
                            VALUES ('$asset_id', '$reason', '$adminid', now())";
    // Execute the query
    mysqli_query($bis, $insert_transfer_query);

    // prevent resubmission
    echo "<script>
        window.location.replace('assets.php');
        </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>End assets</title>

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
        
        <section class="container">

                <div class="one">
                    <h1 class="main-head">تكهين العهدة</h1>

                </div>
            <section class="inputs">

<?php
        if(isset($_GET['id'])) {
            // Get id value
            $asset = $_GET['id'];
            // select data from table product
            $myquery="SELECT * from `p42_assets`  WHERE id='$asset'";
            $result= mysqli_query($bis,$myquery);

            if(mysqli_num_rows($result) > 0)
                            {
                                $assetCode = mysqli_fetch_array($result);

                                $_SESSION['asset_id'] = $assetCode['id'];
                                $_SESSION['asset_name'] = $assetCode['name'];

?>

                <form method="post" class="logform">
                
                    <label for="asset-id">كود العهدة</label>
                    <input type="number" name="asset-id" min="1" value="<?= $assetCode['id']; ?>" required disabled>

                    <label for="name">أسم العهدة</label>
                    <input type="name" name="name" value="<?= $assetCode['name']; ?>" required disabled>

                    <label for="reason">ما هو السبب ؟</label>
                    <input type="text" placeholder="السبب" name="reason" required>

                    <button type="submit" name="endasset" class="stylebtn">تكهين</button>
                </form>
<?php
                }
                else 
                    {
                        echo '<script>
                                alert("اختر عهدة اولا");
                                window.location.replace("assets.php");
                            </script>';
                    }
            }
            else 
                {
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
