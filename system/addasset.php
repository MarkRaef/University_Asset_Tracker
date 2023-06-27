<?php
include('../Connections/syscon.php');

session_start();

$userid= $_SESSION['userid'];
$user_en=$_SESSION['username'];
?>

<?php

// check if the add category form is submitted
if (isset($_POST['addcategory'])) {
    // retrieve the category name
    $categoryName = mysqli_real_escape_string($bis, $_POST['category']);

    // prepare the SQL statement
    $sql = "INSERT INTO p42_category (category) VALUES ('$categoryName')";

    // execute the SQL statement
    if (mysqli_query($bis, $sql)) {
        $donemessage = "تمت إضافة الفئة بنجاح!";
        echo "<script type='text/javascript'>alert('$donemessage');</script>";
        // prevent resubmission
        echo "
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
        </script>";
    } else {
        $errormessage = ":خطأ" . $sql . "<br>" . mysqli_error($bis);
        echo "<script type='text/javascript'>alert('$errormessage');</script>";
    }
}




// check that the textbox variables is not empty
if (isset($_POST['addasset']))
{
    // get data from user

    $name = mysqli_real_escape_string($bis, $_POST['name']);
    $category = $_POST['category'];
    $type = mysqli_real_escape_string($bis, $_POST['type']);
    $description = mysqli_real_escape_string($bis, $_POST['desc']);
    $price = mysqli_real_escape_string($bis, $_POST['price']);
    $img = mysqli_real_escape_string($bis, $_POST['img']);
    $notes = mysqli_real_escape_string($bis, $_POST['notes']);
    
    $count = $_POST['count'];

    // insert data to table product in database
    $sel="INSERT INTO `p42_assets`(`name`, `type`, `category_id`, `descr`, `price`, `image`, `notes`, `added_by`, `added_date`) 
    VALUES ('$name', '$type', '$category', '$description','$price','$img','$notes', '$userid', now())";


    if(mysqli_query($bis, $sel)) {
        // display alert message contain success message
        $donemessage = "تمت إضافة العهدة بنجاح";
        echo "<script type='text/javascript'>alert('$donemessage');</script>";


        // iterate based on the count value
        for ($i = 1; $i < $count; $i++) {
            
            // Insert additional data into the p42_assets table
            $additionalSel = "INSERT INTO `p42_assets`(`name`, `type`, `category_id`, `descr`, `price`, `image`, `notes`, `added_by`, `added_date`) 
            VALUES ('$name', '$type', '$category', '$description','$price','$img','$notes', '$userid', now())";
            mysqli_query($bis, $additionalSel);
        }


        // prevent resubmission
        echo "
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
        </script>";
    } else {
        // display alert message contain error message
        $errormessage = ":خطأ في إضافة العهدة " . mysqli_error($bis);
        echo "<script type='text/javascript'>alert('$errormessage');</script>";
    }

}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add assets</title>
        
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
                <h2>أضافة عهدة</h2>
            </section>

            <section class="inputs">
                <form method="post" class="logform">

                    <label for="name">الأسم</label>
                    <input type="name" placeholder="أسم العهدة" name="name" required>
                    
                    <label for="category">الفئة</label>
                    <div class="category">
                        

                        <input class="form-control" name="category" list="category" oninput="checkInput()" id="exampleDataList" placeholder="أبحث عن الفئة">
                        
                        <!-- get datalist data from database -->
                        <datalist name="category" id="category" required>

    <?php
                        // select data from table members
                        $myquery = "SELECT id , category from `p42_category`";
                        $result= mysqli_query($bis,$myquery);
                        foreach($result as $data) {
    ?>
                        <option value="<?= $data['id'] ?>"><?= $data['category'] ?></option>
    <?php
                        }
    ?>
                        </datalist>
                        <a class="stylebtn" id="open-category" onclick="categoryFunction()">أضف فئة</a>

                        <script>
function checkInput() {
    // let value = this.value;
    let value = document.getElementById("exampleDataList").value;
    let options = document.getElementById("category").options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value == value) {
            return;
        } 
    }
    alert("اختار الفئة من القائمة");
    location.reload();
}
                    </script>

                    </div>
                    <label for="type">نوع العهدة</label>
                    <select name="type" id="type" required>
                                <option value="">أختر</option>
                                <option value="مستدامة">مستدامة</option>
                                <option value="استهلاكيه">استهلاكيه</option>

                    </select>
                    <label for="description">الوصف</label>
                    <input type="text" placeholder="أدخل الوصف" name="desc" required>
                    
                    <label for="price">السعر</label>
                    <input type="number" placeholder="أدخل السعر" name="price" required>

                    <label for="count">العدد</label>
                    <input type="number" placeholder="العدد" name="count" min="1" max="100" >

                    <label for="img">صورة</label>
                    <input type="file" name="img" value="choose image" accept="image/*">
                    
                    <label for="notes">ملاحظات</label>
                    <input type="text" placeholder="أدخل ملاحظات" name="notes">
                    
                    
                <button type="submit" name="addasset" class="stylebtn">أضافة</button>
                
                </form>
                
                <div class ="add-category" id="add-category">
                    <div class="main-head">
                        <h2>أضافة فئة</h2>
                    </div>
                    <!-- add category form  -->
                    <form action="" method="post">
                        <label for="category">الفئة</label>
                        <input type="text" placeholder="أدخل أسم الفئة" name="category" required>
                        <button type="submit" name="addcategory" class="stylebtn">أضافة فئة</button>
                    </form>
                    <a class="stylebtn" id="close-category" onclick="categoryFunction()">أغلق</a>
                </div>
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
