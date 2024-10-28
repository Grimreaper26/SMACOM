<?php
require_once 'code.php';
include('/includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $date = $_POST['date'];
    $manage = $_POST['manage'];
    $project = $_POST['project'];
    $cost = $_POST['cost'];

    // Handle file upload if new file provided
    $photo = $_FILES['photo']['name'];
    if ($photo) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . basename($photo);
        move_uploaded_file($photo_tmp, $photo_path);
    } 

    $sql = "UPDATE transparency SET Date=:date, Manage=:man, Project=:proj, Cost=:cost, Photo=:photo WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':man', $manage, PDO::PARAM_STR);
    $query->bindParam(':proj', $project, PDO::PARAM_STR);
    $query->bindParam(':cost', $cost, PDO::PARAM_STR);
    $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_INT);
    $query->execute();

    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='transparency.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM transparency WHERE id=:uid";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $userid, PDO::PARAM_INT);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($result as $results) {
?>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5>Transparency Record Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="updatetransparency" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" value="<?php echo htmlentities($results->Date); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="manage">Manage</label>
                                        <input type="text" name="manage" value="<?php echo htmlentities($results->Manage); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="project">Project</label>
                                        <input type="text" name="project" value="<?php echo htmlentities($results->Project); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cost">Cost</label>
                                        <input type="text" name="cost" value="<?php echo htmlentities($results->Cost); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="transparency.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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