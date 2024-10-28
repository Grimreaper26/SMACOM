<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mi = $_POST['middleinitial'];
    $age = $_POST['age'];
    $civilstatus = $_POST['civilstatus'];
    $gender = $_POST['gender'];
    $contactnumber = $_POST['contactnumber'];
    $sitio = $_POST['sitio'];
    $household = $_POST['household'];
    $sql = "UPDATE residentrecord SET Firstname=:fn, Lastname=:ln, MiddleInitial=:mi, Age=:age, CivilStatus=:civil, Gender=:gen, ContactNumber=:contnum, Sitio=:sit, Household=:house WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    $query->bindParam(':mi', $mi, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':civil', $civilstatus, PDO::PARAM_STR);
    $query->bindParam(':gen', $gender, PDO::PARAM_STR);
    $query->bindParam(':contnum', $contactnumber, PDO::PARAM_STR);
    $query->bindParam(':sit', $sitio, PDO::PARAM_STR);
    $query->bindParam(':house', $household, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='residentrecord.php'</script>";
}

$userid = intval($_GET['id']);
$sql = "SELECT * FROM residentrecord WHERE id=:uid";
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
                                <h5>Resident Record Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">Firstname</label>
                                        <input type="text" name="firstname" value="<?php echo htmlentities($results->Firstname); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Lastname</label>
                                        <input type="text" name="lastname" value="<?php echo htmlentities($results->Lastname); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Middle Initial</label>
                                        <input type="text" name="middleinitial" value="<?php echo htmlentities($results->MiddleInitial); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Age</label>
                                        <input type="number" name="age" value="<?php echo htmlentities($results->Age); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1">CivilStatus</label>
                                        <select class="form-control" name="civilstatus" required>
                                            <option value="Single" <?php if ($results->CivilStatus == 'Single') echo 'selected'; ?>>Single</option>
                                            <option value="Married" <?php if ($results->CivilStatus == 'Married') echo 'selected'; ?>>Married</option>
                                            <option value="Widowed" <?php if ($results->CivilStatus == 'Widowed') echo 'selected'; ?>>Widowed</option>
                                            <option value="Divorced" <?php if ($results->CivilStatus == 'Divorced') echo 'selected'; ?>>Divorced</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($results->Gender == 'Male') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Male</label>
                                        <input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($results->Gender == 'Female') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Contact Number</label>
                                        <input type="number" name="contactnumber" class="form-control" value="<?php echo htmlentities($results->ContactNumber); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div>
                                        <label for="">Sitio</label>
                                        </div>
                                        <div>
                                        <select class="form-control" name="sitio" required>
                                            <option value="Sitio Ilogan" <?php if ($results->Sitio == 'Sitio Ilogan') echo 'selected'; ?>>Sitio Ilogan</option>
                                            <option value="Sitio Igtuba" <?php if ($results->Sitio == 'Sitio Igtuba') echo 'selected'; ?>>Sitio Igtuba</option>
                                        </select>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Household Number</label>
                                        <input class="form-control" name="household" value="<?php echo htmlentities($results->Household); ?>" required>
                                    </div>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="../dashboard/residentrecord.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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