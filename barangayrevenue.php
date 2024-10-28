<?php

include('modalrevenue.php');
include('includes_admin/footer.php');
require_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="includes_admin/stylebar.css">




</head>

<body>
    <div class="wrapper">
    <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <img class="headerlogo " src="/Logo/headerlogo.png" alt="Alimodian">
                </button>
                <div class="sidebar-logo">
                    <a href="#">Smacom</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#brgy" aria-expanded="false" aria-controls="brgy">
                        <i class="lni lni-files"></i>
                        <span>Barangay Information</span>
                    </a>
                    <ul id="brgy" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="barangayoff.php" class="sidebar-link">Barangay Information</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="skofficial.php" class="sidebar-link">SK Official</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="sitiorecord.php" class="sidebar-link">Sitio</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#record" aria-expanded="false" aria-controls="record">
                        <i class="lni lni-folder"></i>
                        <span>Record Management</span>
                    </a>
                    <ul id="record" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="residentrecord.php" class="sidebar-link">Resident Record</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="household.php" class="sidebar-link">Household Record</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="incident.php" class="sidebar-link">Incident Records</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#docs" aria-expanded="false" aria-controls="docs">
                        <i class="lni lni-book"></i>
                        <span>Docoments And Revenue</span>
                    </a>
                    <ul id="docs" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="document.php" class="sidebar-link">Documents</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="documentissuance.php" class="sidebar-link">Documents Issuance</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="barangayrevenue.php" class="sidebar-link">Barangay Revenue</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="transparency.php"class="sidebar-link">Transparency</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#updates" aria-expanded="false" aria-controls="updates">
                        <i class="lni lni-network"></i>
                        <span>Community Updates</span>
                    </a>
                    <ul id="updates" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="announcement.php" class="sidebar-link">Annoucement</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="news.php" class="sidebar-link">News</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#services" aria-expanded="false" aria-controls="services">
                        <i class="lni lni-phone"></i>
                        <span>Services</span>
                    </a>
                    <ul id="services" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="services.php" class="sidebar-link">Services</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="servicerental.php" class="sidebar-link">Service Request</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="dashboardbackup.php" class="sidebar-link">
                        <i class="lni lni-layers"></i>
                        <span>Backup</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="userprofile.php" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>User Profiles</span>
                </a>
            </div>
            <hr>
            <div class="sidebar-footer">
                <a href="logout_admin.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
</aside>
        <style>

        </style>

        <!--Start Code Here  -->
        <div class="main p-5">
            <div class="d-flex justify-content-between p-4">

                <h1>Barangay Revenue</h1>
                <a href="#" class=" btn btn-primary text-center" data-toggle="modal" data-target="#addrevenue">+ Add Revenue</a>
            </div>
            <div class="row pt-5">
                <?php
                // Get the start and end dates of the current week
                $start_date = date('Y-m-d', strtotime('monday this week'));
                $end_date = date('Y-m-d', strtotime('sunday this week'));

                // Calculate the weekly revenue
                $sql_weekly = "SELECT SUM(amount) AS weekly_revenue FROM barangayrevenue WHERE date BETWEEN :start_date AND :end_date";
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
                $sql_monthly = "SELECT SUM(amount) AS monthly_revenue FROM barangayrevenue WHERE date BETWEEN :start_date AND :end_date";
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
                $sql_yearly = "SELECT SUM(amount) AS yearly_revenue FROM barangayrevenue WHERE date BETWEEN :start_date AND :end_date";
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


                <div class="container  mt-5 ">
                    <table id="brgytable" class="table   table-bordered ">
                        <thead>
                            <tr>

                                <th scope="col">Date</th>
                                <th scope="col">Recipient</th>
                                <th scope="col">Details</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $sql_fetch = "SELECT  Date,Fullname, Document, Amount FROM documentissuance";
                            $query_fetch = $dbh->prepare($sql_fetch);
                            $query_fetch->execute();
                            $results_fetch = $query_fetch->fetchAll(PDO::FETCH_OBJ);

                            foreach ($results_fetch as $row) {
                                $date = $row->Date;
                                $fullname = $row->Fullname;
                                $document = $row->Document;
                                $amount = $row->Amount;

                                // Check if the record already exists in barangayrevenue
                                $sql_check = "SELECT COUNT(*) FROM barangayrevenue WHERE date=:date AND recipient=:recipient AND details=:details AND amount=:amount";
                                $query_check = $dbh->prepare($sql_check);
                                $query_check->bindParam(':date', $date, PDO::PARAM_STR);
                                $query_check->bindParam(':recipient', $fullname, PDO::PARAM_STR);
                                $query_check->bindParam(':details', $document, PDO::PARAM_STR);
                                $query_check->bindParam(':amount', $amount, PDO::PARAM_STR);
                                $query_check->execute();
                                $exists = $query_check->fetchColumn();

                                if (!$exists) {
                                    // Insert records into barangayrevenue table
                                    // Fix: Corrected binding and insertion of date parameter
                                    $sql_insert = "INSERT INTO barangayrevenue (date, recipient, details, amount) VALUES (:date, :recipient, :details, :amount)";
                                    $query_insert = $dbh->prepare($sql_insert);
                                    $query_insert->bindParam(':date', $date, PDO::PARAM_STR);
                                    $query_insert->bindParam(':recipient', $fullname, PDO::PARAM_STR);
                                    $query_insert->bindParam(':details', $document, PDO::PARAM_STR);
                                    $query_insert->bindParam(':amount', $amount, PDO::PARAM_STR);
                                    $query_insert->execute();
                                }
                            }
                            // Display records from barangayrevenue table
                            $sql = "SELECT * FROM barangayrevenue";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>

                                    <tr>
                                        <td><?php echo htmlentities($result->Date); ?></td>
                                        <td><?php echo htmlentities($result->Recipient); ?></td>
                                        <td><?php echo htmlentities($result->Details); ?></td>
                                        <td><?php echo htmlentities($result->Amount); ?></td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="includes_admin/script.js"></script>
</body>




</script>

</html>