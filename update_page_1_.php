<?php
include("header.php");
include("dbcon.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // استعلام لجلب بيانات الطالب بناءً على المعرف (id)
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            die("No record found with the given ID.");
        }
    }
}
?>

<?php
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    // الحصول على القيم من النموذج
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Age = $_POST['age'];

    // استعلام لتحديث بيانات الطالب
    $query = "UPDATE students SET first_name='$Fname', last_name='$Lname', age='$Age' WHERE id = '$idnew'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=You have successfully updated the data');
    }
}
?>

<!-- نموذج التحديث -->
<form action="update_page_1_.php?id_new=<?php echo $id ?>" method="post">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>">
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?>">
    </div>

    <div class="form-group">
        <label>AGE</label>
        <input type="number" name="age" class="form-control" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>">
    </div>

    <div class="form-group">
        <input type="submit" name="update_students" class="btn btn-success" value="Update">
    </div>
</form>

<?php include("footer.php"); ?>