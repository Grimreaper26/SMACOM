<?php


require_once("code.php");

if (isset($_POST['insert'])) {
    $service = $_POST['service'];
    $description = $_POST['description'];






    $sql = "INSERT INTO services(Service_name,Description) VALUES(:ser,:des)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':ser', $service, PDO::PARAM_STR);
    $query->bindParam(':des', $description, PDO::PARAM_STR);


    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>Alert('Record Inserted Successfully');</script>";
        echo "<script>window.location.href ='services.php'</script>";
    } else {
        echo "<script>Alert('Something Wrong');</script>";
        echo "<script>window.location.href ='services.php'</script>";
    }
}

?>
<div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="addserviceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addservicelLabel">Services</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertnewsdata" method="POST">

                    <div class="form-group mb-3">
                        <label for="">Service</label>
                        <input type="text" name="service" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                    </div>
                    <textarea name="description" rows="3" class="w-100" required></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Service</button>
            </div>
            </form>
        </div>
    </div>
</div>