<?php

require_once("code.php");
include('includes_admin/footer.php');
require_once("session.php");
if (isset($_REQUEST['del'])) {

    $uid = intval($_GET['del']);
    $sql = "DELETE FROM servicerental WHERE id=:id";

    $query = $dbh->prepare($sql);

    $query->bindParam(':id', $uid, PDO::PARAM_STR);



    $query->execute();
    echo "<script>alert('Record successfully deleted!');</script>";
    echo "<script>window.location.href='servicerental.php'</script>";
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

                <h1>Services/Rental Request</h1>

            </div>


            <div class="container  mt-5 ">
                <table id="brgytable" class="table   table-bordered ">
                    <thead>
                        <tr>

                            <th class="col" scope="col">Fullname</th>
                            <th class="col" scope="col">Rent</th>
                            <th class="col" scope="col">Email</th>
                            <th class="col" scope="col">Reference No.</th>
                            <th class="col" scope="col">ContactNumber</th>
                            <th class="col" scope="col">Gender</th>
                            <th class="col" scope="col">Chosen Date</th>
                            <th class="col" scope="col">Start Time</th>
                            <th class="col" scope="col">End Time</th>
                            <th class="col" scope="col">Upload ID</th>
                            <th class="col" scope="col">Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM servicerental";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);


                        $cnt = 1;

                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                        ?>

                                <tr>

                                    <td><?php echo htmlentities($result->Fullname); ?></td>
                                    <td><?php echo htmlentities($result->Rent); ?></td>
                                    <td><?php echo htmlentities($result->Email); ?></td>
                                    <td><?php echo htmlentities($result->ReferenceNo); ?></td>
                                    <td><?php echo htmlentities($result->ContactNumber); ?></td>
                                    <td><?php echo htmlentities($result->Gender); ?></td>
                                    <td><?php echo htmlentities($result->Date); ?></td>
                                    <td><?php echo htmlentities($result->StartTime); ?></td>
                                    <td><?php echo htmlentities($result->EndTime); ?></td>
                                    <td>
                                        <a href="<?php echo htmlentities($result->Photo); ?>" target="_blank">
                                            <img src="<?php echo htmlentities($result->Photo); ?>" alt="Photo" style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;">
                                        </a>
                                    </td>
                                    <td><?php echo htmlentities($result->Purpose); ?></td>
                                    <td>
                                        <a href="updaterequest.php?id=<?php echo htmlentities($result->id); ?>"><i class="lni lni-checkmark p-2"></i></a>
                                        <a href="update/servicerental.php?del=<?php echo htmlentities($result->id); ?>"><i class="lni lni-cross-circle p-2" onclick="return confirm('Do you really want to delete?')"></i></a>


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