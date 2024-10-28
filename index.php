<?php
include('includes/header.php');
include('includes/navbar.php');
include('modalrequest.php');
include('modalannoun.php');
include('modalnew.php');
include('modalrent.php');
require_once("code.php");


?>


<link rel="stylesheet" href="stylesheet.css">
<script  src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script  src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script  src="script.js"></script>
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
                <img src="/Logo/barangay.jpg" class="img-fluid rounded" alt="Pamahalaang Barangay">
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 my-4 text-center">
                <h1>BRGY OFFICIALS</h1>
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
                            <img src="<?php echo htmlentities($brgyCaptain->Photo); ?>" class="card-img-top headshot" alt="Headshot">
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
                                <img src="<?php echo htmlentities($result->Photo); ?>" class="card-img-top headshot" alt="Headshot">
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

            <div class="container-service mt-5 ">
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
                                    <img src="Logo/test.webp" class="card-img-top headshot " alt="Headshot">
                                    <div class="card-body ">
                                        <h5 class="card-title name"><?php echo htmlentities($result->Documentname); ?></h5>
                                        <p class="card_preview-text"><?php echo htmlentities($result->Description); ?></p>                                                                                                                                             
                                        
                                        <a href="#" class="btn btn-primary mb-3 d-flex justify-content-center <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? '' : 'disabled'; ?>" data-toggle="modal" data-target="#requestdata" data-document="<?php echo htmlentities($result->Documentname); ?>">Request</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $cnt++;
                        }
                    }
                    ?>
<div id=rented></div>
                </div>
            </div>

            <div class="container pt-5">
                <div class="row">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner"> 
                            <?php
                            $sql = "SELECT * FROM services";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 0;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <div class="carousel-item <?php echo $cnt === 0 ? 'active' : ''; ?>">
                                        <img src="logo/basketball.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center text-center" style="top: 50%; transform: translateY(-50%);">
                                            <h5 class="display-4 fw-bolder"><?php echo htmlentities($result->Service_name); ?></h5>
                                            <p class=""><?php echo htmlentities($result->Description); ?></p>
                                            <a href="#" class="btn btn-primary w-25" data-toggle="modal" data-target="#requestrental" data-document="<?php echo htmlentities($result->Service_name); ?>">Rent Now</a>
                                            </div> 
                                    </div>
                            <?php
                                    $cnt++;
                                }
                            }
                            ?>
                        </div> 
                        
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>      
                             <div id="annoucement"></div>
                    </div>
                </div>   
            </div>
            
            <div class="container">
                <div class="row justify-content-center">
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
                                        <h5 class="card-title name"><?php echo htmlentities($result->Announcement); ?></h5>
                                        <p class="card_preview-text"><?php echo htmlentities($result->Description); ?></p>
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-primary w-50" data-toggle="modal" data-target="#announcementModal" data-title="<?php echo htmlentities($result->Announcement); ?>" data-description="<?php echo htmlentities($result->Description); ?>">See more</a>
                                        </div>
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

            
            <div id=news></div>
            <div class="container">
                <div class="row justify-content-center">
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
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-primary w-50" data-toggle="modal" data-target="#newsModal" data-title="<?php echo htmlentities($result->News); ?>" data-description="<?php echo htmlentities($result->Description); ?>">See more</a>
                                        </div>
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

    <div class="container  mt-5 ">
        <div class="row">
            <h1 class="pb-5 text-center">TRANSPARENCY REPORT</h1>
            <?php
            // Get the start and end dates of the current week
            $start_date = date('Y-m-d', strtotime('monday this week'));
            $end_date = date('Y-m-d', strtotime('sunday this week'));

            // Calculate the weekly revenue
            $sql_weekly = "SELECT SUM(cost) AS weekly_revenue FROM transparency WHERE date BETWEEN :start_date AND :end_date";
            $query_weekly = $dbh->prepare($sql_weekly);
            $query_weekly->bindParam(':start_date', $start_date, PDO::PARAM_STR);
            $query_weekly->bindParam(':end_date', $end_date, PDO::PARAM_STR);
            $query_weekly->execute();
            $result_weekly = $query_weekly->fetch(PDO::FETCH_OBJ);
            $weekly_revenue = $result_weekly->weekly_revenue;
            ?>

            <div class="col-md-4 col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Weekly Revenue</h6>
                        <h1>₱<?php echo htmlentities($weekly_revenue ?? 0); ?></h1>
                    </div>
                </div>
            </div>

            <?php
            // Get the start and end dates of the current month
            $start_date = date('Y-m-01'); // First day of the current month
            $end_date = date('Y-m-t'); // Last day of the current month

            // Calculate the monthly revenue
            $sql_monthly = "SELECT SUM(cost) AS monthly_revenue FROM transparency WHERE date BETWEEN :start_date AND :end_date";
            $query_monthly = $dbh->prepare($sql_monthly);
            $query_monthly->bindParam(':start_date', $start_date, PDO::PARAM_STR);
            $query_monthly->bindParam(':end_date', $end_date, PDO::PARAM_STR);
            $query_monthly->execute();
            $result_monthly = $query_monthly->fetch(PDO::FETCH_OBJ);
            $monthly_revenue = $result_monthly->monthly_revenue;
            ?>

            <div class="col-md-4 col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Monthly Revenue</h6>
                        <h1>₱<?php echo htmlentities($monthly_revenue ?? 0); ?></h1>
                    </div>
                </div>
            </div>
            <?php
            // Get the start and end dates of the current year
            $start_date = date('Y-01-01'); // First day of the current year
            $end_date = date('Y-12-31'); // Last day of the current year

            // Calculate the yearly revenue
            $sql_yearly = "SELECT SUM(cost) AS yearly_revenue FROM transparency WHERE date BETWEEN :start_date AND :end_date";
            $query_yearly = $dbh->prepare($sql_yearly);
            $query_yearly->bindParam(':start_date', $start_date, PDO::PARAM_STR);
            $query_yearly->bindParam(':end_date', $end_date, PDO::PARAM_STR);
            $query_yearly->execute();
            $result_yearly = $query_yearly->fetch(PDO::FETCH_OBJ);
            $yearly_revenue = $result_yearly->yearly_revenue;
            ?>

            <div class="col-md-4 col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Yearly Revenue</h6>
                        <h1>₱<?php echo htmlentities($yearly_revenue ?? 0); ?></h1>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">Manage</th>
                        <th scope="col">Project</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Date</th>
                        <th scope="col">Receipt</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM transparency";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>

                            <tr>
                                <td><?php echo htmlentities($result->Manage); ?></td>
                                <td><?php echo htmlentities($result->Project); ?></td>
                                <td>₱<?php echo htmlentities($result->Cost); ?></td>
                                <td><?php echo htmlentities($result->Date); ?></td>
                                <td> <a href="<?php echo htmlentities($result->Photo); ?>" target="_blank">
                                        <img src="<?php echo htmlentities($result->Photo); ?>" alt="Photo" style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;">
                                    </a></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>