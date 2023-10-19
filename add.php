<?php
$title = 'Add Data';
include 'header.php';
session_start();
?>

<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
            <?php
            if (isset($_SESSION['val']['sname'])) {
                echo $_SESSION['val']['sname'];
            }
            unset($_SESSION['val']['sname']);
            ?>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
            <?php
            if (isset($_SESSION['val']['saddress'])) {
                echo $_SESSION['val']['saddress'];
            }
            unset($_SESSION['val']['saddress']);
            ?>
        </div>

        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <?php
                include 'db.php';
                $sql = "SELECT * FROM studentclass";
                $res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());
                if (mysqli_num_rows($res) > 0) {
                ?>
                    <option selected disabled>Select Class</option>

                    <?php
                    foreach ($res as $value) {
                    ?>
                        <option value="<?php echo $value['cid']; ?>"><?php echo $value['cname']; ?></option>
                    <?php
                    }
                    ?>
            </select>
        <?php } ?>

        <?php
        if (isset($_SESSION['val']['class'])) {
            echo $_SESSION['val']['class'];
        }
        unset($_SESSION['val']['class']);
        ?>

        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />

            <?php
            if (isset($_SESSION['val']['sphone'])) {
                echo $_SESSION['val']['sphone'];
            }
            unset($_SESSION['val']['sphone']);
            ?>
        </div>
        <input class="submit" type="submit" name="submit" value="Save" />
    </form>
</div>

<?php
include 'footer.php';
?>