<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $announcement = $_POST['announcement'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $sql = "UPDATE announcement SET Announcement=:announ, Description=:des, Date=:date WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':announ', $announcement, PDO::PARAM_STR);
    $query->bindParam(':des', $description, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='announcement.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM announcement WHERE id=:uid";
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
                                <h5>Announcement Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">Announcement</label>
                                        <input type="text" name="announcement" class="form-control" value="<?php echo htmlentities($results->Announcement); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Date</label>
                                        <input type="date" name="date" class="form-control" value="<?php echo htmlentities($results->Date); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="3" class="w-100" required><?php echo htmlentities($results->Description); ?></textarea>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="announcement.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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
