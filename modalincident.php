<?php


require_once("code.php");

if (isset($_POST['insert'])) {
    $complainant = $_POST['complainant'];
    $respondent = $_POST['respondent'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $status = $_POST['status'];





    $sql = "INSERT INTO incidents(Complainant,Respondent,Victim,Incident,Status) VALUES(:com,:res,:vic,:inc,:sta)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':com', $complainant, PDO::PARAM_STR);
    $query->bindParam(':res', $respondent, PDO::PARAM_STR);
    $query->bindParam(':vic', $victim, PDO::PARAM_STR);
    $query->bindParam(':inc', $incident, PDO::PARAM_STR);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>Alert('Record Inserted Successfully');</script>";
        echo "<script>window.location.href ='incident.php'</script>";
    } else {
        echo "<script>Alert('Something Wrong');</script>";
        echo "<script>window.location.href ='incident.php'</script>";
    }
}

?>





<div class="modal fade" id="addincident" tabindex="-1" role="dialog" aria-labelledby="addincidentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addincidentLabel">Incident</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertofficialdata" method="POST">

                    <div class="form-group mb-3">
                        <label for="">Complainant</label>
                        <input type="text" name="complainant" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Respondent</label>
                        <input type="text" name="respondent" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Victim</label>
                        <input type="text" name="victim" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Incident</label>
                        <input type="text" name="incident" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status" required>
                            <option>Active</option>
                            <option>Ongoing</option>
                            <option>Settled</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Incident</button>
            </div>
            </form>
        </div>
    </div>
</div>