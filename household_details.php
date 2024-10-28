<?php

include 'code.php';
include('includes_admin/footer.php');
include('includes_admin/header.php');
require_once("session.php");

$household = isset($_GET['household']) ? $_GET['household'] : '';

$sql = "SELECT * FROM residentrecord WHERE household = :household";
$query = $dbh->prepare($sql);
$query->bindParam(':household', $household, PDO::PARAM_STR);
$query->execute();

$members = [];
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $members[] = $row;
}
?>

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
            <div class="d-flex justify-content-between p-4">

                <h1>Members of Household <?php echo htmlentities($household); ?></h1>


            </div>

            <div class="container  mt-5 ">
                <table id="householdtable" class="table   table-bordered col-12">
                    <thead>
                        <tr>
                            <th class="col " scope="col">Number</th>
                            <th class="col " scope="col">Lastname</th>
                            <th class="col " scope="col">Firstname</th>
                            <th class="col " scope="col">MiddileInitial</th>
                            <th class="col " scope="col">Sitio</th>
                        </tr>
                    </thead>
                    <?php

                    foreach ($members as $index => $member) {
                        echo "<tr>";
                        echo "<td>" . ($index + 1) . "</td>";
                        echo "<td>" . htmlentities($member['Lastname']) . "</td>";
                        echo "<td>" . htmlentities($member['Firstname']) . "</td>";
                        echo "<td>" . htmlentities($member['MiddleInitial']) . "</td>";
                        echo "<td>" . htmlentities($member['Sitio']) . "</td>";
                        echo "</tr>";
                    }
                    ?>




                </table>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../includes_admin/script.js"></script>
</body>

</html>