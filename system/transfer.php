<?php
// Include database connection file
include('../Connections/syscon.php');

session_start();

$adminid= $_SESSION['userid'];
$asset_id= $_SESSION['asset_id'];
$doc_id= $_SESSION['doctor_id'];
// echo $asset_id;
// echo $_SESSION['asset_id'];
// echo $_SESSION['doctor_id'];



// Check if form is submitted
if (isset($_POST['addasset']))
{
    // Get input values from form

    $member2 = mysqli_real_escape_string($bis, $_POST['member2_id']);
    $reason = mysqli_real_escape_string($bis, $_POST['reason']);

    // $sql = "SELECT id FROM p42_members WHERE id = '$doc_id' LIMIT 1" ;
	// 	$check_query = mysqli_query($bis,$sql);
	// 	$count_id = mysqli_num_rows($check_query);
		$err_msg= "لا يمكن نقل العهدة الي نفس العضو";

        if( $doc_id == $member2){
			echo "<script type='text/javascript'>alert('$err_msg');</script>";
		}

        else {
            // Create query to insert new transfer record in the `transfer` table
        $insert_transfer_query = "INSERT INTO `p42_transfer` (`member1`, `asset`, `member2`, `reason`, `added_by`, `added_time`) 
                                VALUES ('$doc_id', '$asset_id', '$member2', '$reason', '$adminid', now())";
        // Execute the query
        mysqli_query($bis, $insert_transfer_query);

        // Check if doctor2 value is provided, then update the `assets` table with the new `doctor_id` for the transferred asset
        if (!empty($member2)) {
            $update_assets_query = "UPDATE `p42_assets` SET `member_id` = '$member2' WHERE `id` = '$asset_id'";
            mysqli_query($bis, $update_assets_query);
        }

        // Display success message
        $done_message = "تم تحويل العهدة بنجاح";
        echo "<script type='text/javascript'>alert('$done_message');</script>";

        // prevent resubmission
        echo "<script>
                    window.location.replace('assets.php');
            </script>";
        }

}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>transfer assets</title>
        
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
            <section class="main-head">
                <h2>نقل العهد من عضو الي عضو</h2>
            </section>

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
                                $_SESSION['doctor_id'] = $assetCode['member_id'];
?>

                <form method="post" class="logform">
                        <label for="asset-id">كود العهدة</label>
                        <input type="number"  name="asset-id" min="1" value="<?= $assetCode['id']; ?>" required disabled>
                        
                        <label for="asset-name">أسم العهدة</label>
                        <input type="name" name="name" value="<?= $assetCode['name']; ?>" required disabled>

                        <label for="doc1-id">كود العضو رقم-1</label>
                        <input type="number" name="doc1-id" min="1" value="<?php echo  $assetCode['member_id'];?>" required disabled>

                    
                    <label for="doc2-id">اسم العضو رقم-2</label>
                    <input class="form-control" name="member2_id" list="member2_id" oninput="checkInput()" id="exampleDataList" placeholder="اختر اسم العضو">
                    
                    <!-- get datalist data from database -->
                    <datalist name="member2_id" id="member2_id" required>

<?php
                    // select data from table members
                    $myquery = "SELECT id , name from `p42_members` WHERE id > 1";
                    $result= mysqli_query($bis,$myquery);
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
    let options = document.getElementById("member2_id").options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value == value) {
            return;
        } 
    }
    alert("من فضلك اختار من القائمة");
    location.reload();
}
                </script>

                    <div class="input-group">
                        
                        <input type="text" name="reason" required>
                        <label for="reason">السبب</label>
                    </div>
                        
                        <!-- <button type="submit" name="addasset" class="btn signupbtn main-btn">transfare</button> -->
                        <button type="submit" name="addasset" class="stylebtn">تحويل</button>
                        <!-- <button id="submit" type="submit" name="addasset">add</button> -->
                </form>

<?php
                }
                else 
                    {
                        echo '<script>
                                alert("اختر العهدة اولا");
                                window.location.replace("assets.php");
                            </script>';
                    }
            }
            else 
                {
                    echo '<script>
                            alert("اختر العهدة اولا");
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