<?php
require_once ('code.php');
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $status = $_POST['status'];
    $sql = "UPDATE documentissuance SET Status=:sta WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='documentissuance.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM documentissuance WHERE ID=:uid";
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
                                <h5>Document Issuance Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="Released" <?php if ($results->Status == 'Released') echo 'selected'; ?>>Released</option>
                                            <option value="Pending" <?php if ($results->Status == 'Pending') echo 'selected'; ?>>Pending</option>
                                            <option value="Reject" <?php if ($results->Status == 'Reject') echo 'selected'; ?>>Reject</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="documentissuance.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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