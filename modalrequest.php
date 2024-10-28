<?php


require_once("code.php");

if (isset($_POST['inserted'])) {
    $fname = $_POST['fullname'];
    $age = $_POST['age'];
    $document = $_POST['document'];
    $amount = "100";
    $contactnumber = $_POST['contactnumber'];
    $date = $_POST['date'];
    $purpose = $_POST['purpose'];
    $referenceNo = uniqid('REF-');

    $sql = "INSERT INTO documentissuance (Fullname, Age, Document, Amount, ContactNo, Date, Purpose, ReferenceNo)
            VALUES (:fn, :age, :doc, :amount, :con, :date, :pur, :ref)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':doc', $document, PDO::PARAM_STR);
    $query->bindParam(':amount', $amount, PDO::PARAM_INT); // Add this line
    $query->bindParam(':con', $contactnumber, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':pur', $purpose, PDO::PARAM_STR);
    $query->bindParam(':ref', $referenceNo, PDO::PARAM_STR);

    if ($query->execute()) {
        echo "<script>alert('Record Inserted Successfully. Reference No: $referenceNo');</script>";
        echo "<script>window.location.href ='index.php'</script>";
    } else {
        $errorInfo = $query->errorInfo();
        echo "<script>alert('Error inserting record: " . $errorInfo[2] . "');</script>";
        echo "<script>window.location.href ='index.php'</script>";
    }
}
?>

<!-- Modal for Request Data -->

<div class="container">
    <!-- Modal for Request Data -->
    <div class="modal fade" id="requestdata">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestdataLabel">Reservation Document Form</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="inserrequestdata" method="POST" id="requestDataForm">
                        <div class="form-group mb-3">
                            <label for="fullname">Fullname</label>
                            <input type="text" name="fullname" class="form-control " required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fullname">Age</label>
                            <input type="number" name="age" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="document">Document</label>
                            <input type="text" name="document" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="contactnumber">Contact Number</label>
                            <input type="number" name="contactnumber" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Chosen Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Purpose</label>
                        </div>
                        <textarea rows="3" class="w-100" name="purpose" required></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="inserted" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#requestdata').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var documentName = button.data('document'); // Extract info from data-* attributes
            // Update the modal's content.
            var modal = $(this);
            modal.find('.modal-body input[name="document"]').val(documentName);
        });
    });
</script>

