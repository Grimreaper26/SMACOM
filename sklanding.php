<?php
include('includes/header.php');
include('includes/navbar.php');
include('modalrequest.php');
include('modalrent.php');
require_once("code.php");
?>

<link rel="stylesheet" href="stylesheet.css">
<div class="py-5">

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto" style="max-width:400px;">
                <h1>Welcome</h1>
                <h1>Barangay Sulong</h1>
                <h1>Alimodian Iloilo</h1>
                <p>Barangay Sulong in Alimodian, Iloilo City, is a small,</p>
                <p>rural community with a friendly atmosphere.</p>
                <p>It offers a glimpse of local life and the natural</p>
                <p>beauty of the area.</p>
            </div>
            <div class="col-md-6 ">
                <img src="Logo/barangay.jpg" class="img-fluid rounded" alt="Pamahalaang Barangay">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 my-4 text-center">
                <h1>SANGGUNIANG KABATAAN OFFICIALS</h1>
                <span>2024-2027</span>
                <h2>Together we thrive, Alimodian Pride</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM brgyofficial";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            $brgyCaptain = null;

            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    if ($result->Position == "Barangay Captain") {
                        $brgyCaptain = $result;
                    }
                }

                if ($brgyCaptain) {

            ?>
                    <div class="col-md-6 mx-auto mb-5">
                        <div class="card text-center">
                            <img src="Logo/test.webp" class="card-img-top headshot" alt="Headshot">
                            <div class="card-body">
                                <h5 class="card-title name"><?php echo htmlentities($brgyCaptain->Fullname); ?></h5>
                                <p><?php echo htmlentities($brgyCaptain->Position); ?></p>

                            </div>
                        </div>
                    </div>
                    <?php
                }

                $row_count = 0;
                foreach ($results as $result) {
                    if ($result->Position != "Barangay Captain") {
                        if ($row_count % 3 == 0) {
                            echo '<div class="row">';
                        }
                    ?>
                        <div class="col-md-4 mb-5">
                            <div class="card text-center">
                                <img src="Logo/test.webp" class="card-img-top headshot" alt="Headshot">
                                <div class="card-body">
                                    <h5 class="card-title name"><?php echo htmlentities($result->Fullname); ?></h5>
                                    <p><?php echo htmlentities($result->Position); ?></p>

                                </div>
                            </div>
                        </div>
            <?php
                        $row_count++;
                        if ($row_count % 3 == 0) {
                            echo '</div>';
                        }
                    }
                }
                if ($row_count % 3 != 0) {
                    echo '</div>';
                }
            }
            ?>
            <div id="about"></div>
            <div class="container pt-2">

                <div class="row">
                    <div class="col-12 my-4 ">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 ">
                        <iframe class="col-md-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15676.837476347406!2d122.44923205!3d10.7952704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aefc1e5e7d877f%3A0xf16e1380b37e548a!2sSulong%2C%20Alimodian%2C%20Iloilo!5e0!3m2!1sen!2sph!4v1727708833863!5m2!1sen!2sph" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                    <div class="col-md-6 ">
                        <div>

                            <h1>Our MISSION</h1>
                            <p>To foster a vibrant, inclusive, and safe community by providing accessible services, promoting sustainable development, and actively engaging residents in collaborative governance. </p>
                        </div>
                        <div>
                            <h1>Our Vision</h1>
                            <p>To be a model barangay where everyone thrives, with empowered citizens, efficient public services, and a strong sense of community pride and unity.</p>
                        </div>

                        <div>
                            <h1>OUR VALUES</h1>
                            <p>Innovation</p>
                            <p>Honesty</p>
                            <p>Integrity</p>
                            <div id=services></div>
                            <p>Communication to Public Service</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">

                <div class="row">
                    <div class="col-12 my-4 ">
                        <br> <br>
                        <h2 class="text-center">CERTIFICATES OFFERED</h2>
                    </div>
                </div>
            </div>

            <div class="container-service mt-5">
                <div class="row justify-content-center">
                    <?php
                    $sql = "SELECT * FROM documents";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>
                            <div class="col-md-3 col-sm-4 mb-5 mt-5">
                                <div class="card">
                                    <img src="Logo/test.webp" class="card-img-top headshot" alt="Headshot">
                                    <div class="card-body">
                                        <h5 class="card-title name"><?php echo htmlentities($result->Documentname); ?></h5>
                                        <p class="card_preview-text"><?php echo htmlentities($result->Description); ?></p>
                                        <div id=rent></div>
                                        <a href="#" class="btn btn-primary mb-3 d-flex justify-content-center <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? '' : 'disabled'; ?>" data-toggle="modal" data-target="#requestdata">Request</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $cnt++;
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="container pt-5">
                <div class="row">
                    <div class="col-12 my-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center" style="max-width:400px;">
                        <h1>BASKETBALL COURT</h1>
                        <p>The basketball court at Brgy. Sulong, Alimodian, Iloilo, is a well-maintained facility ideal for casual games and events. With good lighting and a welcoming atmosphere, it's perfect for local teams and community gatherings. Renting is easy, making it accessible for all ages.</p>
                        <a href="#" class="btn btn-primary  text-center mb-3" data-toggle="modal" data-target="#requestrental">Rental</a>
                        <div id=annoucement></div>
                    </div>
                    <div class="col-md-6 ">

                        <img src="/Logo/basketball.jpg" class="img-fluid rounded" alt="Pamahalaang Barangay">

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <h2 class="text-center mt-5">Announcement</h2>

                    <?php
                    $sql = "SELECT * FROM announcement";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);


                    $cnt = 1;

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>

                            <div class="col-md-3 col-sm-4 mb-5 mt-5">
                                <div class="card">

                                    <img src="Logo/annoucement.jpg" class="card-img-top headshot" alt="Headshot">
                                    <div class="card-body">
                                        <h5 class="card-title name "><?php echo htmlentities($result->Announcement); ?></h5>
                                        <p class="card_preview-text "><?php echo htmlentities($result->Description); ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $cnt++;
                        }
                    }
                    ?>

                    <div id=news></div>
                    <div class="container">
                        <div class="row">
                            <h2 class="text-center mt-5">News</h2>
                            <?php
                            $sql = "SELECT * FROM news";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);


                            $cnt = 1;

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>

                                    <div class="col-md-3 col-sm-4 mb-5 mt-5">
                                        <div class="card">

                                            <img src="Logo/news.jpg" class="card-img-top headshot" alt="Headshot">
                                            <div class="card-body">
                                                <h5 class="card-title name "><?php echo htmlentities($result->News); ?></h5>
                                                <p class="card_preview-text "><?php echo htmlentities($result->Description); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $cnt++;
                                }
                            }
                            ?>








                        </div>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php'); ?>