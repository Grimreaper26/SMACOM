<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $complainant = $_POST['complainant'];
    $respondent = $_POST['respondent'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $status = $_POST['status'];
    $sql = "UPDATE incidents SET Complainant=:com, Respondent=:res, Victim=:vic, Incident=:inc, Status=:sta WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':com', $complainant, PDO::PARAM_STR);
    $query->bindParam(':res', $respondent, PDO::PARAM_STR);
    $query->bindParam(':vic', $victim, PDO::PARAM_STR);
    $query->bindParam(':inc', $incident, PDO::PARAM_STR);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='incident.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM incidents WHERE ID=:uid";
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
                                <h5>Incident Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">Complainant</label>
                                        <input type="text" name="complainant" class="form-control" value="<?php echo htmlentities($results->Complainant); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Respondent</label>
                                        <input type="text" name="respondent" class="form-control" value="<?php echo htmlentities($results->Respondent); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Victim</label>
                                        <input type="text" name="victim" class="form-control" value="<?php echo htmlentities($results->Victim); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Incident</label>
                                        <input type="text" name="incident" class="form-control" value="<?php echo htmlentities($results->Incident); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="Active" <?php if ($results->Status == 'Active') echo 'selected'; ?>>Active</option>
                                            <option value="Ongoing" <?php if ($results->Status == 'Ongoing') echo 'selected'; ?>>Ongoing</option>
                                            <option value="Settled" <?php if ($results->Status == 'Settled') echo 'selected'; ?>>Settled</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="incident.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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