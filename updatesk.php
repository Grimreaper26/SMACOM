<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $fname = $_POST['fullname'];
    $position = $_POST['position'];
    $status = $_POST['status'];
    $sql = "UPDATE skofficial SET Fullname=:fn, Position=:pos, Status=:sta WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':pos', $position, PDO::PARAM_STR);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='skofficial.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM skofficial WHERE id=:uid";
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
                                <h5>Sangunian Kabataan Official Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">Fullname</label>
                                        <input type="text" name="fullname" value="<?php echo htmlentities($results->Fullname); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1">Position</label>
                                        <select class="form-control" name="position" required>
                                            <option value="Sk Charmain" <?php if ($results->Position == 'Sk Chairman') echo 'selected'; ?>>Sk Chairman</option>
                                            <option value="Sk Kagawad" <?php if ($results->Position == 'Sk Kagawad') echo 'selected'; ?>>Sk Kagawad</option>
                                            <option value="Sk Secretary" <?php if ($results->Position == 'Sk Secretary') echo 'selected'; ?>>Sk Secretary</option>
                                            <option value="Sk Treasurer" <?php if ($results->Position == 'Sk Treasurer') echo 'selected'; ?>>Sk Treasurer</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end ">
                                        <a href="skofficial.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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
