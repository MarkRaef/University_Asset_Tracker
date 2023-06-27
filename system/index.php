<?php
    include('../Connections/syscon.php');
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

// Query to retrieve the count of rows from the 'p42_assets' table
$query = "SELECT COUNT(*) as assetCount FROM p42_assets";
$result = mysqli_query($bis, $query);

// Check if the query executed successfully
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $assetCount = $row['assetCount'];
} else {
    // Error handling if the query fails
    $assetCount = 'N/A';
}

?>

<?php

// Query to retrieve the count of rows from the 'p42_members' table
$query = "SELECT COUNT(*) as memberCount FROM p42_members";
$resultmember = mysqli_query($bis, $query);

// Check if the query executed successfully
if ($resultmember) {
    $row = mysqli_fetch_assoc($resultmember);
    $memberCount = $row['memberCount'];
} else {
    // Error handling if the query fails
    $memberCount = 'N/A';
}



// Query to retrieve the count of rows from the 'users' table
$query = "SELECT COUNT(*) as users FROM users";
$resultmember = mysqli_query($bis, $query);

// Check if the query executed successfully
if ($resultmember) {
    $row = mysqli_fetch_assoc($resultmember);
    $userCount = $row['users'];
} else {
    // Error handling if the query fails
    $userCount = 'N/A';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_SESSION['app_name']; ?></title>

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

    <section class="home">
        <div class="container">
        <div class="row">
            <div class="card">
                <h2>عدد العهد</h2>
                <br>
                <p class="card-num"><?php echo $assetCount; ?></p>
            </div>

            <div class="card">
                <h2>عدد المستخدمين</h2>
                <br>
                <p class="card-num"><?php echo $userCount; ?></p>
            </div>
            <div class="card">
                <h2>عدد الاعضاء</h2>
                <br>
                <p class="card-num"><?php echo $memberCount; ?></p>
            </div>

            <div class="card">
                <h2>عدد العهد</h2>
                <p class="card-num"><?php echo $assetCount; ?></p>
                <div class="card-info">
<!-- query for stats -->
<?php
        $statsql = "SELECT state, COUNT(state) as numbers FROM `p42_assets` GROUP BY state;";
        $statresult = mysqli_query($bis, $statsql);
    foreach($statresult as $data)
        {
            $state[] = $data["state"];
            $num[] = $data["numbers"];
?>
            <p><?php echo  $data['state']; ?> <span><?php echo  $data['numbers']; ?></span></p>
<?php
        };

?>
                </div>
            </div>


        <div class="card">
                <h2>الفئات</h2>
                <div class="card-info">
<!-- query for stats -->
<?php
        $csql = "SELECT b.category,COUNT(category_id) AS amount FROM p42_assets a JOIN p42_category b ON a.category_id = b.id GROUP BY a.category_id;";
        $cresult = mysqli_query($bis, $csql);
        foreach($cresult as $cdata)
        {
?>
            <p class="card-num"><?php echo $cdata['category']; ?> <span><?php echo  $cdata['amount']; ?></span></p>
<?php
        };

?>
                </div>
            </div>


        </div>
        </div>
    </section>

        <!-- footer -->
        <?php
            include('footer.html');
        ?>
        <!-- javascript  -->
        <script src="../js/main.js"></script>

</body>
</html>
