<?php


require_once("code.php");

if (isset($_POST['insert'])) {
    $news = $_POST['news'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    
    




    $sql = "INSERT INTO news(News,Description,Date) VALUES(:news,:des,:date)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':news', $news, PDO::PARAM_STR);
    $query->bindParam(':des', $description, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>Alert('Record Inserted Successfully');</script>";
        echo "<script>window.location.href ='news.php'</script>";
    } else {
        echo "<script>Alert('Something Wrong');</script>";
        echo "<script>window.location.href ='news.php'</script>";
    }
}

?>





<div class="modal fade" id="addnews" tabindex="-1" role="dialog" aria-labelledby="addnewsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewslLabel">Announcement</h5>
                <button type="button " class="btn-close  " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body ">
                <form name="insertnewsdata" method="POST">

                    <div class="form-group mb-3">
                        <label for="">News</label>
                        <input type="text" name="news" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    
                    <div class="form-group mb-3">
                    <label for="">Description</label>
                    </div>
                    <textarea name="description" rows="3" class="w-100"  required></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add News</button>
            </div>
            </form>
        </div>
    </div>
</div>