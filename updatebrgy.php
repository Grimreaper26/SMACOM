<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $fname = $_POST['fullname'];
    $position = $_POST['position'];
    $status = $_POST['status'];
    $photo = $_FILES['photo']['name'];

    // Handle file upload if new file provided
    if ($photo) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = "brgyofficialphoto/" . basename($photo);
        move_uploaded_file($photo_tmp, $photo_path);
    } else {
        // If no new file, keep the old file
        $photo_path = $_POST['existing_photo'];
    }

    $sql = "UPDATE brgyofficial SET Fullname=:fn, Position=:pos, Status=:sta, Photo=:photo WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':pos', $position, PDO::PARAM_STR);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);
    $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='barangayoff.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM brgyofficial WHERE id=:uid";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $userid, PDO::PARAM_STR);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if ($query->rowCount() > 0) {
    foreach ($result as $results) {
?>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5>Barangay Official Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="">Fullname</label>
                                        <input type="text" name="fullname" value="<?php echo htmlentities($results->Fullname); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1">Position</label>
                                        <select class="form-control" name="position" required>
                                            <option value="Barangay Captain" <?php if ($results->Position == 'Barangay Captain') echo 'selected'; ?>>Barangay Captain</option>
                                            <option value="Kagawad" <?php if ($results->Position == 'Kagawad') echo 'selected'; ?>>Kagawad</option>
                                            <option value="Secretary" <?php if ($results->Position == 'Secretary') echo 'selected'; ?>>Secretary</option>
                                            <option value="Treasurer" <?php if ($results->Position == 'Treasurer') echo 'selected'; ?>>Treasurer</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="Active" <?php if ($results->Status == 'Active') echo 'selected'; ?>>Active</option>
                                            <option value="Inactive" <?php if ($results->Status == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                        <input type="hidden" name="existing_photo" value="<?php echo htmlentities($results->Photo); ?>">
                                        <?php if ($results->Photo) { ?>
                                            <img src="<?php echo htmlentities($results->Photo); ?>" alt="Current Photo" width="100" class="mt-2">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="barangayoff.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-primary" value="submit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>