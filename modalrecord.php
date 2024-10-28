<?php


require_once("code.php");

if (isset($_POST['insert'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mi = $_POST['middleinitial'];
    $age = $_POST['age'];
    $civilstatus = $_POST['civilstatus'];
    $gender = $_POST['gender'];
    $contactnumber = $_POST['contactnumber'];
    $sitio = $_POST['sitio'];
    $household = $_POST['household'];





    $sql = "INSERT INTO residentrecord(Firstname,Lastname,MiddleInitial,Age,CivilStatus,Gender,ContactNumber,Sitio,Household) VALUES(:fn,:ln,:mi,:age,:civil,:gen,:contnum,:sit,:house)";
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


    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>Alert('Record Inserted Successfully');</script>";
        echo "<script>window.location.href ='residentrecord.php'</script>";
    } else {
        echo "<script>Alert('Something Wrong');</script>";
        echo "<script>window.location.href ='residentrecord.php'</script>";
    }
}

?>





<div class="modal fade" id="addrecord" tabindex="-1" role="dialog" aria-labelledby="addrecordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addrecordLabel">Resident Record</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertrecorddata" method="POST">

                    <div class="form-group mb-3">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Lastname</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Middile Initial</label>
                        <input type="text" name="middleinitial" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">CivilStatus</label>
                        <select class="form-control" name="civilstatus" required>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Divorced</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        
                    <input class="form-check-input" type="radio" name="gender" value="Male">
                        <label class="form-check-label">Male</label>
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">ContactNumber</label>
                        <input type="number" name="contactnumber" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Sitio</label>
                        <select class="form-control" name="sitio" required>
                            <option>Sitio Ilogan</option>
                            <option>Sitio Igtuba</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Household Number</label>
                        <input class="form-control" name="household" required> </input>    
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Resident</button>
            </div>
            </form>
        </div>
    </div>
</div>