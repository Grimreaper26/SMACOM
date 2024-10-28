<?php
include('includes/header.php');
include('includes/footer.php');
require_once 'code.php';
session_start();

if (isset($_POST['update'])) {
    $userid = $_SESSION['userid']; // Use the logged-in user's ID
    $fname = $_POST['firstname'] ?? ''; // Using null coalescing operator
    $lname = $_POST['lastname'] ?? '';
    $mi = $_POST['middleinitial'] ?? '';
    $age = $_POST['age'] ?? '';
    $civilstatus = $_POST['civilstatus'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $contactnumber = $_POST['contactnumber'] ?? '';
    $sitio = $_POST['sitio'] ?? '';
    $household = $_POST['household'] ?? '';
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_path = "uploads/" . basename($photo);

    if (!empty($photo)) {
        if (move_uploaded_file($photo_tmp, $photo_path)) {
            $sql = "UPDATE residentrecord SET Firstname=:fn, Lastname=:ln, MiddleInitial=:mi, Age=:age, CivilStatus=:civil, Gender=:gen, ContactNumber=:contnum, Sitio=:sit, Household=:house, Photo=:photo WHERE id=:uid";
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
            $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);
            $query->bindParam(':uid', $userid, PDO::PARAM_STR);
            $query->execute();
            echo "<script>alert('Record updated successfully!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Failed to upload photo');</script>";
        }
    } else {
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
        echo "<script>window.location.href='../index.php'</script>";
    }
}

$userid = $_SESSION['userid'];
$sql = "SELECT * FROM residentrecord WHERE id=:uid";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $userid, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

if ($query->rowCount() > 0)
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5>Profile</h5>
                    </div>
                    <div class="card pt-4">
                        <img src="Logo/test.webp" class="card-img-top headshot mx-auto w-50 h-50" alt="Headshot">
                        <div class="card-body">
                        </div>
                    </div>
                    <div class="card-body">
                        <form name="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="photo">Photo:</label>
                                <input type="file" name="photo" id="photo" class="form-control" value="<?php echo htmlentities($result->Photo); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstname" value="<?php echo htmlentities($result->Firstname); ?>" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" value="<?php echo htmlentities($result->Lastname); ?>" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="middleinitial">Middle Initial</label>
                                <input type="text" name="middleinitial" value="<?php echo htmlentities($result->MiddleInitial); ?>" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="age">Age</label>
                                <input type="number" name="age" value="<?php echo htmlentities($result->Age); ?>" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1">CivilStatus</label>
                                <select class="form-control" name="civilstatus" required>
                                    <option value="Single" <?php echo ($result->CivilStatus == 'Single') ? 'selected' : ''; ?>>Single</option>
                                    <option value="Married" <?php echo ($result->CivilStatus == 'Married') ? 'selected' : ''; ?>>Married</option>
                                    <option value="Widowed" <?php echo ($result->CivilStatus == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                    <option value="Divorced" <?php echo ($result->CivilStatus == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($result->Gender == 'Male') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($result->Gender == 'Female') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contactnumber">Contact Number</label>
                                <input type="number" name="contactnumber" value="<?php echo htmlentities($result->ContactNumber); ?>" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sitio">Sitio</label>
                                <select class="form-control" name="sitio" required>
                                    <option value="Sitio Ilogan" <?php echo ($result->Sitio == 'Sitio Ilogan') ? 'selected' : ''; ?>>Sitio Ilogan</option>
                                    <option value="Sitio Igtuba" <?php echo ($result->Sitio == 'Sitio Igtuba') ? 'selected' : ''; ?>>Sitio Igtuba</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="household">Household Number</label>
                                <input type="text" name="household" value="<?php echo htmlentities($result->Household); ?>" class="form-control" required>
                            </div>
                            <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button type="submit" name="update" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>