<?php
$title = 'Home';
include 'header.php';

?>

<div id="main-content">
    <h2>All Records</h2>

    <?php
    include 'db.php';

    $limit = 3;

    if (isset($_GET['page'])) {

        $page = $_GET['page'];
    } else {

        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid LIMIT {$offset}, {$limit}";

    $res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());

    if (mysqli_num_rows($res) > 0) {

    ?>

        <table cellpadding="7px">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>

                <?php
                foreach ($res as $value) {
                ?>
                    <tr>
                        <td><?php echo $value['sid']; ?></td>
                        <td><?php echo $value['sname']; ?></td>
                        <td><?php echo $value['saddress']; ?></td>
                        <td><?php echo $value['cname']; ?></td>
                        <td><?php echo $value['sphone']; ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $value['sid']; ?>'>Edit</a>
                            <a href='delete-inline.php?id=<?php echo $value['sid']; ?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>



    <?php

    } else {

        echo '<p class="text-danger text-center">No Record</p>';
    }


    $sqlP = "SELECT * FROM student";
    $resP = mysqli_query($conn, $sqlP) or die("QUERY FAILED");

    if (mysqli_num_rows($resP) > 0) {

        $total_rec = mysqli_num_rows($resP);
        $total_page = ceil($total_rec / $limit);
    }

    echo '<ul class="pagination admin-pagination">';

    if ($page > 1) {

        echo '<li><a href="index.php?page= ' . ($page - 1) . ' ">P</a></li>';
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "deactive";
        }
        echo '<li class = ' . $active . '><a href="index.php?page= ' . $i . ' "> ' . $i . ' </a></li>';
    }
    if ($total_page > $page) {

        echo '<li><a href="index.php?page= ' . ($page + 1) . ' ">N</a></li>';
    }

    echo '</ul>';
    ?>

</div>

<?php
include 'footer.php';
?>