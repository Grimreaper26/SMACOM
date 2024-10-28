<?php


require_once("code.php");
if (isset($_POST['insert'])) {
    $date = $_POST['date'];
    $manage = $_POST['manage'];
    $project = $_POST['project'];
    $cost = $_POST['cost'];

    // Handle file upload
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_path = "transparencyphoto/" . basename($photo_name);

    if (move_uploaded_file($photo_tmp, $photo_path)) {
        // File uploaded successfully
        $sql = "INSERT INTO transparency (Date, Manage, Project, Cost, Photo) VALUES (:date, :man, :proj, :cost, :photo)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':man', $manage, PDO::PARAM_STR);
        $query->bindParam(':proj', $project, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);

        if ($query->execute()) {
            echo "<script>alert('Record Inserted Successfully');</script>";
            echo "<script>window.location.href ='transparency.php'</script>";
        } else {
            $errorInfo = $query->errorInfo();
            echo "<script>alert('Error inserting record: " . $errorInfo[2] . "');</script>";
            echo "<script>window.location.href ='transparency.php'</script>";
        }
    } else {
        echo "<script>alert('Failed to upload photo');</script>";
    }
}
?>

<div class="modal fade" id="addtrans" tabindex="-1" role="dialog" aria-labelledby="addtransLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addtransLabel">Transparency</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertrevenuedata" method="POST"  enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Manage</label>
                        <input type="text" name="manage" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Project</label>
                        <input type="text" name="project" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Cost</label>
                        <input type="number" name="cost" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="photo">Receipt-Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Details</button>
            </div>
            </form>
        </div>
    </div>
</div>