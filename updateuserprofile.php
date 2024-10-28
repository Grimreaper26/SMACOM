<?php
require_once 'code.php';
include( 'includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {
    $userid = intval($_GET['id']);
    $password = $_POST['password'];

    // Hash the password for security


    $sql = "UPDATE users SET Password=:pass WHERE id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pass', $password, PDO::PARAM_STR); // Use the hashed password
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);

    if ($query->execute()) {
        echo "<script>alert('Record updated successfully!');</script>";
        echo "<script>window.location.href='userprofile.php'</script>";
    } else {
        echo "<script>alert('Update failed! Please try again.');</script>";
    }
}



                            ?>

                            <?php
                            $userid = intval($_GET['id']);
                            $sql = "SELECT * FROM users WHERE id=:uid";
                            $query = $dbh->prepare($sql);

                            $query->bindParam('uid', $userid, PDO::PARAM_STR);
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($result as $results); {
                            ?>

        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5>News Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertusersdata" method="POST">


                                    <div class="form-group mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control"  value="<?php echo htmlentities($results->Username); ?>" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="text" name="password" class="form-control" value="<?php echo htmlentities($results->Password); ?>" required>
                                    </div>

                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end ">
                                        <a href="userprofile.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-primary" value="submit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
<?php
    }
}
?>
</form>
</div>
</div>
</div>