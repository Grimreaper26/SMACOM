<?php
require_once("code.php");

if (isset($_POST['insert'])) {
    $fname = $_POST['fullname'];
    $position = $_POST['position'];
    $status = $_POST['status'];
    $photo = $_FILES['photo']['name'];

    // Handle file upload
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_path = "brgyofficialphoto/" . basename($photo);

    if (move_uploaded_file($photo_tmp, $photo_path)) {
        // File uploaded successfully
        $sql = "INSERT INTO brgyofficial(Fullname,Position,Status,Photo) VALUES(:fn,:pos,:sta,:photo)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fn', $fname, PDO::PARAM_STR);
        $query->bindParam(':pos', $position, PDO::PARAM_STR);
        $query->bindParam(':sta', $status, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if ($lastInsertId) {
            echo "<script>alert('Record Inserted Successfully');</script>";
            echo "<script>window.location.href ='barangayoff.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong');</script>";
            echo "<script>window.location.href ='barangayoff.php'</script>";
        }
    } else {
        echo "<script>alert('Failed to upload photo');</script>";
    }
}
?>





<div class="modal fade" id="addofficial" tabindex="-1" role="dialog" aria-labelledby="addofficialLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addofficialLabel">Barangay Official</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertofficialdata" method="POST" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Position</label>
                        <select class="form-control" name="position" required>
                            <option>Captain</option>
                            <option>Kagawad</option>
                            <option>Secretary</option>
                            <option>Treasurer</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status" required>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" id="photo" class="form-control" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Officials</button>
            </div>
            </form>
        </div>
    </div>
</div>