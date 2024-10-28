<?php
include_once 'code.php'; // Assuming this sets up the PDO connection as $dbh

// Retrieve the relevant data
$userId = $_GET['id']; // Assuming you're passing the user ID through the URL

// Prepare and execute the query
$query = $dbh->prepare("SELECT Fullname, age, purpose FROM documentissuance WHERE id = :userId");
$query->execute([':userId' => $userId]);

// Fetch the result
$row = $query->fetch(PDO::FETCH_ASSOC);

// Check if we got results
if ($row) {
    $fullname = htmlentities($row['Fullname']);
    $age = htmlentities($row['age']);
    $purpose = htmlentities($row['purpose']);
} else {
    echo "No records found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Indigence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .certificate-container {
            padding: 40px;
            max-width: 800px;
            height: 250mm;
            /* Bond paper height */
            margin: 0 auto;
           
        }

        .certificate-header,
        .certificate-footer {
            text-align: center;
        }

        .certificate-body {
            text-align: justify;
            margin: 0 2rem;
        }

        .indent {
            text-indent: 2rem;
        }

        .certificate-header img {
            height: 80px;
        }

        .header-text {
            text-align: center;
            display: inline-block;
            margin: 0 20px;
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="certificate-header d-flex justify-content-between align-items-center">
            <img src="Logo/sulong.png" alt="Sulong Logo">
            <div class="header-text">
                <p>Province Of Iloilo</p>
                <p>Municipality of Alimodian</p>
                <p>BARANGAY SULONG</p>
            </div>
            <img src="Logo/alimodian.png" alt="Alimodian Logo">
        </div>
        
        <h3 class="text-center pb-5 pt-5">CERTIFICATE OF INDIGENCE</h3>
        <div class="certificate-body ">
            <p class="text-start">TO WHOM IT MAY CONCERN:</p>
            <p class="text-start indent">THIS IS TO CERTIFY THAT, <?php echo $fullname; ?>, <?php echo $age; ?> years old is a bona-fide resident of Barangay Sulong, Alimodian, Iloilo and is known to be an indigent of the said barangay.</p>
            <p class="text-start indent">This is to Certify futher that the above mentioned name and her family is classified as "INDIGENT" in this barangay.</p>
            <p class="text-start indent">This certification is being issued upon the request for <?php echo $purpose; ?> purpose it may serve.</p>
            <p class="text-start indent pb-5">Issued this <?php echo date('jS'); ?> day of <?php echo date('F, Y'); ?>.Sulong, Alimodian, Iloilo. </p>
        </div>
        <div class="certificate-footer text-end">
            <p>RAUL C. ALMORATO</p>
            <p>Punong Barangay</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>