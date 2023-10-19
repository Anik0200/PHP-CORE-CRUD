<?php
$title = 'Delete Data';
include 'header.php';

include 'db.php';

if (isset($_POST['deletebtn'])) {
    $id  = $_POST['sid'];

    $sql = "DELETE FROM `student` WHERE sid = $id";

    $res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());

    if ($res) {
        header('location:index.php');
    }
}

?>

<div id="main-content">
    <h2>Delete Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>

<?php
include 'footer.php';
?>