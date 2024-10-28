<?php
try {
    require_once 'code.php';

    // Insert users who don't exist in the users table
    $sqlInsert = "INSERT INTO users (id, Username)
                  SELECT id, Firstname
                  FROM residentrecord
                  WHERE id NOT IN (SELECT id FROM users)";
    $stmtInsert = $dbh->prepare($sqlInsert);
    $stmtInsert->execute();

    // Update usernames for existing users, but only if they don't already have a password set
    $sqlUpdate = "UPDATE users
                  INNER JOIN residentrecord ON users.id = residentrecord.id
                  SET users.Username = residentrecord.Firstname
                  WHERE users.Password IS NULL OR users.Password = ''";
    $stmtUpdate = $dbh->prepare($sqlUpdate);
    $stmtUpdate->execute();
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage();
}
?>
