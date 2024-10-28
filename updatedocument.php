<?php
require_once 'code.php';
include('includes_admin/header.php');
include('includes_admin/footer.php');

if (isset($_POST['update'])) {

    $userid = intval($_GET['id']);
    $document = $_POST['document'];
    $description = $_POST['description'];
    

    $sql = "UPDATE documents SET Documentname=:doc,Description=:des WHERE id=:uid";

    $query = $dbh->prepare($sql);

    $query->bindParam(':doc', $document, PDO::PARAM_STR);
    $query->bindParam(':des', $description, PDO::PARAM_STR);
    $query->bindParam('uid', $userid, PDO::PARAM_STR);


    $query->execute();
    echo "<script>alert('Record updated successfully!');</script>";
    echo "<script>window.location.href='document.php'</script>";
            }


                            ?>

                            <?php
                            $userid = intval($_GET['id']);
                            $sql = "SELECT * FROM documents WHERE id=:uid";
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
                                <h5>Document Edit</h5>
                            </div>
                            <div class="card-body">
                                <form name="insertofficialdata" method="POST">


                                    <div class="form-group mb-3">
                                        <label for="">Document</label>
                                        <input type="text" name="document" class="form-control"  value="<?php echo htmlentities($results->Documentname); ?>" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                    </div>
                                    <textarea name="description" rows="3" class="w-100" required> <?php echo htmlentities($results->Description); ?></textarea>
                                    <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end ">
                                        <a href="document.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
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