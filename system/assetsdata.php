<?php

    $adminid= $_SESSION['userid'];


// delete row function
    if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($bis, "DELETE FROM `p42_assets` WHERE id = '$remove_id'");
    
    $done_message = " تم حذف العهدة بنجاح" .$remove_id;   
    echo "<script type='text/javascript'>alert('$done_message');</script>";

    // Create query to insert delete record in the `delete` table
    $insert_transfer_query = "INSERT INTO `p42_delete` (`asset_id`, `delete_by`, `delete_date`) 
                            VALUES ('$remove_id', '$adminid', now())";
    // Execute the query
    mysqli_query($bis, $insert_transfer_query);

    // prevent resubmission
    echo "<script>
                window.location = 'assets.php'
        </script>";


};

?>


<?php
        // // For extra protection these are the columns of which the user can sort by (in your database table).
        //     $columns = array('name','id','member_id','category_id','type','state','price','added_by','added_date');

        //     // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
        //     $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

        //     // Get the sort order for the column, ascending or descending, default is ascending.
        //     $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';



                $per_page_record = 10;  // Number of entries to show in a page.   
                // Look for a GET variable page if not found default is 1.        
                if (isset($_GET["page"])) {    
                    $page  = $_GET["page"];    
                }    
                else {    
                    $page=1;    
                }    
                $start_from = ($page-1) * $per_page_record;     
                
                // Check if the search button is clicked
                if(isset($_POST['btn']) && !empty($_POST['search'])){
                    $search = mysqli_real_escape_string($bis, $_POST['search']);
                    $myquery = "SELECT a.*, m.name AS member_name, u.username, u.user_ar_name ,c.category
                        FROM p42_assets AS a
                        LEFT JOIN p42_members AS m ON a.member_id = m.id
                        LEFT JOIN users AS u ON a.added_by = u.user_id
                        LEFT JOIN p42_category AS c ON a.category_id = c.id
                                WHERE a.name LIKE '%$search%' 
                                LIMIT $start_from, $per_page_record
                                ";
                } else {
                    // select data from table assets
                    $myquery = "SELECT a.*, m.name AS member_name, u.username , u.user_ar_name ,c.category
                        FROM p42_assets AS a
                        LEFT JOIN p42_members AS m ON a.member_id = m.id
                        LEFT JOIN users AS u ON a.added_by = u.user_id
                        LEFT JOIN p42_category AS c ON a.category_id = c.id
                        
                        ORDER BY a.id DESC
                        LIMIT $start_from, $per_page_record
                                ";
                }
                
                $result= mysqli_query($bis,$myquery);
                $count=0;
                ?>






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
                        <th>أسم العضو <i class="fa-solid fa-sort sort-column" data-sort="name"></i></th>
                        <th>المسئول <i class="fa-solid fa-sort sort-column" data-sort="user_id"></i></th>
                        <th>التاريخ <i class="fa-solid fa-sort sort-column" data-sort="date"></i></th>
                        <th>الأجراءات</th>
                    </tr>
                </thead>

<?php
                // fetch data from database in form of array
                while($data=mysqli_fetch_array($result)) {
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
                            <td> <a href="member.php?id=<?php echo $data['member_id']; ?>">
                                    <?php echo $data['member_name']; ?>
                                </a>
                            </td>
                            <td><?php echo $data['user_ar_name'].' - '.$data['username']; ?></td>
                            <td><?php echo $data['added_date']; ?></td>
<?php
            if ($data['member_id'] >1) {
                if($data['state'] == "تعمل") {
?>
                            <td>
                                <a href="assetpage.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>
                                <a href="transfer.php?id=<?php echo $data['id']; ?>" id="transfare"><i class="fa-solid fa-right-left"></i></a>
                                <a href="end.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-ban"></i></a>
                            </td>
<?php
                }
                else {
?>
                            <td>
                                <a href="assetpage.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>
                            </td>
<?php
                }
?>

<?php
            } 

            else if ($data['member_id'] ==1) {
                if($data['state'] == "تعمل") {
?>
                        <td>
                            <a href="assignasset.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-user-plus"></i></a>
                            <a href="assets.php?remove=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>


<?php
                }
                else {
?>
                    <td>
                        <a href="assetpage.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>
                    </td>
<?php
                }
?>
                        

                            

<?php
            } 
        
?>
                        </tr> 
                    </tbody>

<?php
            
        }
?>
                    </table>
                </div>

        <div class="pagination">   
            
        <?php  
                $query = "SELECT COUNT(*) FROM p42_assets";     
                $result = mysqli_query($bis, $query);     
                $row = mysqli_fetch_row($result);     
                $total_records = $row[0];     
                
            // echo "</br>";     
                // Number of pages required.   
                $total_pages = ceil($total_records / $per_page_record);     
                $pagLink = "";       
            
                if($page>=2){   
                    echo "<a href='assets.php?page=".($page-1)."'>  Prev </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='assets.php?page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='assets.php?page=".$i."'>   
                                                        ".$i." </a>";     
                }   
                };     
                echo $pagLink;   
        
                if($page<$total_pages){   
                    echo "<a href='assets.php?page=".($page+1)."'>  Next </a>";   
                }   
        
        ?>    
        </div>