<?php
try {
    // Database connection
    require_once 'code.php';

    // Function to generate a random password
    function generateRandomPassword($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }

    // SQL query to get users
    $sql = "SELECT id, Username, Password FROM users";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Check if the Username is set and Password is empty
        if (!empty($row['Username']) && empty($row['Password'])) {
            $password = generateRandomPassword();
            $updateSql = "UPDATE users SET Password = :Password WHERE id = :id";
            $updateStmt = $dbh->prepare($updateSql);
            $updateStmt->execute([
                'Password' => password_hash($password, PASSWORD_BCRYPT),
                'id' => $row['id']
            ]);
        }
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage();
}
?>
