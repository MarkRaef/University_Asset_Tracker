<?php
    $adminid= $_SESSION['userid'];

// // delete row function
//     if(isset($_GET['remove'])){
//     $remove_id = $_GET['remove'];
//     mysqli_query($bis, "DELETE FROM `p42_members` WHERE id = '$remove_id'");
    
//     $done_message = "تم مسح العضو بنجاح";   
//     echo "<script type='text/javascript'>alert('$remove_id');</script>";

//     // // Create query to insert delete record in the `delete` table
//     // $insert_transfer_query = "INSERT INTO `p42_delete` (`asset_id`, `delete_by`, `delete_date`) 
//     //                         VALUES ('$remove_id', '$adminid', now())";
//     // // Execute the query
//     // mysqli_query($bis, $insert_transfer_query);

//     // prevent resubmission
//     echo "<script>
//                 window.location = 'members.php'
//         </script>";


// };

?>




                <div class="row">
            
            <table id="table">
                <thead>
                    <tr>
                        <th># <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الكود <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الأسم <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الرقم القومي <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>رقم الهاتف <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>النوع الوظيفي <i class="fa-solid fa-sort sort-column" data-sort="number"></i></th>
                        <th>الأجراءات </th>
                    </tr>
                </thead>

                <?php

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
                    $myquery = "SELECT * from `p42_members` 
                                WHERE `name` LIKE '%$search%' 
                                LIMIT $start_from, $per_page_record";
                } else {
                    // select data from table members
                    $myquery = "SELECT * from `p42_members` 
                                LIMIT $start_from, $per_page_record";
                }
                
                $result= mysqli_query($bis,$myquery);
                        $count=0;
                        // loop through the data and display it in the table
                        while($data=mysqli_fetch_array($result)) {
                            $count++;
                            ?>
                                <tbody id="tbody">
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['national_id']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['type']; ?></td>
                            <td>
                                <a href="member.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>
                            </td>
<?php
            // $res= mysqli_query($bis,"SELECT member_id from `p42_assets` where member_id = $data[id]");
            // $count_id = mysqli_num_rows($res);
            // if ($count_id >0) {
?>
                <!-- <td>
                    <a href="member.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>
                </td> -->
<?php
            // }
            // else {
?>
                <!-- <td>
                    <a href="members.php?remove=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                </td> -->
<?php
            // }
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
                $query = "SELECT COUNT(*) FROM p42_members";     
              $result = mysqli_query($bis, $query);     
                $row = mysqli_fetch_row($result);     
                $total_records = $row[0];     
                
                // Number of pages required.   
                $total_pages = ceil($total_records / $per_page_record);     
                $pagLink = "";       
            
                if($page>=2){   
                    echo "<a href='members.php?page=".($page-1)."'>  Prev </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='members.php?page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='members.php?page=".$i."'>   
                                                        ".$i." </a>";     
                }   
                };     
                echo $pagLink;   
        
                if($page<$total_pages){   
                    echo "<a href='members.php?page=".($page+1)."'>  Next </a>";   
                }   
        
        ?>    
        </div>  
