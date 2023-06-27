<?php
    $per_page_record = 10; // Number of entries to show in a page.
    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page_record;
?>

<div class="row">
    <table id="table">
        <thead>
            <tr>
                <th><i class="fa-solid fa-hashtag"></i> <i class="fa-solid fa-sort sort-column"></i></th>
                <th>الكود <i class="fa-solid fa-sort sort-column"></i></th>
                <th>عضو رقم 1 <i class="fa-solid fa-sort sort-column"></i></th>
                <th>العهدة <i class="fa-solid fa-sort sort-column"></i></th>
                <th>عضو رقم 2 <i class="fa-solid fa-sort sort-column"></i></th>
                <th>السبب <i class="fa-solid fa-sort sort-column"></i></th>
                <th>المسئول <i class="fa-solid fa-sort sort-column"></i></th>
                <th>التاريخ و الوقت <i class="fa-solid fa-sort sort-column"></i></th>
            </tr>
        </thead>

        <?php
        // select data from table product
        $myquery = "SELECT a.*, m1.name AS member1_name, m2.name AS member2_name, u.user_ar_name, u.username, x.name AS a_name
                    FROM `p42_transfer` AS a
                    JOIN p42_members AS m1 ON a.member1 = m1.id
                    JOIN p42_members AS m2 ON a.member2 = m2.id
                    JOIN p42_assets AS x ON a.asset = x.id
                    LEFT JOIN users AS u ON a.added_by = u.user_id
                    ORDER BY a.id DESC
                    LIMIT $start_from, $per_page_record";

        $result = mysqli_query($bis, $myquery);
        $count = 0;
        // fetch data from database in form of array
        while ($data = mysqli_fetch_array($result)) {
            $count++;
        ?>
            <tbody id="tbody">
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['member1_name']; ?></td>
                    <td><?php echo $data['a_name']; ?> - <?php echo $data['asset']; ?></td>
                    <td><?php echo $data['member2_name']; ?></td>
                    <td><?php echo $data['reason']; ?></td>
                    <td><?php echo $data['user_ar_name'].' - '.$data['username']; ?></td>
                    <td><?php echo $data['added_time']; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</div>

<!-- pagination table -->
<div class="pagination">
    <?php
    $query = "SELECT COUNT(*) FROM p42_transfer";
    $result = mysqli_query($bis, $query);
    $row = mysqli_fetch_row($result);
    $total_records = $row[0];

    $total_pages = ceil($total_records / $per_page_record);
    $pagLink = "";

    if ($page >= 2) {
        echo "<a href='reports.php?page=" . ($page - 1) . "'>Prev</a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $pagLink .= "<a class='active' href='reports.php?page=" . $i . "'>" . $i . "</a>";
        } else {
            $pagLink .= "<a href='reports.php?page=" . $i . "'>" . $i . "</a>";
        }
    }
    echo $pagLink;

    if ($page < $total_pages) {
        echo "<a href='reports.php?page=" . ($page + 1) . "'>Next</a>";
    }
    ?>
</div>
