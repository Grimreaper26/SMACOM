<?php
require_once("code.php");

if (isset($_POST['insert'])) {
    $fname = $_POST['fullname'];
    $rent = $_POST['rent'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $photo = $_FILES['photo']['name'];
    $purpose = $_POST['purpose'];

    // Generate a unique reference number
    $referenceNo = uniqid('REF-');

    // Validate date and time format
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || !preg_match("/^\d{2}:\d{2}$/", $starttime) || !preg_match("/^\d{2}:\d{2}$/", $endtime)) {
        echo "<script>alert('Invalid date or time format');</script>";
        exit;
    }

    // Check for conflicting bookings
    $conflictQuery = $dbh->prepare("SELECT * FROM servicerental WHERE Date = :date AND Rent = :rent AND ((StartTime <= :start AND EndTime >= :start) OR (StartTime <= :end AND EndTime >= :end) OR (StartTime >= :start AND EndTime <= :end))");
    $conflictQuery->bindParam(':date', $date, PDO::PARAM_STR);
    $conflictQuery->bindParam(':rent', $rent, PDO::PARAM_STR);
    $conflictQuery->bindParam(':start', $starttime, PDO::PARAM_STR);
    $conflictQuery->bindParam(':end', $endtime, PDO::PARAM_STR);
    $conflictQuery->execute();

    if ($conflictQuery->rowCount() > 0) {
        $conflicts = $conflictQuery->fetchAll(PDO::FETCH_OBJ);
        $conflictMessages = [];
        foreach ($conflicts as $conflict) {
            $conflictMessages[] = "Date: " . htmlentities($conflict->Date) . ", Start Time: " . htmlentities($conflict->StartTime) . ", End Time: " . htmlentities($conflict->EndTime);
        }
        $conflictMessage = implode("\\n", $conflictMessages);
        echo "<script>alert('The selected date and time range is already booked:\\n$conflictMessage');</script>";
        exit;
    }

    // Handle file upload
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_path = "uploads/" . basename($photo);
    if (move_uploaded_file($photo_tmp, $photo_path)) {
        // File uploaded successfully
        $sql = "INSERT INTO servicerental (Fullname, Email, ContactNumber, Gender, Date, Photo, Purpose, StartTime, EndTime, Rent, ReferenceNo)
                VALUES (:fn, :em, :con, :gen, :date, :photo, :pur, :start, :end, :rent, :ref)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fn', $fname, PDO::PARAM_STR);
        $query->bindParam(':em', $email, PDO::PARAM_STR);
        $query->bindParam(':con', $contactnumber, PDO::PARAM_STR);
        $query->bindParam(':gen', $gender, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':start', $starttime, PDO::PARAM_STR);
        $query->bindParam(':end', $endtime, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo_path, PDO::PARAM_STR);
        $query->bindParam(':pur', $purpose, PDO::PARAM_STR);
        $query->bindParam(':rent', $rent, PDO::PARAM_STR);
        $query->bindParam(':ref', $referenceNo, PDO::PARAM_STR);
        
        if ($query->execute()) {
            echo "<script>alert('Record Inserted Successfully. Reference No: $referenceNo');</script>"; 
            echo "<script>window.location.href ='index.php'</script>";
        } else {
            $errorInfo = $query->errorInfo();
            echo "<script>alert('Error inserting record: " . $errorInfo[2] . "');</script>";
            echo "<script>window.location.href ='index.php'</script>";
        }
    } else {
        echo "<script>alert('Failed to upload photo');</script>";
    }
}

?>





<div class="modal fade" id="requestrental" tabindex="-1" role="dialog" aria-labelledby="requestrentalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestrentalLabel">Reservation Form</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form name="insertofficialdata" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Rent</label>
                        <input type="text" name="rent" class="form-control" required id="rent">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email(Optional)</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Contact Number</label>
                        <input type="number" name="contactnumber" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male">
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female">
                            <label class="form-check-label">Female</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Chosen Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Start Time</label>
                        <input type="time" name="starttime" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">End Time</label>
                        <input type="time" name="endtime" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Purpose</label>
                        <textarea rows="3" class="w-100" name="purpose" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="photo">Valid Photo ID</label>
                        <input type="file" name="photo" id="photo" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Rental</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#requestrental').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var documentName = button.data('document'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('.modal-body input[name="rent"]').val(documentName);
        });
    });
</script>


