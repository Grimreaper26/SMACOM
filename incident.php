<?php

include('modalincident.php');
include('includes_admin/footer.php');
require_once("session.php");
if (isset($_REQUEST['del'])) {

    $uid = intval($_GET['del']);
    $sql = "DELETE FROM incidents WHERE id=:id";

    $query = $dbh->prepare($sql);

    $query->bindParam(':id', $uid, PDO::PARAM_STR);



    $query->execute();
    echo "<script>alert('Record successfully deleted!');</script>";
    echo "<script>window.location.href='incident.php'</script>";
}


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

        <!--Start Code Here  -->
        <div class="main p-5">
            <div class="d-flex justify-content-between p-4">

                <h1>Incident Reports</h1>
                <a href="#" class=" btn btn-primary text-center" data-toggle="modal" data-target="#addincident">+ Incident Report</a>
            </div>


            <div class="row pt-5">
                <div class="col-md-4  col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT COUNT(*) AS active_count FROM incidents WHERE Status = 'Active'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $activeResult = $query->fetch(PDO::FETCH_ASSOC);
                            $activeCount = $activeResult['active_count'];
                            ?>
                            <h6 class="card-title">Active</h6>
                            <h1><?php echo htmlentities($activeCount); ?></h1>



                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 mb-3">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT COUNT(*) AS ongoing_count FROM incidents WHERE Status = 'Ongoing'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $ongoingResult = $query->fetch(PDO::FETCH_ASSOC);
                            $ongoingCount = $ongoingResult['ongoing_count'];
                            ?>

                            <h6 class="card-title ">Ongoing</h6>
                            <h1><?php echo htmlentities($ongoingCount); ?></h1>


                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 mb-3">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT COUNT(*) AS settled_count FROM incidents WHERE Status = 'settled'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $settledResult = $query->fetch(PDO::FETCH_ASSOC);
                            $settledCount = $settledResult['settled_count'];
                            ?>


                            <h6 class="card-title">Settled</h6>
                            <h1><?php echo htmlentities($settledCount); ?></h1>

                        </div>
                    </div>
                </div>

                <div class="container  mt-5 ">
                    <table id="brgytable" class="table   table-bordered ">
                        <thead>
                            <tr>

                                <th scope="col">Complainant</th>
                                <th scope="col">Respondent</th>
                                <th scope="col">Victim</th>
                                <th scope="col">Incident</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM incidents";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);


                            $cnt = 1;

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>

                                    <tr>

                                        <td><?php echo htmlentities($result->Complainant); ?></td>
                                        <td><?php echo htmlentities($result->Respondent); ?></td>
                                        <td><?php echo htmlentities($result->Victim); ?></td>
                                        <td><?php echo htmlentities($result->Incident); ?></td>
                                        <td><?php echo htmlentities($result->Status); ?></td>
                                        <td>
                                            <a href="incident.php?del=<?php echo htmlentities($result->id); ?>"><i class="lni lni-trash-can p-2" onclick="return confirm('Do you really want to delete?')"></i></a>
                                            <a href="updateincident.php?id=<?php echo htmlentities($result->id); ?>"><i class="lni lni-pencil p-2"></i></a>

                                        </td>

                                    </tr>
                            <?php
                                    $cnt++;
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