<?php


require_once("code.php");

if (isset($_POST['insert'])) {
    $fname = $_POST['fullname'];
    $position = $_POST['position'];
    $status = $_POST['status'];



    

    $sql = "INSERT INTO skofficial(Fullname,Position,Status) VALUES(:fn,:pos,:sta)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':pos', $position, PDO::PARAM_STR);
    $query->bindParam(':sta', $status, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>Alert('Record Inserted Successfully');</script>";
        echo "<script>window.location.href ='skofficial.php'</script>";
    } else {
        echo "<script>Alert('Something Wrong');</script>";
        echo "<script>window.location.href ='skofficial.php'</script>";
    }
}

?>





<div class="modal fade" id="addsk" tabindex="-1" role="dialog" aria-labelledby="addskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addsklLabel">Sangunian Kabataan Official</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertofficialdata" method="POST" >


                    <div class="form-group mb-3">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Position</label>
                        <select class="form-control" name="position" required>
                            <option>Sk Chairman</option>
                            <option>Sk Kagawad</option>
                            <option>Sk Secretary</option>
                            <option>Sk Treasurer</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status" required>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Sk Officials</button>
            </div>
            </form>
        </div>
    </div>
</div>