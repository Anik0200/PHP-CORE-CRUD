<?php
$title = 'Edit Data';
include 'header.php';
?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    include 'db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM student WHERE sid = $id";
    $res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());

    if (mysqli_num_rows($res) > 0) {
        foreach ($res as $value) {
    ?>

            <form class="post-form" action="updatedata.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="sid" value="<?php echo $value['sid'] ?>" />
                    <input type="text" name="sname" value="<?php echo $value['sname'] ?>" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="saddress" value="<?php echo $value['saddress'] ?>" />
                </div>

                <div class="form-group">
                    <label>Class</label>
                    <?php
                    include 'db.php';
                    $sql2 = "SELECT * FROM studentclass";
                    $res2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful! : " . mysqli_connect_error());
                    if (mysqli_num_rows($res2) > 0) {
                        echo '<select name="class">';

                        foreach ($res2 as $value2) {

                            if ($value['sclass'] == $value2['cid']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }

                            echo "<option {$selected} value='{$value2['cid']}'>{$value2['cname']}</option>";
                        }

                        echo '</select>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="sphone" value="<?php echo $value['sphone'] ?>" />
                </div>
                <input class="submit" type="submit" value="Update" />
            </form>

    <?php
        }
    }
    ?>
</div>

<?php
include 'footer.php';
?>