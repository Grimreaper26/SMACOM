<?php
require_once("code.php"); // Ensure correct database connection

if (isset($_POST['insert'])) {
    $recipient = $_POST['recipient'];
    $details = $_POST['details'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];


    $sql = "INSERT INTO barangayrevenue (Recipient, Details, Amount, Date) VALUES (:res, :det, :amount, :date)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':res', $recipient, PDO::PARAM_STR);
    $query->bindParam(':det', $details, PDO::PARAM_STR);
    $query->bindParam(':amount', $amount, PDO::PARAM_STR); 
    $query->bindParam(':date', $date, PDO::PARAM_STR);

 
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>alert('Record Inserted Successfully');</script>"; 
        echo "<script>window.location.href ='barangayrevenue.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>"; 
        echo "<script>window.location.href ='barangayrevenue.php'</script>";
    }
}
?>


<div class="modal fade" id="addrevenue" tabindex="-1" role="dialog" aria-labelledby="addrevenueLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addrevenuelLabel">Revenue</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertrevenuedata" method="POST">

                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Recepient</label>
                        <input type="text" name="recipient" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Details</label>
                        <input type="text" name="details" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Amount</label>
                        <input type="text" name="amount" class="form-control" required>
                    </div>
                    


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Revenue</button>
            </div>
            </form>
        </div>
    </div>
</div>