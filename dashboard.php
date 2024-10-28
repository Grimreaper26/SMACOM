<?php

require_once("session.php");
require_once("code.php");
include('includes_admin/header.php');
include('update_usernames.php');
include('update_passwords.php');





?>
<link rel="stylesheet" href="includes_admin/stylebar.css">

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
        <div class="main p-5">
            <div class="">
                <h1>
                    Welcome Back Admin
                </h1>
                <p> Barangay records, reports, and services.</p>
            </div>
            <div class="row pt-5">
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT * FROM residentrecord";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $rowCount = $query->rowCount();

                            ?>

                            <h6 class="card-title">Population</h6>
                            <h1><?php echo htmlentities($rowCount); ?></h1>



                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title ">Sitio</h6>
                            <h1 id="sitio"> 2</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT COUNT(*) AS male_count FROM residentrecord WHERE Gender = 'male'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $maleResult = $query->fetch(PDO::FETCH_ASSOC);
                            $maleCount = $maleResult['male_count'];
                            ?>


                            <h6 class="card-title">Male</h6>
                            <h1><?php echo htmlentities($maleCount); ?></h1>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT COUNT(*) AS female_count FROM residentrecord WHERE Gender = 'female'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $femaleResult = $query->fetch(PDO::FETCH_ASSOC);
                            $femaleCount = $femaleResult['female_count'];
                            ?>

                            <h6 class="card-title">Female</h6>
                            <h1><?php echo htmlentities($femaleCount); ?></h1>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT * FROM incidents";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $rowCount = $query->rowCount();

                            ?>

                            <h6 class="card-title">Blotter</h6>
                            <h1><?php echo htmlentities($rowCount); ?></h1>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 mb-5">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT SUM(amount) AS total_revenue FROM barangayrevenue";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $result = $query->fetch(PDO::FETCH_OBJ);
                            $total_revenue = $result->total_revenue;
                            ?>
                            <h6 class="card-title">Total Revenue</h6>
                            <h1>₱<?php echo htmlentities($total_revenue ?? 0); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="includes_admin/script.js"></script>